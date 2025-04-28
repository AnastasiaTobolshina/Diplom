<?php

use yii\bootstrap5\Html;
use app\models\Product;
?>

<!-- <div class="card" style="width: 19rem;">
  <?= Html::a('<img src="/img/' . ($model->photo ?? $model::NO_PHOTO) . '" class="card-img-top" alt="Товар">', ['view', 'id' => $model->id]) ?>
  
  <div class="card-body" >
    <?= Html::a("<h5 class=\"card-title link-success\">$model->title</h5>", ['view', 'id' => $model->id], ['class' => 'text-decoration-none']) ?>
    
    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $model->technic->title ?></h6>

    <div  style="height: 6.5rem;">
      <p class="card-text"><?= $model->description ?></p>
    </div>

    <?= (! Yii::$app->user->isGuest && ! Yii::$app->user->identity->isAdmin)
            ? Html::a(
              empty($model->favorites[0]->status) 
                ? '🤍'
                : '❤️'
              , ['index', 'id' => $model->id], ['data-id' => $model->id, 'class' => "text-decoration-none btn-favorite favorite"])
            : ""
      ?>

    <div class="d-flex justify-content-between">
      <?= Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-success my-2']). Html::a('Создать заявку', ['order', 'id' => $model->id], ['class' => 'btn btn-success my-2'])?>
    </div>
  </div>
</div> -->

<section class="relative overflow-hidden pb60" >
  <div class="container">
    <div class="row g-4">

      <div class="col-lg-4 col-sm-6" style="width: 25rem;">
          <div class="relative">
            <!-- <?= Html::a('', ['view', 'id' => $model->id], ['class' => 'text-decoration-none d-block hover']) ?> -->
            <a href="/catalog/view?id=<?= $model->id?>" class="d-block hover">
              <div class="relative overflow-hidden rounded-10px shadow-soft">
                <img src="/account-dist/images/misc/flowers-crop-5-white.webp" class="w-50 start-0 bottom-0 absolute hover-op-0" alt="">
                <div class="absolute start-0 w-100 hover-op-0 abs-middle text-center">
                  <h3 class="text-white"><?= $model->title ?></h3>
                </div>
                <div class="absolute start-0 w-100 hover-op-1 p-5 abs-middle z-2 text-center text-white">
                  <p class="no-bottom"><?= $model->technic->title ?></p>
                </div>
                <div class="absolute start-0 w-100 h-100 bg-dark-op-50 hover-op-1"></div>
                  <img src="/img/<?=($model->photo ?? $model::NO_PHOTO)?>" class="card-img-top hover-scale-1-2"  width="100" height="400"  alt="Товар"> 
                <!-- <img src="/account-dist/images/services/1.webp" class="img-fluid hover-scale-1-2" alt=""> -->
              </div>
            </a>
          </div>
      </div>
 
    </div>
    <div class="spacer-double"></div>
  </div>
</section>