<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $username
 * @property string $password
 */

class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'ชื่อผู้ใช้',
            'password' => 'รหัสผ่าน',
        ];
    }

        public static function findByUsername($username)
    {
        $myuser = Admin::find()->all();
        foreach ($myuser as $key => $value) {
            if (strcasecmp($value['username'], $username) === 0) {
                return new static($value);
            }
        }

        return null;
    }

    // public static function getEmail($username)
    // {
    //     $myuser = Admin::find()->all();
    //     foreach ($myuser as $key => $value) {
    //         if (strcasecmp($value['email'], $username) === 0) {
    //             return $value['email'];
    //         }
    //     }

    //     return null;
    // }

    public static function getUName($username)
    {
        $myuser = Admin::find()->all();
        foreach ($myuser as $key => $value) {
            if (strcasecmp($value['username'], $username) === 0) {
                return $value['username'];
            }
        }

        return null;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}