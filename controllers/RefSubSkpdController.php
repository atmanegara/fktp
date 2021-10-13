<?php

namespace app\controllers;

use Yii;
use app\models\RefSubSkpd;
use app\models\RefSubSkpdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * RefSubSkpdController implements the CRUD actions for RefSubSkpd model.
 */
class RefSubSkpdController extends Controller
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
     * Lists all RefSubSkpd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefSubSkpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefSubSkpd model.
     * @param integer $id
     * @param integer $kd_bidang
     * @param integer $kd_urusan
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub),
        ]);
    }

    /**
     * Creates a new RefSubSkpd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefSubSkpd();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'kd_bidang' => $model->kd_bidang, 'kd_urusan' => $model->kd_urusan, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RefSubSkpd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $kd_bidang
     * @param integer $kd_urusan
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub)
    {
        $model = $this->findModel($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'kd_bidang' => $model->kd_bidang, 'kd_urusan' => $model->kd_urusan, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RefSubSkpd model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $kd_bidang
     * @param integer $kd_urusan
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub)
    {
        $this->findModel($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RefSubSkpd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $kd_bidang
     * @param integer $kd_urusan
     * @param integer $kd_unit
     * @param integer $kd_sub
     * @return RefSubSkpd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $kd_bidang, $kd_urusan, $kd_unit, $kd_sub)
    {
        if (($model = RefSubSkpd::findOne(['id' => $id, 'kd_bidang' => $kd_bidang, 'kd_urusan' => $kd_urusan, 'kd_unit' => $kd_unit, 'kd_sub' => $kd_sub])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
        public function actionSubSkpdList($q = null, $id = null) {
  //      $id_skpd = Yii::$app->user->identity->id_skpd;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = (new Query);
            $query->select('id, nm_sub_unit AS text')
                    ->from('ref_sub_skpd')
                    ->where(['like', 'nm_sub_unit', $q])
           //         ->andWhere(['id_skpd' => $id_skpd, 'group_user' => 'PPTK'])
                    ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => RefSubSkpd::find($id)->nm_sub_unit];
        }
        return $out;
    }
    
    public function actionGetkode($id)
    {
        
       // $id = Yii::$app->request->post('id');
        $model = RefSubSkpd::find()->where([
            'id'=>$id
        ])->one();
        
        $msg = [
            'kd_urusan'=>$model['kd_urusan'],
            'kd_bidang'=>$model['kd_bidang'],
            'kd_unit'=>$model['kd_unit'],
            'kd_sub'=>$model['kd_sub'],
        ];
        return \yii\helpers\Json::encode($msg);
    }
}
