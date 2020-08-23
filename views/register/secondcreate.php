<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = Yii::t('app', 'User Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leeds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_secondform', [
        'model' => $model,
    ]) ?>

</div>
