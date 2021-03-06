<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\CriteriaValue */

$this->title = Yii::t('app', 'CRITERIA_VALUE_PAGE_VIEW_CRITERIA_VALUE') . ': ' . $model->value;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CRITERIA_VALUE_PAGE_CRITERIA_VALUES'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="criteria-value-view">

    <h1><?= Yii::t('app', 'CRITERIA_VALUE_PAGE_CRITERIA_VALUE') . ': ' . $model->value ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'BUTTON_UPDATE'), ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'BUTTON_DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'CRITERIA_VALUE_PAGE_MODAL_FORM_TEXT'),
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
                'attribute'=>'criteria_id',
                'value' => $model->criteria->name,
            ],
            'value:ntext',
            'priority',
        ],
    ]) ?>

</div>