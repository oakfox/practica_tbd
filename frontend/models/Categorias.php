<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "categorias".
 *
 * @property int $categoriaid
 * @property string $nombrecat
 *
 * @property Productos[] $productos
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoriaid', 'nombrecat'], 'required'],
            [['categoriaid'], 'default', 'value' => null],
            [['categoriaid'], 'integer'],
            [['nombrecat'], 'string', 'max' => 50],
            [['categoriaid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoriaid' => 'Categoriaid',
            'nombrecat' => 'Nombrecat',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['categoriaid' => 'categoriaid']);
    }

    public static function getListanombrecat(){
        $lista=Categorias::findBySql("select * from categorias")->asArray()->all();
        return ArrayHelper::map($lista, 'categoriaid', 'nombrecat');
    }
}
