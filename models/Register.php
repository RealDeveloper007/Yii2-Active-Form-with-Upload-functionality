<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%register}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $mobile
 * @property string $postcode
 * @property string $created_at
 * @property string $address
 * @property int $usertype_id
 * @property string $city_name
 * @property int $country_id
 * @property int $status
 * @property string $imageFile
 * @property int $permission
 * @property int $is_published
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%register}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'usertype_id','firstname','lastname', 'mobile','status'], 'required'],
            [['created_at'], 'safe'],
            [['usertype_id', 'country_id', 'status', 'permission', 'is_published'], 'integer'],
            [['username', 'email', 'firstname', 'lastname', 'mobile', 'postcode'], 'string', 'max' => 45],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'address', 'city_name', 'imageFile'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'email' => Yii::t('app', 'Email'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'mobile' => Yii::t('app', 'Mobile'),
            'postcode' => Yii::t('app', 'Postcode'),
            'created_at' => Yii::t('app', 'Created At'),
            'address' => Yii::t('app', 'Address'),
            'usertype_id' => Yii::t('app', 'Usertype ID'),
            'city_name' => Yii::t('app', 'City Name'),
            'country_id' => Yii::t('app', 'Country ID'),
            'status' => Yii::t('app', 'Status'),
            'imageFile' => Yii::t('app', 'Profile Image'),
            'permission' => Yii::t('app', 'Permission'),
            'is_published' => Yii::t('app', 'Is Published'),
        ];
    }

    /**
     * @inheritdoc
     * @return RegisterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegisterQuery(get_called_class());
    }
}
