<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Registersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Register'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
        'attribute' => 'Profile image',
        'format' => 'html',    
        'value' => function ($data) {
            if($data['imageFile'])
            {
                $image =Html::img(Yii::getAlias('@web').'/web/uploads/'. $data['imageFile'],['width' => '70px']); 
            } else { 
                $image = Html::img(Yii::getAlias('@web').'/web/uploads/default.jpg',['width' => '70px']);
            };
                return $image;
            },
        ],
            [
        'attribute' => 'Full Name',
        'value' => function ($data) {
            return $data['firstname'].' '.$data['lastname'];
        },
        ],
            'username',
            'email',
            'mobile',
            //'country_id',
            [
                'attribute'=>'status',
                'filter'=>array("1"=>"Active","0"=>"In-Active"),
                'value'=> function ($data) {
                    return $data['status']==1 ? "Acitve" : "In-Active";
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
