<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "practice_transaction".
 *
 * @property integer $id
 * @property string $email
 * @property string $practice_ch
 * @property string $do_date
 * @property integer $score
 */
class PracticeTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'practice_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'practice_ch', 'do_date'/*, 'score'*/, 'expired_date'], 'required'],
            // [['do_date', 'expired_date'], 'safe'],
            [['score'], 'integer'],
            [['email'], 'string', 'max' => 50],
            [['practice_ch'], 'string', 'max' => 2],
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
            'practice_ch' => 'หมายเลขของแบบทดสอบ',
            'do_date' => 'วันที่และเวลาเข้าทำแบบทดสอบ',
            'score' => 'ผลคะแนน',
            'expired_date' => 'วันเวลาหมดอายุ',
        ];
    }
}
