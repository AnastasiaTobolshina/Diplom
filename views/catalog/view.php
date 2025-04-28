<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <?php Pjax::begin([
        'id' => 'view-pjax',

    ]); ?>

    <h3>Товар: <?= Html::encode($this->title) ?></h3>

    <?= ListView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => [$model], // Массив с одной моделью
        'pagination' => false, // Отключите пагинацию, если она не нужна
        ]),
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'itemCatalogView',
    ]) ?>

    

    <?php Pjax::end(); ?>

</div>
