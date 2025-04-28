<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h3>Товар: <?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            [
                'attribute' => 'desinger_id',
                'value' => $model->desinger->FCs,
            ],
            [
                'attribute' => 'technic_id',
                'value' => $model->technic->title,
            ],
            'description',
            [
                'attribute' => 'photo',
                'value' => Html::img("/img/" . $model->photo, ['class' => 'w-25', 'alt' => 'Подвеска']),
                'format' => "html",
            ],
        ],
    ]) ?>

</div>
