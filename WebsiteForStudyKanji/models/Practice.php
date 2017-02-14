<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;

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
	public $upload_foler ='uploads';
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
            [['practice_ch', 'practice_no'], 'required'],
            [['practice_ch', 'practice_no'], 'string', 'max' => 2],
            [['question'], 'file','skipOnEmpty' => true,'extensions' => 'png,jpg'],
            [['meaning', 'pron'], 'file','skipOnEmpty' => true,'extensions' => 'png,jpg'],
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

    public function upload($model,$attribute)
	{
	    $photo  = UploadedFile::getInstance($model, $attribute);
	      $path = $this->getUploadPath();
	    if ($this->validate() && $photo !== null) {

	    	if($attribute=="question")
	    	{
	    		$fileName = "Q" . $this->practice_ch . $this->practice_no . '.' . $photo->extension;
	    	}
	    	elseif ($attribute=="meaning") {
	    		$fileName = "M" . $this->practice_ch . $this->practice_no . '.' . $photo->extension;
	    	}
	    	elseif ($attribute=="pron") {
	    		$fileName = "P" . $this->practice_ch . $this->practice_no . '.' . $photo->extension;
	    	}

	        // $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
	        //$fileName = $photo->baseName . '.' . $photo->extension;
	        if($photo->saveAs($path.$fileName)){
	          return $fileName;
	        }
	    }
	    return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
	}

	public function getUploadPath(){
	  return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
	}

    public function getUploadUrl(){
	  return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
	}

	public function getPhotoViewer(){
	  return empty($this->question) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->question;
	}

	public function getPhotoViewer2(){
	  return empty($this->meaning) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->meaning;
	}

	public function getPhotoViewer3(){
	  return empty($this->pron) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->pron;
	}
}
