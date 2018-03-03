<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_images}}".
 *
 * @property int $user_images_id
 * @property string $images
 * @property int $status
 *
 * @property Register $userImages
 */
class UserImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_images_id', 'images'], 'required'],
            [['user_images_id', 'status'], 'integer'],
            [['images'], 'string', 'max' => 250],
            [['user_images_id'], 'exist', 'skipOnError' => true, 'targetClass' => Register::className(), 'targetAttribute' => ['user_images_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_images_id' => Yii::t('app', 'User Images ID'),
            'images' => Yii::t('app', 'Images'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserImages()
    {
        return $this->hasOne(Register::className(), ['id' => 'user_images_id']);
    }

    /**
     * @inheritdoc
     * @return UserImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserImagesQuery(get_called_class());
    }
}
