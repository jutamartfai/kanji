<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "practice".
 *
 * @property string $practice_ch
 * @property string $practice_no
 * @property string $question
 * @property string $meaning
 * @property string $pron
 */
class Practice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'practice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['practice_ch', 'practice_no', 'question', 'meaning', 'pron'], 'required'],
            [['practice_ch', 'practice_no'], 'string', 'max' => 2],
            [['question'], 'string', 'max' => 10],
            [['meaning', 'pron'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'practice_ch' => 'ลำดับหมายเลขบทของแบบทดสอบ',
            'practice_no' => 'ลำดับข้อของแบบทดสอบ',
            'question' => 'ไฟล์รูปภาพที่ใช้เป็นคำถาม',
            'meaning' => 'ไฟล์รูปภาพที่ใช้เป็นคำตอบที่เป็นความหมาย',
            'pron' => 'ไฟล์รูปภาพที่ใช้เป็นคำตอบที่เป็นคำอ่านตัวอักษร',
        ];
    }
}
