<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $desinger_id
 * @property int $technic_id
 * @property string $photo
 * @property string $description
 *
 * @property Comment[] $comments
 * @property Designer $desinger
 * @property Favorite[] $favorites
 * @property Order[] $orders
 * @property Technic $technic
 */
class Product extends \yii\db\ActiveRecord
{
    public const NO_PHOTO = 'noPhoto.jpg';

    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'desinger_id', 'technic_id', 'description'], 'required'],
            [['desinger_id', 'technic_id'], 'integer'],
            [['title', 'photo', 'description'], 'string', 'max' => 255],
            [['desinger_id'], 'exist', 'skipOnError' => true, 'targetClass' => Designer::class, 'targetAttribute' => ['desinger_id' => 'id']],
            [['technic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Technic::class, 'targetAttribute' => ['technic_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер товара',
            'title' => 'Название',
            'desinger_id' => 'Дизайнер',
            'technic_id' => 'Техника',
            'description' => 'Описание',
            'imageFile' => 'Изображение',
            'photo' => 'Изображение',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Desinger]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesinger()
    {
        return $this->hasOne(Designer::class, ['id' => 'desinger_id']);
    }

    /**
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Technic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechnic()
    {
        return $this->hasOne(Technic::class, ['id' => 'technic_id']);
    }

    public static function getProducts()
    {
        return 
            self::find()
                    ->select('title')
                    ->indexBy('id')
                    ->column();
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = Yii::$app->user->id
                            . '_'
                            . time()
                            . '_'
                            . Yii::$app->security->generateRandomString()
                            . '.'
                            . $this->imageFile->extension;
            $this->imageFile->saveAs('img/' . $fileName);
            $this->photo = $fileName;
            return true;
        } else {
            return false;
        }
    }
}
