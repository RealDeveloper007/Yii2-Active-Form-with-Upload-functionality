<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = "Update Details";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'firstname',
            'lastname',
            'mobile',
            [
                'attribute'=>'status',
                'filter'=>array("1"=>"Active","0"=>"In-Active"),
                'value'=> function ($data) {
                    return $data['status']==1 ? "Acitve" : "In-Active";
                }
            ],
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $secondmodel,
        'attributes' => [
            [
        'attribute' => 'Other Image',
        'format' => 'html',    
        'value' => function ($data) {
            if($data['images'])
            {
                $image =Html::img(Yii::getAlias('@web').'/web/uploads/'. $data['images'],['width' => '70px']); 
            } else { 
                $image = Html::img(Yii::getAlias('@web').'/web/uploads/default.jpg',['width' => '70px']);
            };
                return $image;
            },
        ],
        ],
    ]) ?>

</div>
