<?php

namespace app\controllers;

use Yii;
use app\models\RefSkpd;
use app\models\RefSubSkpd;
use app\models\RefProgram;
use app\models\RefKegiatan;
use app\models\RefRek1;
use app\models\RefRek2;
use app\models\RefRek3;
use app\models\RefRek4;
use app\models\RefRek5;
use app\models\TaBelanjaRinc;
use yii\httpclient\Client;

class IntegrasiController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSimda() {
        return $this->render('simda');
    }

    public function actionGetRefSkpd() {

        $model = RefSkpd::find()->count();
        //  return $model;
        if ($model > 0) {
            $message = [
                'code' => '500',
                'message' => 'Gagal Di Import, Data Sudah Ada !!'
            ];
        } else {

            $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
            $response = $client->createRequest()
                    ->setUrl('get-ref-skpd')
                    ->addHeaders(['content-type' => 'application/json'])
                    ->send();

            $data = \yii\helpers\Json::decode($response->content);
            $message = [
                'code' => '200',
                'message' => $data
            ];
        }
        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefSkpd($kd_urusan, $kd_bidang, $kd_unit, $nama_skpd) {
        $model = new RefSkpd();


        $model->id = null;
        $model->isNewRecord = true;

        $model->kd_urusan = $kd_urusan;
        $model->kd_bidang = $kd_bidang;
        $model->kd_unit = $kd_unit;
        $model->nm_unit = $nama_skpd;

        $model->save(false);

        return \yii\helpers\Json::encode(['code' => '200']);
    }

    public function actionGetRefSubSkpd() {

        $model = \app\models\RefSubSkpd::find()->count();
        //  return $model;
        if ($model > 0) {
            $message = [
                'code' => '500',
                'message' => 'Gagal Di Import, Data Sudah Ada !!'
            ];
        } else {

            $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
            $response = $client->createRequest()
                    ->setUrl('get-ref-sub-skpd')
                    ->addHeaders(['content-type' => 'application/json'])
                    ->send();

            $data = \yii\helpers\Json::decode($response->content);
            $message = [
                'code' => '200',
                'message' => $data
            ];
        }
        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefSubSkpd($kd_urusan, $kd_bidang, $kd_unit, $kd_sub, $nama_skpd) {
        $model = new \app\models\RefSubSkpd();


        $model->id = null;
        $model->isNewRecord = true;

        $model->kd_urusan = $kd_urusan;
        $model->kd_bidang = $kd_bidang;
        $model->kd_unit = $kd_unit;
        $model->kd_sub = $kd_sub;
        $model->nm_sub_unit = $nama_skpd;

        $model->save(false);

        return \yii\helpers\Json::encode(['code' => '200']);
    }

    public function actionGetRefProgram() {
        $model = RefProgram::find()->count();
        if ($model > 0) {
            $message = [
                'code' => '400',
                'message' => 'Gagal Import, Data Program sudah ada'
            ];
        } else {
            $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
            $response = $client->createRequest()
                    ->setMethod('get')
                    ->setUrl('get-ta-program')
                    ->setData(['tahun' => date('Y')])
                    ->addHeaders(['content-type' => 'application/json'])
                    ->send();

            $data = \yii\helpers\Json::decode($response->content);

            $message = [
                'code' => '200',
                'message' => $data
            ];
        }
        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefProgram($kd_urusan, $kd_bidang, $kd_prog, $kd_unit, $kd_sub, $ket_program, $kd_bidang1, $kd_urusan1, $id_prog) {
        $modelprog = RefProgram::find()
                        ->where([
                            'kd_urusan' => $kd_urusan,
                            'kd_bidang' => $kd_bidang,
                            'kd_urusan1' => $kd_urusan1,
                            'kd_bidang1' => $kd_bidang1,
                            'kd_prog' => $kd_prog,
                            'kd_unit' => $kd_unit,
                            'tahun' => date('Y'),
                            'ket_program' => $ket_program
                        ])->exists();
        if ($modelprog == 0) {
            $model = new RefProgram();


            $model->id = null;
            $model->isNewRecord = true;

            $model->kd_urusan = $kd_urusan;
            $model->kd_bidang = $kd_bidang;
            $model->kd_bidang1 = $kd_bidang1;
            $model->kd_urusan1 = $kd_urusan1;
            $model->kd_prog = $kd_prog;
            $model->kd_unit = $kd_unit;
            $model->kd_sub = $kd_sub;
            $model->id_prog = $id_prog;
            $model->tahun = date('Y');
            $model->ket_program = $ket_program;
            $model->save(false);
        }
    }

    public function actionGetRefKegiatan() {


        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-ta-kegiatan')
                ->setData(['tahun' => date('Y')])
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefKegiatan($kd_urusan, $kd_bidang, $kd_program, $kd_unit, $kd_sub, $kd_kegiatan, $nama_kegiatan, $pagun, $kd_bidang1, $kd_urusan1, $id_prog) {
        $modelkeg = RefKegiatan::find()
                        ->where([
                            'kd_urusan' => $kd_urusan,
                            'kd_bidang' => $kd_bidang,
                            'kd_urusan1' => $kd_urusan1,
                            'kd_bidang1' => $kd_bidang1,
                            'kd_prog' => $kd_program,
                            'tahun' => date('Y'),
                            'kd_unit' => $kd_unit,
                            'kd_sub' => $kd_sub,
                            'kd_keg' => $kd_kegiatan,
                            'ket_kegiatan' => $nama_kegiatan
                        ])->exists();
        if ($modelkeg == 0) {
            $model = new RefKegiatan();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;

            $model->kd_urusan = $kd_urusan;
            $model->kd_bidang = $kd_bidang;
            $model->kd_unit = $kd_unit;
            $model->kd_sub = $kd_sub;
            $model->kd_prog = $kd_program;
            $model->kd_urusan1 = $kd_urusan1;
            $model->kd_bidang1 = $kd_bidang1;
            $model->kd_keg = $kd_kegiatan;
            $model->ket_kegiatan = $nama_kegiatan;
            $model->pagu_anggaran = $pagun;
            $model->tahun = date('Y');
            $model->id_prog = $id_prog;

            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = RefKegiatan::find()
                            ->where([
                                'kd_urusan' => $kd_urusan,
                                'kd_bidang' => $kd_bidang,
                                'kd_unit' => $kd_unit,
                                'kd_prog' => $kd_program,
                                'kd_keg' => $kd_kegiatan,
                                'kd_urusan1' => $kd_urusan1,
                                'kd_bidang1' => $kd_bidang1
                            ])->one();
            $model->kd_sub = $kd_sub;
            $model->pagu_renstra = $pagun;

            $model->save(false);
        }
    }

    public function actionGetRekeningSatu() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-ref-rek-satu')
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefRekSatu($kd_rek_1, $nm_rek_1) {
        $modelkeg = RefRek1::find()
                        ->where([
                            'kd_rek_1' => $kd_rek_1,
                            'nm_rek_1' => $nm_rek_1,
                        ])->exists();
        if ($modelkeg == 0) {
            $model = new RefRek1();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;


            $model->kd_rek_1 = $kd_rek_1;
            $model->nm_rek_1 = $nm_rek_1;

            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = RefRek1::find()
                            ->where([
                                'kd_rek_1' => $kd_rek_1,
                            ])->one();
            $model->nm_rek_1 = $nm_rek_1;


            $model->save(false);
        }
    }

    public function actionGetRekeningDua() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-ref-rek-dua')
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefRekDua($kd_rek_1, $kd_rek_2, $nm_rek_2) {
        $modelRek = RefRek2::find()
                        ->where([
                            'kd_rek_1' => $kd_rek_1,
                            'kd_rek_2' => $kd_rek_2,
                        ])->exists();
        if ($modelRek == 0) {
            $model = new RefRek2();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;


            $model->kd_rek_1 = $kd_rek_1;
            $model->kd_rek_2 = $kd_rek_2;
            $model->nm_rek_2 = $nm_rek_2;

            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = RefRek2::find()
                            ->where([
                                'kd_rek_1' => $kd_rek_1,
                                'kd_rek_2' => $kd_rek_2,
                            ])->one();
            $model->nm_rek_2 = $nm_rek_2;


            $model->save(false);
        }
    }

    public function actionGetRekeningTiga() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-ref-rek-tiga')
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefRekTiga($kd_rek_1, $kd_rek_2, $kd_rek_3, $nm_rek_3, $saldonorm) {
        $modelRek = RefRek3::find()
                        ->where([
                            'kd_rek_1' => $kd_rek_1,
                            'kd_rek_2' => $kd_rek_2,
                            'kd_rek_3' => $kd_rek_3,
                        ])->exists();
        if ($modelRek == 0) {
            $model = new RefRek3();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;


            $model->kd_rek_1 = $kd_rek_1;
            $model->kd_rek_2 = $kd_rek_2;
            $model->kd_rek_3 = $kd_rek_3;
            $model->nm_rek_3 = $nm_rek_3;
            $model->saldonorm = $saldonorm;

            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = RefRek3::find()
                            ->where([
                                'kd_rek_1' => $kd_rek_1,
                                'kd_rek_2' => $kd_rek_2,
                                'kd_rek_3' => $kd_rek_3,
                            ])->one();
            $model->nm_rek_3 = $nm_rek_3;
            $model->saldonorm = $saldonorm;


            $model->save(false);
        }
    }

    public function actionGetRekeningEmpat() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-ref-rek-empat')
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefRekEmpat($kd_rek_1, $kd_rek_2, $kd_rek_3, $kd_rek_4, $nm_rek_4) {
        $modelRek = RefRek4::find()
                        ->where([
                            'kd_rek_1' => $kd_rek_1,
                            'kd_rek_2' => $kd_rek_2,
                            'kd_rek_3' => $kd_rek_3,
                            'kd_rek_4' => $kd_rek_4,
                        ])->exists();
        if ($modelRek == 0) {
            $model = new RefRek4();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;


            $model->kd_rek_1 = $kd_rek_1;
            $model->kd_rek_2 = $kd_rek_2;
            $model->kd_rek_3 = $kd_rek_3;
            $model->kd_rek_4 = $kd_rek_4;
            $model->nm_rek_4 = $nm_rek_4;

            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = RefRek4::find()
                            ->where([
                                'kd_rek_1' => $kd_rek_1,
                                'kd_rek_2' => $kd_rek_2,
                                'kd_rek_3' => $kd_rek_3,
                                'kd_rek_4' => $kd_rek_4,
                            ])->one();
            $model->nm_rek_4 = $nm_rek_4;

            $model->save(false);
        }
    }

    public function actionGetRekeningLima() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-ref-rek-lima')
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    public function actionInsertRefRekLima($kd_rek_1, $kd_rek_2, $kd_rek_3, $kd_rek_4, $kd_rek_5, $nm_rek_5) {
        $modelRek = RefRek5::find()
                        ->where([
                            'kd_rek_1' => $kd_rek_1,
                            'kd_rek_2' => $kd_rek_2,
                            'kd_rek_3' => $kd_rek_3,
                            'kd_rek_4' => $kd_rek_4
                        ])->exists();
        if ($modelRek == 0) {
            $model = new RefRek5();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;


            $model->kd_rek_1 = $kd_rek_1;
            $model->kd_rek_2 = $kd_rek_2;
            $model->kd_rek_3 = $kd_rek_3;
            $model->kd_rek_4 = $kd_rek_4;
            $model->kd_rek_5 = $kd_rek_5;
            $model->nm_rek_5 = $nm_rek_5;

            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = RefRek5::find()
                            ->where([
                                'kd_rek_1' => $kd_rek_1,
                                'kd_rek_2' => $kd_rek_2,
                                'kd_rek_3' => $kd_rek_3,
                                'kd_rek_4' => $kd_rek_4,
                            ])->one();
            $model->nm_rek_5 = $nm_rek_5;


            $model->save(false);
        }
    }
//Get Belanja
    public function actionGetBelanja() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-belanja-rinc')
                ->setData(['tahun' => date('Y')])
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }

    //Get Pendapatan
        public function actionGetPendapatan() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-pendapatan-rinc')
                ->setData(['tahun' => date('Y')])
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }
     //Get Pendapatan
        public function actionGetPajak() {
        $client = new Client(['baseUrl' => Yii::$app->params['simda']]);
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl('get-pajak-rinc')
                ->setData(['tahun' => date('Y')])
                ->addHeaders(['content-type' => 'application/json'])
                ->send();

        $data = \yii\helpers\Json::decode($response->content);

        $message = [
            'code' => '200',
            'message' => $data
        ];

        return \yii\helpers\Json::encode($message);
    }
    public function actionInsertBelanjaRinc($kd_urusan, $kd_bidang, $kd_unit, $kd_sub, $kd_prog, $id_prog, $kd_keg, $kd_rek_1, $kd_rek_2, $kd_rek_3, $kd_rek_4, $kd_rek_5, $no_rinc, $keterangan,$total) {
        $modelBel = TaBelanjaRinc::find()
                        ->where([
                            'kd_urusan' => $kd_urusan,
                            'kd_bidang' => $kd_bidang,
                            'kd_unit' => $kd_unit,
                            'kd_sub' => $kd_sub,
                            'kd_prog' => $kd_prog,
                            'id_prog' => $id_prog,
                            'kd_keg' => $kd_keg,
                            'kd_rek_1' => $kd_rek_1,
                            'kd_rek_2' => $kd_rek_2,
                            'kd_rek_3' => $kd_rek_3,
                            'kd_rek_4' => $kd_rek_4,
                            'kd_rek_5' => $kd_rek_5,
                        ])->exists();
        if ($modelBel == 0) {
            $model = new TaBelanjaRinc();
            //        foreach ($data as $value) {
            $model->id = null;
            $model->isNewRecord = true;
            $model->kd_urusan = $kd_urusan;
            $model->kd_bidang = $kd_bidang;
            $model->kd_unit = $kd_unit;
            $model->kd_sub = $kd_sub;
            $model->kd_prog = $kd_prog;
            $model->id_prog = $id_prog;
            $model->kd_keg = $kd_keg;
            $model->kd_rek_1 = $kd_rek_1;
            $model->kd_rek_2 = $kd_rek_2;
            $model->kd_rek_3 = $kd_rek_3;
            $model->kd_rek_4 = $kd_rek_4;
            $model->kd_rek_5 = $kd_rek_5;
            $model->no_rinc = $no_rinc;
            $model->keterangan = $keterangan;
            $model->total = $total;
            $model->tahun = date('Y');
            $model->save();

            return \yii\helpers\Json::encode([
                        'code' => '200'
            ]);
        } else {
            $model = TaBelanjaRinc::find()
                            ->where([
                                'kd_urusan' => $kd_urusan,
                                'kd_bidang' => $kd_bidang,
                                'kd_unit' => $kd_unit,
                                'kd_sub' => $kd_sub,
                                'kd_prog' => $kd_prog,
                                'id_prog' => $id_prog,
                                'kd_keg' => $kd_keg,
                                'kd_rek_1' => $kd_rek_1,
                                'kd_rek_2' => $kd_rek_2,
                                'kd_rek_3' => $kd_rek_3,
                                'kd_rek_4' => $kd_rek_4,
                                'kd_rek_5' => $kd_rek_5,
                            ])->one();
            $model->no_rinc = $no_rinc;
                 $model->total = $total;
            $model->keterangan = $keterangan;


            $model->save(false);
        }
    }

}
