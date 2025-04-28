<?php

namespace app\modules\account\controllers;

use app\models\Designer;
use app\models\Favorite;
use app\models\Technic;
use app\modules\account\models\FavoriteSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoriteController implements the CRUD actions for Favorite model.
 */
class FavoriteController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Favorite models.
     *
     * @return string
     */
    public function actionIndex($id = null)
    {
        $searchModel = new FavoriteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($id) {
            if ($model = $this->findModel($id)) {
                //update
                $model->status = (int)(! $model->status);
                $model->save();
                return true;
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favorite model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'desingers' => Designer::getDesigners(),
            'technics' => Technic::getTechnics(),
        ]);
    }

    /**
     * Deletes an existing Favorite model.
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
     * Finds the Favorite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Favorite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Favorite::findOne([
            'user_id' => Yii::$app->user->id,
            'id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
