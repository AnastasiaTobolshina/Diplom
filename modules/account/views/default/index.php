<?php

use yii\helpers\Url;
use yii\helpers\Html;

use yii\bootstrap5\Alert;
use yii\widgets\ListView;
use yii\grid\ActionColumn;
/** @var yii\web\View $this */
/** @var app\modules\account\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- <div class="row text-light">
            <div class="col-lg-6 offset-lg-3 text-center">                            
                <div class="subtitle s2 wow fadeInUp mb-3">Our Package</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">Личный кабинет</h2>
                <p class="lead">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing.</p>
                <div class="spacer-single"></div>
            </div>
        </div> -->
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "<div>{items}</div>",
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'itemAccount',
    ]) ?>



</div>
