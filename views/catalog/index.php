<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Product;
use yii\bootstrap5\Alert;
use yii\widgets\ListView;
use yii\grid\ActionColumn;
use yii\bootstrap5\LinkPager;
/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    

    <?php Pjax::begin([
        'id' => 'catalog-pjax',

    ]); ?>

    <section class="relative overflow-hidden pb60">
        <img src="/account-dist/images/misc/flowers-crop-2.webp" class="w-30 absolute top-0 start-0 sw-anim" alt="">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="subtitle wow fadeInUp mb-3">Наши работы</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s"> Каталог &amp; <span class="alt-font fw-500 fs-64 id-color-2"> Товаров </span></h2>
                    <div class="spacer-half"></div>
                </div>
            </div>
        </div>
    </section>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "<div class=\"d-flex justify-content-center flex-wrap \" style=\"width: 1920px; margin-top: -5rem;\">{items}</div>",
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'itemCatalogIndex',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
