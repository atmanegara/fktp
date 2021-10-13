<?php

namespace app\controllers;

use Yii;
use app\models\DataSaldo;
use app\models\DataSaldoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataSaldoController implements the CRUD actions for DataSaldo model.
 */
class DataSaldoController extends Controller
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
     * Lists all DataSaldo models.
     * @return mixed
     */
    public function actionIndex()
    {
         $hakuser = Yii::$app->user->identity->hakuser;
        $id_skpd = Yii::$app->user->identity->id_skpd;

       
        
        $searchModel = new DataSaldoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         switch ($hakuser) {
          
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
               
$dataProvider->query->where(['id_skpd'=>$id_skpd]);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataSaldo model.
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
     * Creates a new DataSaldo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataSaldo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DataSaldo model.
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
     * Deletes an existing DataSaldo model.
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
     * Finds the DataSaldo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataSaldo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataSaldo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
