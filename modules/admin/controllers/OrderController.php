<?php

namespace app\modules\admin\controllers;

use app\models\Order;
use app\models\Status;
use app\models\TypePay;
use app\modules\admin\models\OrderSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $statusList = Status::getStatusList();

        // $model_cancel = null;
        // if ($dataProvider->count) {
        //     // VarDumper::dump($dataProvider->models, 10, true); die;
        //     $model_cancel = $this->findModel($dataProvider->models[0]->id);
        //     $model_cancel->scenario = Order::SCENARIO_CANCEL;
        // }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'statusList' => $statusList,
            // 'model_cancel' => $model_cancel
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionApply($id)
    {
        if ($model = Order::findOne($id)) {
            if ($model->status_id == Status::getStatusId('Новый')) {
                $model->status_id = Status::getStatusId('Закончен');
                $model->save();
                Yii::$app->session->setFlash('success', "Статус заказ №$model->id изменен на - \"Закончен\"!");
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCancel($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Order::SCENARIO_CANCEL;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->status_id = Status::getStatusId('Отменён');
            Yii::$app->session->setFlash('danger', 'Заказ отменен');
            if($model->save()){
                return $this->redirect(['index']);
            } else{
                VarDumper::dump($model->errors, 10, true); die;
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionTake($id)
    {
        $model = $this->findModel($id);

        if ($model) {
            $model->status_id = Status::getStatusId('В разработке');
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Заявка принята в работу');
                return $this->redirect(['index']);
            } else{
                VarDumper::dump($model->errors, 10, true); die;
            }
        }
    }

    public function actionEnd($id)
    {
        $model = $this->findModel($id);

        if ($model) {
            $model->status_id = Status::getStatusId('Закончен');
            if($model->save()){
                Yii::$app->session->setFlash('info', 'Заказ завершен');
                return $this->redirect(['index']);
            } else{
                VarDumper::dump($model->errors, 10, true); die;
            }
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
