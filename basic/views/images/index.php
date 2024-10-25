<?php

use app\models\Images;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\ImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'caption',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Images $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>

<div class="pagination-container"> <!-- Контейнер для меню пагинации -->
    <?= LinkPager::widget([ // Виджет LinkPager, который создает меню пагинации на основе объекта пагинации
        'pagination' => $pagination, // Объект класса Pagination, содержащий информацию о пагинации
        'prevPageLabel' => ' Назад', // Текст для кнопки "назад"
        'nextPageLabel' => ' Вперед', // Текст для кнопки "вперед"
        'maxButtonCount' => 3, // Максимальное количество отображаемых кнопок с номерами страниц
        'options' => [ // Дополнительные опции для меню пагинации
            'class' => 'pagination', // CSS-класс для меню пагинации
            'style' => 'margin: 0', // CSS-стили для меню пагинации со значением margin: 0
        ],
    ]); ?>
</div>


