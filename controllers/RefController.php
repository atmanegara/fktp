<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;

use app\models\TaBelanjaRinc;
/**
 * Description of RefController
 *
 * @author Administrator
 */
class RefController extends Controller{
    //put your code here
    
    public function actionGetid()
    {
        return 'ada';
    }
    public function actionGetRekeningTaBelanja(){
    $id = Yii::$app->request->post('id');
        $model = TaBelanjaRinc::find()->where(['id'=>$id])->one();
        $data =[
            'kd_rek_1'=>$model->kd_rek_1,
            'kd_rek_2'=>$model->kd_rek_2,
            'kd_rek_3'=>$model->kd_rek_3,
            'kd_rek_4'=>$model->kd_rek_4,
            'kd_rek_5'=>$model->kd_rek_5,
            'keterangan'=>$model->keterangan
        ];
        return Json::encode($data);
        
    }
}
