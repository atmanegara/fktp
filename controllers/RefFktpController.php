<?php

namespace app\controllers;

use Yii;
use app\models\RefFktp;
use app\models\RefFktpSearch;
use app\models\RefTahun;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefFktpController implements the CRUD actions for RefFktp model.
 */
class RefFktpController extends Controller
{
    public $tahun_aktif;
    public $tahun_inisial;
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
        $reftahun = RefTahun::find()->where(['aktif'=>'Y'])->one();
        $this->tahun_aktif=$reftahun['tahun'];
        $this->tahun_inisial=$reftahun['inisial'];
        }
    /**
     * Lists all RefFktp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefFktpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefFktp model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RefFktp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefFktp();
$model->aktif='Y';
        if ($model->load(Yii::$app->request->post()) ) {
            $format_fktp= $this->tahun_inisial.'.'.$model->kode_fktp;
                    $model->format_fktp=$format_fktp;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RefFktp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
               $format_fktp= $this->tahun_inisial.'.'.$model->kode_fktp;
                    $model->format_fktp=$format_fktp;
               $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RefFktp model.
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
     * Finds the RefFktp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RefFktp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RefFktp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGetFktpByIdskpd($idskpd){
        $model = RefFktp::find()->where(['id_sub_skpd'=>$idskpd])->one();
        $msg = [
            'id_sub_skpd'=>$model['id_sub_skpd'],
            'format_fktp'=>$model['format_fktp']
        ];
        return \yii\helpers\Json::encode($msg);
    }
}
