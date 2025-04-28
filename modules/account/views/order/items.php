<?php
use yii\bootstrap5\Html;
?>
<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title"> Заказ на продукт: <?= $model->product->title ?></h5>
    <p class="card-text">Клиент: <?= $model->user->surname . ' ' . $model->user->name ?></p>
    <p class="card-text">Статус: <?= $model->status->title ?></p>
    <?= Html::a('Посмотреть', ['view', 'id' => $model->id], ['calss' => "btn-main"]) ?>
  </div>
</div>