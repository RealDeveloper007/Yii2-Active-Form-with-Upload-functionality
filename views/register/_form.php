<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Register */
/* @var $form yii\widgets\ActiveForm */

 $result = array("1" => "Active","0"=>"In-Active");
?>

<div class="register-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->hiddenInput(['value'=>'jsksncknsksnsk'])->label(false) ?>
    
    <?php if(isset($model['id'])){ ?>
         <?= $form->field($model, 'password_hash')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?php } else { ?>
         <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('Password') ?>
    <?php } ?>

    <?= $form->field($model, 'password_reset_token')->hiddenInput(['value'=>'jsksncknsksnsk'])->label(false) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postcode')->hiddenInput(['value'=>2019])->label(false) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d h:i:s')])->label(false) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>	

    <?= $form->field($model, 'usertype_id')->hiddenInput(['value'=>2])->label(false) ?>

    <?= $form->field($model, 'city_name')->hiddenInput(['value'=>'ambala'])->label(false) ?>

    <?= $form->field($model, 'country_id')->hiddenInput(['value'=>2])->label(false) ?>
     <?php if(!isset($model['id'])){ ?>
    <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false) ?>
    <?php } else { ?>
    <?= $form->field($model, 'status')->dropDownList($result,['prompt' => '--Select--']) ?>
    <?php } ?>
    
    <?= $form->field($model, 'imageFile')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permission')->hiddenInput(['value'=>2])->label(false) ?>

    <?= $form->field($model, 'is_published')->hiddenInput(['value'=>2])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
