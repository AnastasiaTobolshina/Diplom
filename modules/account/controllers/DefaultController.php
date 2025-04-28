<?php

namespace app\modules\account\controllers;

use app\models\Status;
use yii\web\Controller;
use app\modules\account\models\OrderSearch;

/**
 * Default controller for the `account` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $statusList = Status::getStatusList();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'statusList' => $statusList,
        ]);
    }
}
