<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cat_option".
 *
 * @property integer $id
 * @property integer $incat_id
 * @property string $value
 */
class CatOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_option';
    }

     public function getInCategory()
    {
        return $this->hasMany(InCategory::className(), ['id' => 'incat_id']);
    }
    public function getIn()
    {
        return $this->hasMany(InCategory::className(), ['id' => 'incat_id']);
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
            [['incat_id'], 'integer'],
            [['value'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'incat_id' => 'Incat ID',
            'value' => 'Value',
        ];
    }
}
