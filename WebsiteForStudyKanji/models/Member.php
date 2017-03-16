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
 * @property string $active_date
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
            // [['active_date'], 'safe'],
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
            'active_date' => 'วันที่เข้าใช้งานล่าสุด',
        ];
    }

    public static function findByEmail($username)
    {
        $myuser = Member::find()->all();
        foreach ($myuser as $key => $value) {
            if (strcasecmp($value['email'], $username) === 0) {
                return new static($value);
            }
        }

        return null;
    }

    public static function getEmail($username)
    {
        $myuser = Member::find()->all();
        foreach ($myuser as $key => $value) {
            if (strcasecmp($value['email'], $username) === 0) {
                return $value['email'];
            }
        }

        return null;
    }

    public static function getName($username)
    {
        $myuser = Member::find()->all();
        foreach ($myuser as $key => $value) {
            if (strcasecmp($value['email'], $username) === 0) {
                return $value['first_name'];
            }
        }

        return null;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
