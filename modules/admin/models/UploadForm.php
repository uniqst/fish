<?php
namespace app\modules\admin\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('upload/' . $file->baseName . '.' . $file->extension);
            }
        // print_r($this->imageFiles);
            return true;
        } else {
            return false;
        }
    }

        public function attributeLabels()
        {
            [
            'imageFiles' => 'Фото',
            ];
        }


}