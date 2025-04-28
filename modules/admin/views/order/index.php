<?php

use yii\helpers\Url;
use app\models\Order;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Status;
use yii\grid\GridView;
use yii\grid\ActionColumn;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'user_id',
                'value'  => fn($model) => $model->user->name,
            ],
            'data',
            [
                'attribute' => 'status_id',
                'value'  => fn($model) => $model->status->title,
                'filter' => $statusList,
            ], 
            
            // [
            //     'label' => "Дата и время заказа",
            //     'value' => fn($model) => 
            //         Yii::$app->formatter->asDate($model->date, "dd.MM.yyyy")
            //             . " " 
            //             . $model->time,
            // ],
            // 'phone',
            // 'address',
            // 'comment',
            [
                'attribute' => 'product_id',
                'value'  => fn($model) => $model->product->title,
            ],
            [
                'label' => 'Действия',
                'value' => function($model){
                    $btn_view = Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-secondary my-2 mx-2']);
                    $btn_take = '';
                    $btn_cancel = '';
                    $btn_end = '';
                    if($model->status_id == Status::getStatusId('Новый')){
                        $btn_take = Html::a('Принять в работу', ['take', 'id' => $model->id], ['class' => 'btn btn-info my-2 mx-2']);
                        $btn_cancel = Html::a('Отменить', ['cancel', 'id' => $model->id], ['class' => 'btn btn-danger my-2 mx-2']);
                    } elseif ($model->status_id == Status::getStatusId('В разработке')){
                        $btn_end = Html::a('Закончить', ['end', 'id' => $model->id], ['class' => 'btn btn-success my-2 mx-2']);
                    }
                    return $btn_view . $btn_take . $btn_end . $btn_cancel;
                },
                'format' => $format = "html"
            ],
            
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
