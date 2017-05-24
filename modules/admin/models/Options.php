<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property integer $size_product
 * @property integer $size_md
 * @property integer $size_sm
 * @property integer $size_xs
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['vk', 'facebook' , 'twitter', 'youtube', 'skype', 'google', 'instagram'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
         
        ];
    }
}
