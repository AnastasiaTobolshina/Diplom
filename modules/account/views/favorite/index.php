<?php

use app\models\Favorite;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\web\JqueryAsset;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\account\models\FavoriteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Любимые товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorite-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin([
        'id' => 'favorite-pjax',
        'timeout' => 5000,

    ]); ?>
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "\n<div class=\"d-flex justify-content-between flex-wrap h-100\">{items}</div>\n<div class=\"mt-3 d-flex align-items-center justify-content-center\">{pager}</div>",
        'pager' => [
            'class' => LinkPager::class,
        ],
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
    ]) ?>

    <?php Pjax::end(); ?>

</div>

<?php
    $this->registerJsFile('/js/favorite.js', ['depends' => JqueryAsset::class]);
?>