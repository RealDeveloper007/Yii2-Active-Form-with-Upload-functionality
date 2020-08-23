<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Register */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="register-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action'=>'insert-images']); ?>

    <?= $form->field($model, 'user_images_id')->hiddenInput(['value'=>$_GET['id']])->label(false) ?>
    
    <?= $form->field($model, 'images')->fileInput(['accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
