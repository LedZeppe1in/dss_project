<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\models\Task;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Criteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="criteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_id')->dropDownList(Task::getAllTasks()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'BUTTON_SAVE'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>