<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kanji".
 *
 * @property string $kanji_ch
 * @property string $kanji_no
 * @property string $kanji
 * @property string $meaning
 * @property string $jp_pron
 * @property string $cn_pron
 * @property string $line_num
 * @property string $ex_vocab
 * @property string $how_to
 */
class Kanji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kanji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kanji_ch', 'kanji_no', 'kanji', 'meaning', 'jp_pron', 'cn_pron', 'line_num', 'ex_vocab', 'how_to'], 'required'],
            [['line_num'], 'integer', 'min' => 1],
            [['ex_vocab'], 'string'],
            [['kanji_ch', 'kanji_no'], 'string', 'max' => 2],
            [['kanji'], 'string', 'max' => 1],
            [['meaning', 'jp_pron'], 'string', 'max' => 100],
            [['cn_pron'], 'string', 'max' => 50],
            [['how_to'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kanji_ch' => 'ลำดับของบทเรียน',
            'kanji_no' => 'ลำดับของตัวอักษรคันจิ',
            'kanji' => 'ตัวอักษรคันจิ',
            'meaning' => 'ความหมาย',
            'jp_pron' => 'คำอ่านแบบญี่ปุ่น',
            'cn_pron' => 'คำอ่านแบบจีน',
            'line_num' => 'จำนวนขีด',
            'ex_vocab' => 'ตัวอย่างคำศัพท์',
            'how_to' => 'ลิงค์สำหรับฝังวิดีโอวิธีการเขียน',
        ];
    }
}