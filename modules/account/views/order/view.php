<?php

use app\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = 'Заявка №' . $model->id . ': ' . $model->product->title;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-center flex-wrap my-5 gap-5">
        <?= Html::a('Назад', ['index'], ['class' => "btn-main w-10"]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // [
            //     'label' => "Дата покупки",                
            //     'value' => $model->date_created,
            // ],
            [
                'attribute' => 'product_id',
                'value' => $model->product->title,
            ],
            'data',
            'address',
            'phone',
            'comment',
            [
                'attribute' => 'status_id',
                'value' => $model->status->title,
            ],
            [
                'attribute' => 'user_id',
                'value' => $model->user->name . ' ' . $model->user->surname,
            ],

            
        ],
    ]) ?>

</div>