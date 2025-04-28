<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\account\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p class="d-flex justify-content-center flex-wrap my-5 gap-5">
        <?= Html::a('Создать заявку', ['create'], ['class' => "btn-main w-10"]) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php #echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => "<div class = \"d-flex justify-content-center flex-wrap my-5 gap-5\"> {items} </div>",
        'itemView' => 'items',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
