<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property string $no
 * @property string $name
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no', 'name'], 'required'],
            [['no'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no' => 'ลำดับของบทเรียน',
            'name' => 'ชื่อของบทเรียน',
        ];
    }
}
