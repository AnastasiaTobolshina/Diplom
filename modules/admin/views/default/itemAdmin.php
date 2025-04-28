<?php

use yii\bootstrap5\Html;
/** @var yii\web\View $this */
?>
<section class="section-dark jarallax">
    <img src="/account-dist/images/background/1.webp" class="jarallax-img" alt="">
    <div class="container">
        <div class="row text-light">
            <div class="col-lg-6 offset-lg-3 text-center">                            
                <div class="subtitle s2 wow fadeInUp mb-3">Our Package</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">Панель администратора</h2>
                <p class="lead"></p>
                <div class="spacer-single"></div>
            </div>
        </div>

        <div class="row g-4 align-items-center d-flex justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="relative bg-white h-100 rounded-10px overflow-hidden wow fadeInUp" data-wow-delay=".0s">
                    <h4 class="bg-color text-light p-3">Товары</h4>
                    <div class="p-3 px-4 mb-4 relative">
                        <!-- <img src="/account-dist/images/services/1.webp" class="absolute circle mb-4 w-80px end-0 me-4 shadow-soft wow scaleIn" data-wow-delay=".2s" alt="">
                        <div class="fs-14 text-dark fw-500">Start from</div>
                        <div class="mb-3">
                            <h2 class="d-inline id-color-2">$150</h2><span class="fs-14">/session</span>
                        </div> -->
                        <p>Добавьте любимые товары в избранное,<br>
                         чтобы быстро к ним возвращаться!</p>

                        <a class="btn-main btn-light-trans w-100" href="/admin/product">
                            Управление товарами
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="relative bg-white h-100 rounded-10px overflow-hidden wow fadeInUp" data-wow-delay=".2s">
                    <h4 class="bg-color-2 text-light p-3">Заявки</h4>
                    <div class="p-3 px-4 mb-4 relative">
                        <!-- <img src="/account-dist/images/services/2.webp" class="absolute circle mb-4 w-80px end-0 me-4 shadow-soft wow scaleIn" data-wow-delay=".4s" alt="">
                        <div class="fs-14 text-dark fw-500">Start from</div>
                        <div class="mb-3">
                            <h2 class="d-inline id-color-2">$180</h2><span class="fs-14">/session</span>
                        </div> -->
                        <p>Заполните форму для создания<br>
                        заявки и мы ответим в кратчайшие сроки!</p>

                        <a class="btn-main btn-light-trans w-100" href="/admin/order">
                            Управление заказами
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>