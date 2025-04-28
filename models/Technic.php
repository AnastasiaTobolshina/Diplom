<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "technic".
 *
 * @property int $id
 * @property string $title
 *
 * @property Product[] $products
 */
class Technic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['technic_id' => 'id']);
    }

    public static function getTechnics()
    {
        return 
            self::find()
                    ->select('title')
                    ->indexBy('id')
                    ->column();
    }
}
