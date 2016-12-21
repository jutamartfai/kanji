<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'first_name', 'last_name'], 'required'],
            [['email', 'first_name', 'last_name'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'อีเมล์ของสมาชิก',
            'password' => 'รหัสผ่าน',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
        ];
    }
}