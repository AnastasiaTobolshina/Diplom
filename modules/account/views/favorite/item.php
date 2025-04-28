<?php

use yii\bootstrap5\Html;
// if (!empty($model->favorites))
  // var_dump(empty($model->favorites), $model->favorites[0]);
?>

<div class="mb-4 card" style="width: 19rem;">
  <?= Html::a('<img src="/img/' . ($model->product->photo ?? $model->product::NO_PHOTO) . '" class="card-img-top" alt="Товар">', ['view', 'id' => $model->id]) ?>
  
  <div class="card-body" >
    <?= Html::a("<h5 class=\"card-title link-success\">" . Html::encode($model->product->title) . "</h5>", ['view', 'id' => $model->id], ['class' => 'text-decoration-none']) ?>
    
    <h6 class="card-subtitle mb-2 text-body-secondary"><?= Html::encode($model->product->technic->title) ?></h6>

    <div  style="height: 6.5rem;">
      <p class="card-text"><?= Html::encode($model->product->description) ?></p>
    </div>

    <?= (! Yii::$app->user->isGuest && ! Yii::$app->user->identity->isAdmin )
      ? Html::a(
        empty($model->favorites) || (!empty($model->favorites) && !$model->favorites[0]->status)
          ? '🤍'
          : '❤️'
        , ['index', 'id' => $model->id], ['data-id' => $model->id, 'class' => "text-decoration-none btn-favorite favorite", 'data-pjax' => 0])
      : ""
    ?>

    <div class="d-flex justify-content-between">
      <?= Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-success my-2']). Html::a('Создать заявку', ['/order', 'id' => $model->id], ['class' => 'btn btn-success my-2'])?>
    </div>
  </div>
</div>