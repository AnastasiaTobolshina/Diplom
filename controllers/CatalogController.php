<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Technic;
use yii\web\Controller;
use app\models\Designer;
use app\models\Favorite;
use yii\filters\VerbFilter;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;


/**
 * CatalogController implements the CRUD actions for Product model.
 */
class CatalogController extends Controller
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
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex($id = null, $like = null)
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($id) {
            $model = Favorite::findOne([
                'user_id' => Yii::$app->user->id,
                'product_id' => $id
            ]);
            if (is_null($model)) {
                $model = new Favorite();
                $model->user_id = Yii::$app->user->id;
                $model->product_id = $id;
                $model->status = 1;
                $model->save();
            } else {
                $model->status = (int)(!$model->status);                
                $model->save();
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id Номер
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Номер
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
