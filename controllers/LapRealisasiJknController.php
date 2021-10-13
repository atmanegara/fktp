<?php

namespace app\controllers;

use Yii;
use app\models\LapRealisasiJkn;
use app\models\LapRealisasiJknSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DataBukuKas;
use app\models\DataSaldo;
use app\models\DataSaldoSearch;
use app\component\BulanComponent;
/**
 * LapRealisasiJknController implements the CRUD actions for LapRealisasiJkn model.
 */
class LapRealisasiJknController extends Controller
{
        public $tahun_aktif;
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
    public function init() {

        $tahun = \app\models\RefTahun::find()->where(['aktif' => 'Y'])->one();
        $this->tahun_aktif = $tahun['tahun'];
    }
    /**
     * Lists all LapRealisasiJkn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LapRealisasiJknSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LapRealisasiJkn model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $id_skpd = $model->id_skpd;
        $bulan = $model->bln_realisasi;
        $tahun = $this->tahun_aktif;
        
       
        if ($bulan == '1') {
            $bulan_lama = 12;
            $tahun_lama = $this->tahun_aktif - 1;
            $keterangan = "Saldo Tahun " . $tahun_lama;
        } else {
            $bulan_lama = $bulan - 1;
            $tahun_lama = $this->tahun_aktif;
            $keterangan = "Saldo Bulan " . BulanComponent::NamaBulan($bulan_lama) . " " . $tahun_lama;
        }
        //   $bulan_saldo_awal=1;
        $refSubSkpd = \app\models\RefSubSkpd::find()->where(['id' => $id_skpd])->one();
        $dataSaldoAwal = DataSaldo::find()
                        ->where(['id_skpd' => $id_skpd, 'tahun' => $tahun_lama, 'bulan' => $bulan_lama, 'aktif' => 'Y'
                        ])->one();
        $query = DataBukuKas::find()
                 ->select(["data_buku_kas.*,concat(b.kd_rek_1,'.',b.kd_rek_2,'.',b.kd_rek_3,'.',b.kd_rek_4,'.',b.kd_rek_5) kode_rek,b.keterangan"])
                ->innerJoin('ta_belanja_rinc b','data_buku_kas.id_ta_belanja_rinc=b.id')
                 ->where(['data_buku_kas.id_ref_skpd' => $id_skpd, 'data_buku_kas.tahun' => $tahun, 'data_buku_kas.bulan' => $bulan])->all();
//JUmlah saldo pada Bulan X
        $jumsaldobulanx = (new \yii\db\Query())
                        ->select(['sum(pendapatan) as pendapatan,sum(belanja) as belanja'])
                        ->from('data_buku_kas')
                        ->where(['id_ref_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan])
                        ->groupBy('id_ref_skpd,tahun,bulan')->one();
        //juumlah saldo sampai pada bulan X
        $jumsaldosampaibulanx = [
            'pendapatan' => $jumsaldobulanx['pendapatan'] + $dataSaldoAwal['saldo'],
            'belanja' => $jumsaldobulanx['belanja']
        ];
        return $this->render('view', [
            'model' =>$model ,
           'query' => $query,
                    'refSubSkpd' => $refSubSkpd,
                    'dataSaldoAwal' => $dataSaldoAwal,
                    'keterangan' => $keterangan,
                    'jumsaldobulanx' => $jumsaldobulanx,
                    'jumsaldosampaibulanx' => $jumsaldosampaibulanx,
            'bulan'=>$bulan
        ]);
    }

    /**
     * Creates a new LapRealisasiJkn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LapRealisasiJkn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LapRealisasiJkn model.
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
     * Deletes an existing LapRealisasiJkn model.
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
     * Finds the LapRealisasiJkn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LapRealisasiJkn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LapRealisasiJkn::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
