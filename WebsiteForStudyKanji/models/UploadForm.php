<?php
    namespace app\models;
    use yii\base\Model;
    use yii\web\UploadedFile;
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
    }
?>