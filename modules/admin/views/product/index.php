<?php

use app\models\Product;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute' => 'title',
            'format' => 'html',
            'value' => fn($model) => Html::img("/img/" . ($model->photo ?? $model::NO_PHOTO), ['class' => 'me-5 w-25', 'alt' => 'product']) . $model->title,
            ],
            
            // [
            //     'attribute' => 'desinger_id',
            //     'value'  => fn($model) => $model->desinger->FCs,
            // ],
            // [
            //     'attribute' => 'technic_id',
            //     'value'  => fn($model) => $model->product->title,
            // ],
            //'description',
            [
                'label' => 'Действия',
                'value' => fn($model) => Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-success my-2 mx-2']) . Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary my-2 mx-2']) . Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger my-2 mx-2']),
                'format' => "html",
            ],
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Product $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
