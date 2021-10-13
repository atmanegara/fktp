<?php

namespace app\controllers;

use Yii;
use app\models\LapRealisasiAnggaran;
use app\models\LapRealisasiAnggaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * LapRealisasiAnggaranController implements the CRUD actions for LapRealisasiAnggaran model.
 */
class LapRealisasiAnggaranController extends Controller {

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

    /**
     * Lists all LapRealisasiAnggaran models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LapRealisasiAnggaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LapRealisasiAnggaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $id_sub_skpd = $model->id_skpd;
        $bulan = $model->bulan;
        $sql_pendapatan = "call sp_lap_real_anggaran(:id_sub_skpd,:bulan,4)";
        $params = [
            ':id_sub_skpd' => $id_sub_skpd,
            ':bulan' => $bulan
        ];
        $query_pendapatan = Yii::$app->db->createCommand($sql_pendapatan, $params)->queryAll();
        $sql_belanja = "call sp_lap_real_anggaran(:id_sub_skpd,:bulan,5)";
        $query_belanja = Yii::$app->db->createCommand($sql_belanja, $params)->queryAll();
        return $this->render('view', [
                    'model' => $model,
                    'query_pendapatan' => $query_pendapatan,
                    'query_belanja' => $query_belanja
        ]);
    }

    /**
     * Creates a new LapRealisasiAnggaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new LapRealisasiAnggaran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing LapRealisasiAnggaran model.
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
     * Deletes an existing LapRealisasiAnggaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrintLapRealisasiAnggaran($export, $id) {
        $model = $this->findModel($id);
        $id_sub_skpd = $model->id_skpd;
        $bulan = $model->bulan;
        $tahun = $model->tahun;
        $sql_pendapatan = "call sp_lap_real_anggaran(:id_sub_skpd,:bulan,4)";
        $params = [
            ':id_sub_skpd' => $id_sub_skpd,
            ':bulan' => $bulan
        ];
        $query_pendapatan = Yii::$app->db->createCommand($sql_pendapatan, $params)->queryAll();
        $sql_belanja = "call sp_lap_real_anggaran(:id_sub_skpd,:bulan,5)";
        $query_belanja = Yii::$app->db->createCommand($sql_belanja, $params)->queryAll();
           $namafile = "lap_realisasi_anggaran_$bulan/$tahun";
        if ($export == 'xls') {
             header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=$namafile.xls");
            return $this->renderPartial('print-lap-realisasi-anggaran', [
                        'model' => $model,
                        'query_pendapatan' => $query_pendapatan,
                        'query_belanja' => $query_belanja
            ]);
        } else {
            $content = $this->renderAjax('print-lap-realisasi-anggaran', [
                        'model' => $model,
                        'query_pendapatan' => $query_pendapatan,
                        'query_belanja' => $query_belanja
     ]);
              $pdf = new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
//$mpdf->SetHeader('Tanggal Cetak : '.date('d-m-Y H:i:s'));
        $mpdf->setFooter('Create by Aplikasi Monitoring JKN'); // call methods or set any properties
        $mpdf->WriteHtml($content); // call mpdf write html
        return $mpdf->Output($namafile.'.pdf', 'I'); // call the mpdf api output as needed
//            // setup kartik\mpdf\Pdf component
//            $pdf = new Pdf([
//                // set to use core fonts only
//                'mode' => Pdf::MODE_UTF8,
//                // A4 paper format
//                'format' => Pdf::FORMAT_A4,
//                // portrait orientation
//                'orientation' => Pdf::ORIENT_PORTRAIT,
//                // stream to browser inline
//                'destination' => Pdf::DEST_BROWSER,
//                // your html content input
//                'content' => $content,
//                // format content from your own css file if needed or use the
//                // enhanced bootstrap css built by Krajee for mPDF formatting 
//                             // set mPDF properties on the fly
//                'options' => ['title' => 'Krajee Report Title'],
//                // call mPDF methods on the fly
//                'methods' => [
//                    'SetHeader' => ['Krajee Report Header'],
//                    'SetFooter' => ['{PAGENO}'],
//                ]
//            ]);
//
//            // return the pdf output as per the destination setting
//            return $pdf->render();
        }
    }

    /**
     * Finds the LapRealisasiAnggaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LapRealisasiAnggaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = LapRealisasiAnggaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
