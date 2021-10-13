<?php

namespace app\controllers;

use Yii;
use app\models\DataBukuKas;
use app\models\DataBukuKasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DataSaldo;
use app\models\DataSaldoSearch;
use app\component\BulanComponent;
use yii\helpers\Json;
/**
 * DataBukuKasController implements the CRUD actions for DataBukuKas model.
 */
class DataBukuKasController extends Controller {

    public $tahun_aktif;

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all DataBukuKas models.
     * @return mixed
     */
    public function actionIndex() {
        $hakuser = Yii::$app->user->identity->hakuser;
        $id_skpd = Yii::$app->user->identity->id_skpd;

        switch ($hakuser) {
            case 99:
                $query = \app\models\RefSkpd::find()->select('id,nm_unit');
                break;
            case 11;
                $query = (new \yii\db\Query())
                        ->select('a.id,a.nm_sub_unit as nm_unit')
                        ->from('ref_sub_skpd a')
                        ->innerJoin('ref_skpd b', 'a.kd_bidang=b.kd_bidang and a.kd_urusan=b.kd_urusan and a.kd_unit=b.kd_unit')
                        ->where([
                    'b.id' => $id_skpd,
                    'a.aktif' => 'Y', 'b.aktif' => 'Y'
                ]);
                break;
            case in_array($hakuser, ['22', '33']):
                $query = \app\models\RefSubSkpd::find()->select('id,nm_sub_unit as nm_unit')->where(['id' => $id_skpd]);
        }

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionDataSaldo($id_skpd) {


        $searchModel = new DataSaldoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['id_skpd' => $id_skpd]);
        return $this->render('data-saldo', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexBukuKas($id_skpd) {


        $searchModel = new DataSaldoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-buku-kas', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataBukuKas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DataBukuKas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new DataBukuKas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionCreateBukuKas($id_skpd, $bulan) {
        // $bulan = date('n');
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
        $searchModel = new DataBukuKasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['data_buku_kas.id_ref_skpd' => $id_skpd, 'data_buku_kas.tahun' => $tahun, 'data_buku_kas.bulan' => $bulan]);
//JUmlah saldo pada Bulan X
        $jumsaldobulanx = (new \yii\db\Query())
                        ->select(['sum(data_buku_kas.pendapatan) as pendapatan,sum(data_buku_kas.belanja) as belanja'])
                        ->from('data_buku_kas')
                            ->innerJoin('ta_belanja_rinc b','data_buku_kas.id_ta_belanja_rinc=b.id')
                           ->where(['data_buku_kas.id_ref_skpd' => $id_skpd, 'data_buku_kas.tahun' => $tahun, 'data_buku_kas.bulan' => $bulan])
                        ->groupBy('data_buku_kas.id_ref_skpd,data_buku_kas.tahun,data_buku_kas.bulan')->one();
        //juumlah saldo sampai pada bulan X
        $jumsaldosampaibulanx = [
            'pendapatan' => $jumsaldobulanx['pendapatan'] + $dataSaldoAwal['saldo'],
            'belanja' => $jumsaldobulanx['belanja']
        ];
          if (Yii::$app->request->post('id')) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if (Yii::$app->request->post('pendapatan')) {
                $id = Yii::$app->request->post('id');
                $value = Yii::$app->request->post('pendapatan');
                $model = DataBukuKas::findOne($id);
                $model->pendapatan = $value;
                $model->save(false);
                $out = Json::encode(['output' => $value, 'message' => '']);

          
            }elseif (Yii::$app->request->post('belanja')) {
                $id = Yii::$app->request->post('id');
                $value = Yii::$app->request->post('belanja');
                $model = DataBukuKas::findOne($id);
                $model->belanja = $value;
                $model->save(false);
                $out = Json::encode(['output' => $value, 'message' => '']);

          
            } else {
            $out = Json::encode(['output' => '', 'message' => 'gagal']);

            
            }
            echo $out;
            exit;
        }
        
        return $this->render('create-buku-kas', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'refSubSkpd' => $refSubSkpd,
                    'dataSaldoAwal' => $dataSaldoAwal,
                    'keterangan' => $keterangan,
                    'jumsaldobulanx' => $jumsaldobulanx,
                    'jumsaldosampaibulanx' => $jumsaldosampaibulanx
        ]);
    }

    public function actionSimpanDataBukuKas() {
        $id_ref_skpd = Yii::$app->request->post('id_ref_skpd');
        $tgl_transaksi = Yii::$app->request->post('tgl_transaksi');
        $id_ta_belanja_rinc = Yii::$app->request->post('id_ta_belanja_rinc');
        $nominal = Yii::$app->request->post('nominal');
        $bulan = Yii::$app->request->post('bulan');

        $ref_skpd_sub = \app\models\RefSubSkpd::find()->where(['id' => $id_ref_skpd])->one();
        //   return $bulan;
        //norek
        $databelanja = \app\models\TaBelanjaRinc::find()->where(['id' => $id_ta_belanja_rinc])->one();
        $kode_rek = $databelanja['kd_rek_1'] . '.' . $databelanja['kd_rek_2'] . '.' . $databelanja['kd_rek_3'] . '.' . $databelanja['kd_rek_4'] . '.' . $databelanja['kd_rek_5'];
        $kode_rek_belanja = $databelanja['kd_rek_1'] . '.' . $databelanja['kd_rek_2'];
        //bulan_tahun
        //   $bulan = 1; //date('n', strtotime($tgl_transaksi));
        $tahun = $this->tahun_aktif; //date('Y', strtotime($tgl_transaksi));
        //fkpt
        $datafktp = \app\models\RefFktp::find()->where(['id_sub_skpd'=>$id_ref_skpd,'aktif'=>'Y'])->one();
        $format_fktp = $datafktp['format_fktp'];// date('y', strtotime($tahun)) . "." . $ref_skpd_sub['kd_sub'];

        //NO transaksi
        $belanja = 0;
        $pendapatan = 0;
        $saldo = 0;
        $notransaksi = $bulan . '.' . $tahun . '.' . $format_fktp;
        $dataSaldo = DataSaldo::find();
        if ($bulan == '1') {
            $format_fktp = date('y', strtotime($tahun)) - 1 . "." . $ref_skpd_sub['kd_sub'];
            $notransaksiawaltahun = "12" . "." . ($tahun - 1) . '.' . $format_fktp;
            $dataSaldo = $dataSaldo->where(['notransaksi' => $notransaksiawaltahun]);
        } else {
            $dataSaldo = $dataSaldo->where(['notransaksi' => $notransaksi]);
        }
        //     return $notransaksiawaltahun;
        $dataSaldo = $dataSaldo->one();
        $saldokas = $dataSaldo['saldo'];
        $databukukas = DataBukuKas::find()
                ->innerJoin('ta_belanja_rinc b','data_buku_kas.id_ta_belanja_rinc=b.id')
                ->where(['data_buku_kas.notransaksi' => $notransaksi]);
        $nourut = 1;
        if ($databukukas->exists() > 0) {

            $nourut = $databukukas->count() + 1;
            //     return var_dump($nourut);

            $getIdMax = DataBukuKas::find()->select('max(data_buku_kas.id) as id')
                    ->innerJoin('ta_belanja_rinc b','data_buku_kas.id_ta_belanja_rinc=b.id')
                    ->where(['data_buku_kas.notransaksi' => $notransaksi])->one();
//get saldo terakhir masuk

            $saldodatabukukas = $databukukas->andWhere(['data_buku_kas.id' => $getIdMax['id']])->one();
            $saldokas = $saldodatabukukas['saldo'];
        }
        if (in_array($kode_rek_belanja, ["5.1", "5.2"])) {
            $belanja = $nominal;
            $saldo = $saldokas - $nominal;
        } elseif (in_array($kode_rek_belanja, ["4.1", "4.2"])) {
            $pendapatan = $nominal;
            $saldo = $saldokas + $nominal;
        } elseif (in_array($kode_rek_belanja, ["7.1"])) {
            $pendapatan = $nominal;
            $saldo = $saldokas + $nominal;
        } elseif (in_array($kode_rek_belanja, ["7.2"])) {
            $belanja = $nominal;
            $saldo = $saldokas - $nominal;
        }
        $nobukti = str_pad($nourut, '3', "0", STR_PAD_LEFT) . "/" . $bulan . "/" . $tahun . "/" . $format_fktp . "/" . $kode_rek;
      
        $model = new DataBukuKas();
        $model->id_ref_skpd = $id_ref_skpd;
        $model->nourut = $nourut;
        $model->id_ta_belanja_rinc = $id_ta_belanja_rinc;
        $model->tgl_transaksi = $tgl_transaksi;
        $model->tahun = $tahun;
        $model->bulan = $bulan;
        $model->notransaksi = $notransaksi;
        $model->nobukti = $nobukti;
        $model->belanja = $belanja;
        $model->pendapatan = $pendapatan;
        $model->saldo = $saldo;
        $model->save(false);

    }

    public function actionEditItem() {
        if (Yii::$app->request->post('id')) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if (Yii::$app->request->post('pendapatan')) {
                $id = Yii::$app->request->post('id');
                $value = Yii::$app->request->post('pendapatan');
                $model = DataBukuKas::findOne($id);
                $model->pendapatan = $value;
                $model->save(false);
                return ['output' => $value, 'message' => 'success'];
            } elseif (Yii::$app->request->post('belanja')) {
                $id = Yii::$app->request->post('id');
                $value = Yii::$app->request->post('belanja');
                $model = DataBukuKas::findOne($id);
                $model->belanja = $value;
                $model->save(false);
                return ['output' => $value, 'message' => 'success'];
            } else {
                return ['output' => '', 'message' => 'invalid'];
            }
        }
    }

    /**
     * Updates an existing DataBukuKas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DataBukuKas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteItem($id) {
        $model = $this->findModel($id);
        $id_skpd = $model['id_ref_skpd'];
        $bulan = $model['bulan'];
        $model->delete();

        return $this->redirect(['create-buku-kas',
                    'id_skpd' => $id_skpd,
                    'bulan' => $bulan
        ]);
    }

    /**
     * Finds the DataBukuKas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataBukuKas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DataBukuKas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRincian($notransaksi) {

        $model = DataBukuKas::find()
                ->where(['notransaksi' => $notransaksi]);

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $model
        ]);

        return $this->render('rincian', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionSelesaiInputKas($id_skpd, $bulan) {
        $tahun = $this->tahun_aktif;
        $dataSaldoAwal = DataSaldo::find()
                        ->where(['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan - 1, 'aktif' => 'Y'
                        ])->one();

        //JUmlah saldo pada Bulan X
        $jumsaldobulanx = (new \yii\db\Query())
                        ->select(['sum(pendapatan) as pendapatan,sum(belanja) as belanja,max(notransaksi) notransaksi'])
                        ->from('data_buku_kas')
                        ->where(['id_ref_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan])
                        ->groupBy('id_ref_skpd,tahun,bulan')->one();
        //juumlah saldo sampai pada bulan X
        $jumsaldosampaibulanx = [
            'pendapatan' => $jumsaldobulanx['pendapatan'] + $dataSaldoAwal['saldo'],
            'belanja' => $jumsaldobulanx['belanja'],
            'notransaksi' => $jumsaldobulanx['notransaksi']
        ];
        $modelDataSaldo = DataSaldo::find()
                ->where([
                    'id_skpd'=>$id_skpd,
                    'bulan'=>$bulan,
                    'tahun'=>$tahun,
                        'notransaksi'=>$jumsaldosampaibulanx['notransaksi']
                ]);
        if($modelDataSaldo->exists()>0){
            $model = $modelDataSaldo->one();
              $model->saldo = $jumsaldosampaibulanx['pendapatan'] - $jumsaldosampaibulanx['belanja'];
        }else{
        $model = new DataSaldo();
        $model->id_skpd = $id_skpd;
        $model->bulan = $bulan;
        $model->tahun = $tahun;
        $model->notransaksi = $jumsaldosampaibulanx['notransaksi'];
        $model->saldo = $jumsaldosampaibulanx['pendapatan'] - $jumsaldosampaibulanx['belanja'];
        }
        $model->save(false);
                return $this->redirect(['data-saldo','id_skpd'=>$id_skpd]);
    }

}
