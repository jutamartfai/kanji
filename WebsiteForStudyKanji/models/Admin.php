<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord  implements IdentityInterface
{
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
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}