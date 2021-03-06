<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Criteria */

$this->title = Yii::t('app', 'CRITERIA_PAGE_UPDATE_CRITERIA') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CRITERIA_PAGE_CRITERIAS'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'CRITERIA_PAGE_UPDATE_CRITERIA');
?>

<div class="criteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>