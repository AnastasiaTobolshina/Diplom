<?php

use yii\bootstrap5\Html;

?>


<section class="relative overflow-hidden">
    <img src="/account-dist/images/misc/flowers-crop-2.webp" class="w-40 absolute top-0 end-10 sw-anim" alt="">

    <div class="container">
        <div class="row align-items-center g-4 gx-5">
            <div class="col-lg-6">
                <div class="subtitle wow fadeInUp mb-3">Our Services</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s"><?= $model->title ?></h2>
                <p class="lead">
                    <?= $model->description ?>
                </p>
                <div class="fs-14 text-dark fw-500">Цена</div>
                <div class="mb-3">
                    <h2 class="d-inline id-color-2">$150</h2>
                </div>
            </div>
            <div class="col-lg-6 ml-5">
                <img src="/img/<?=($model->photo ?? $model::NO_PHOTO)?>" class="rounded-20px" width="400" height="500" style="margin-left: 10rem;"  alt="Товар" alt="">
            </div>
        </div>
    </div>
</section>

<section class="bg-color no-top no-bottom">
    <div class="container-fluid">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4 col-md-4">
                <div class="relative p-4 text-light">
                    <i class="d-block fs-40 mb-2 icofont-clock-time"></i>
                    Пн - Пт: 8AM - 9PM<br>
                    Сб - Вс: 10AM - 8PM<br>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="relative p-4 bg-color-2 text-light">
                    <i class="d-block fs-40 mb-2 icofont-location-pin"></i>
                    789 Elm Avenue<br>Brooklyn, NY 11201
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="relative p-4 bg-color-3 text-dark">
                    <i class="d-block fs-40 mb-2 icofont-phone"></i>
                    +929 333 9296<br>
                    contact@mindthera.com
                </div>
            </div>
        </div>
    </div>
</section>