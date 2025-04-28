<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
