<?php
    namespace app\models;
    use yii\base\Model;
    use yii\web\UploadedFile;

	use Yii;

    /**
    * UploadForm is the model behind the upload form.
    */
    class UploadForm extends Model
    {
        /**
         * @var UploadedFile|Null file attribute
         */
        public $file;
        public $file2;
        public $file3;

        /**
         * @return array the validation rules.
         */
        public function rules()
        {
            return [
                [['file'], 'file'],
                [['file2'], 'file'],
                [['file3'], 'file'],
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'file' => 'เลือกไฟล์รูปภาพที่ใช้เป็นคำถาม',
                'file2' => 'เลือกไฟล์รูปภาพที่ใช้เป็นคำตอบที่เป็นความหมาย',
                'file3' => 'เลือกไฟล์รูปภาพที่ใช้เป็นคำตอบที่เป็นคำอ่านตัวอักษร',
            ];
        }

    }
?>