<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\RefSubSkpd;


class SettingController extends Controller{
    
    
    public function actionEntryJkn(){
        
        $model = RefSubSkpd::find();
        $dataProvider = new ActiveDataProvider([
            'query'=>$model
        ]);
        return $this->render('entry-jkn',[
            'dataProvider'=>$dataProvider
        ]);
    }
}


?>

