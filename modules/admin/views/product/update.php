<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = 'Изменить товар: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'desingers' => $desingers,
        'technics' => $technics,
    ]) ?>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>

