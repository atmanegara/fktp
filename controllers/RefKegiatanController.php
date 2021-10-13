<?php

namespace app\controllers;

use Yii;
use app\models\RefKegiatan;
use app\models\RefKegiatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefKegiatanController implements the CRUD actions for RefKegiatan model.
 */
class RefKegiatanController extends Controller
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
     * Lists all RefKegiatan models.
     * @return mixed
     */
    public function actionIndex($kd_urusan=null,$kd_bidang=null,$kd_unit=null,$kd_sub=null)
    {
        $searchModel = new RefKegiatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(!is_null($kd_sub)){
$dataProvider->query->where([
    'kd_bidang'=>$kd_bidang,
    'kd_urusan'=>$kd_urusan,
    'kd_unit'=>$kd_unit,
    'kd_sub'=>$kd_sub
]);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefKegiatan model.
     * @param integer $id
     * @param integer $kd_urusan
     * @param integer $kd_bidang
     * @param integer $kd_urusan1
     * @param integer $kd_bidang1
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @param integer $kd_prog
     * @param integer $kd_keg
     * @param integer $id_prog
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog),
        ]);
    }

    /**
     * Creates a new RefKegiatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefKegiatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'kd_urusan' => $model->kd_urusan, 'kd_bidang' => $model->kd_bidang, 'kd_urusan1' => $model->kd_urusan1, 'kd_bidang1' => $model->kd_bidang1, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub, 'kd_prog' => $model->kd_prog, 'kd_keg' => $model->kd_keg, 'id_prog' => $model->id_prog]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RefKegiatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $kd_urusan
     * @param integer $kd_bidang
     * @param integer $kd_urusan1
     * @param integer $kd_bidang1
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @param integer $kd_prog
     * @param integer $kd_keg
     * @param integer $id_prog
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog)
    {
        $model = $this->findModel($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'kd_urusan' => $model->kd_urusan, 'kd_bidang' => $model->kd_bidang, 'kd_urusan1' => $model->kd_urusan1, 'kd_bidang1' => $model->kd_bidang1, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub, 'kd_prog' => $model->kd_prog, 'kd_keg' => $model->kd_keg, 'id_prog' => $model->id_prog]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RefKegiatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $kd_urusan
     * @param integer $kd_bidang
     * @param integer $kd_urusan1
     * @param integer $kd_bidang1
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @param integer $kd_prog
     * @param integer $kd_keg
     * @param integer $id_prog
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog)
    {
        $this->findModel($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RefKegiatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $kd_urusan
     * @param integer $kd_bidang
     * @param integer $kd_urusan1
     * @param integer $kd_bidang1
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @param integer $kd_prog
     * @param integer $kd_keg
     * @param integer $id_prog
     * @return RefKegiatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $kd_urusan, $kd_bidang, $kd_urusan1, $kd_bidang1, $kd_unit, $kd_sub, $kd_prog, $kd_keg, $id_prog)
    {
        if (($model = RefKegiatan::findOne(['id' => $id, 'kd_urusan' => $kd_urusan, 'kd_bidang' => $kd_bidang, 'kd_urusan1' => $kd_urusan1, 'kd_bidang1' => $kd_bidang1, 'kd_unit' => $kd_unit, 'kd_sub' => $kd_sub, 'kd_prog' => $kd_prog, 'kd_keg' => $kd_keg, 'id_prog' => $id_prog])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
