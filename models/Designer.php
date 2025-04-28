<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "designer".
 *
 * @property int $id
 * @property string $FCs
 *
 * @property Product[] $products
 */
class Designer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'designer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FCs'], 'required'],
            [['FCs'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FCs' => 'F Cs',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['desinger_id' => 'id']);
    }

    public static function getDesigners()
    {
        return 
            self::find()
                    ->select('FCs')
                    ->indexBy('id')
                    ->column();
    }
}
