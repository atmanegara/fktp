<?php

namespace app\controllers;

use Yii;
use app\models\LapTanggungJwb;
use app\models\LapTanggungJwbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LapTanggungJwbController implements the CRUD actions for LapTanggungJwb model.
 */
class LapTanggungJwbController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LapTanggungJwb models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LapTanggungJwbSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LapTanggungJwb model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
                $notransaksi = $model->notransaksi;
        $bulan = $model->bulan;
        $tahun = $model->tahun;
        $id_ref_skpd = $model->id_skpd;
             $sql="SELECT a.id_ref_skpd,c.nm_sub_unit,a.id_ta_belanja_rinc,CONCAT(b.kd_rek_1,'.',b.kd_rek_2,'.',b.kd_rek_3,'.',b.kd_rek_4,'.',b.kd_rek_5) AS kd_rek,
b.keterangan,
a.pendapatan,a.belanja FROM data_buku_kas a 
INNER JOIN ta_belanja_rinc b ON a.id_ta_belanja_rinc=b.id
inner join ref_sub_skpd c on a.id_ref_skpd=c.id
WHERE
a.bulan=:bulan AND a.notransaksi=:notransaksi AND a.tahun=:tahun AND a.id_ref_skpd=:id_ref_skpd";
        $params=[
            ':notransaksi'=>$notransaksi,
            ':bulan'=>$bulan,
            ':tahun'=>$tahun,
            ':id_ref_skpd'=>$id_ref_skpd
        ];
        $dataskpd = \app\models\RefSubSkpd::findOne($model->id_skpd);
        $datakas = Yii::$app->db->createCommand($sql,$params)->queryAll();
        
        return $this->render('view', [
            'model' => $model,
            'datakas'=>$datakas,
            'dataskpd'=>$dataskpd
        ]);
    }

    /**
     * Creates a new LapTanggungJwb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new LapTanggungJwb();
        
        if ($model->load(Yii::$app->request->post())) {
            $id_skpd = $model->id_skpd;
            $datafktp = \app\models\RefFktp::find()->where(['id_sub_skpd'=>$id_skpd,'aktif'=>'Y'])->one();
            $formatfkpt = $datafktp['format_fktp'];
            $bulan = $model->bulan;
            $tahun = $model->tahun;
            $notransaksi = $bulan.'.'.$tahun.'.'.$formatfkpt;
            $model->format_fktp=$formatfkpt;
            $model->notransaksi=$notransaksi;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LapTanggungJwb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LapTanggungJwb model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LapTanggungJwb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LapTanggungJwb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LapTanggungJwb::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionPrintLapTanggungJwb(){
        $notransaksi = Yii::$app->request->post('notransaksi');
        $bulan = Yii::$app->request->post('bulan');
        $tahun = Yii::$app->request->post('tahun');
        $id_ref_skpd = Yii::$app->request->post('id_ref_skpd');
        $export = Yii::$app->request->post('export');
        $sql="SELECT a.id_ref_skpd,a.id_ta_belanja_rinc,CONCAT(b.kd_rek_1,'.',b.kd_rek_2,'.',b.kd_rek_3,'.',b.kd_rek_4,'.',b.kd_rek_5) AS kd_rek,
b.keterangan,
a.pendapatan,a.belanja FROM data_buku_kas a 
INNER JOIN ta_belanja_rinc b ON a.id_ta_belanja_rinc=b.id
WHERE
a.bulan=:bulan AND a.notransaksi=:notransaksi AND a.tahun=:tahun AND a.id_ref_skpd=:id_ref_skpd";
        $params=[
            ':notransaksi'=>$notransaksi,
            ':bulan'=>$bulan,
            ':tahun'=>$tahun,
            ':id_ref_skpd'=>$id_ref_skpd
        ];
        $datakas = Yii::$app->db->createCommand($sql,$params)->queryAll();
        if($export=='xls'){
            
        }else{
            return $this->render('print-lap-tanggung-jwb',[
                'datakas'=>$datakas
            ]);
        }
    }
}
