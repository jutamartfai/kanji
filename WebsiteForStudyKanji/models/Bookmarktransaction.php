<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookmark_transaction".
 *
 * @property integer $id
 * @property string $email
 * @property string $kanji_ch
 * @property string $view_date
 */
class Bookmarktransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookmark_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'kanji_ch', 'view_date'], 'required'],
            [['view_date'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['kanji_ch'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับ',
            'email' => 'อีเมล์ของสมาชิก',
            'kanji_ch' => 'หมายเลขของบทเรียน',
            'view_date' => 'วันและเวลาที่เข้าดูบทเรียน',
        ];
    }
}
