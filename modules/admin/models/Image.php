<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'image';
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['file'], 'file', 'skipOnEmpty' => true], 
            [['name'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'product_id' => '# товара',
            'name' => 'Фото',
        ];
    }
}
