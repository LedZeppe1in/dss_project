<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Alternative */
/* @var $specificAlternatives app\modules\main\models\SpecificAlternative */

$this->title = Yii::t('app', 'ALTERNATIVE_PAGE_VIEW_ALTERNATIVE') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ALTERNATIVE_PAGE_ALTERNATIVES'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="alternative-view">

    <h1><?= Yii::t('app', 'ALTERNATIVE_PAGE_ALTERNATIVE') . ': ' . $model->name ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'BUTTON_UPDATE'), ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'BUTTON_DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'ALTERNATIVE_PAGE_MODAL_FORM_TEXT'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'dd.MM.Y HH:mm:ss']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'dd.MM.Y HH:mm:ss']
            ],
            [
                'attribute'=>'task_id',
                'value' => $model->task->name,
            ],
            'name',
            'description:ntext',
        ],
    ]) ?>

    <?php
        $items = array();
        foreach ($specificAlternatives as $specificAlternative) {
            $item = [
                'label' => $specificAlternative->criteria->name,
                'content' => $this->render('_criteria', [
                    'specificAlternative' => $specificAlternative
                ]),
            ];
            array_push($items, $item);
        }
        echo Tabs::widget([
            'items' => $items
        ]);
    ?>

</div>