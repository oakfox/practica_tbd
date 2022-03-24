<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $productoid
 * @property int $proveedorid
 * @property int|null $categoriaid
 * @property string|null $descripcion
 * @property float $preciounit
 * @property int $existencia
 *
 * @property Categorias $categoria
 * @property DetalleOrdenes[] $detalleOrdenes
 * @property Proveedores $proveedor
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productoid', 'proveedorid', 'preciounit', 'existencia'], 'required'],
            [['productoid', 'proveedorid', 'categoriaid', 'existencia'], 'default', 'value' => null],
            [['productoid', 'proveedorid', 'categoriaid', 'existencia'], 'integer'],
            [['preciounit'], 'number'],
            [['descripcion'], 'string', 'max' => 50],
            [['productoid'], 'unique'],
            [['categoriaid'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoriaid' => 'categoriaid']],
            [['proveedorid'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['proveedorid' => 'proveedorid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productoid' => 'ID',
            'proveedorid' => 'Proveedor',
            'nproveedorid' => 'Proveedor',
            'categoriaid' => 'Categoria',
            'ncategoriaid' => 'Categoria',
            'descripcion' => 'Descripción',
            'preciounit' => 'Precio unitario',
            'existencia' => 'Existencias',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */

    function getNproveedorid(){
        //$pr=Proveedores::findBySql("select * from proveedores where proveedorid=:proveedorid",[':proveedorid'=>$this->proveedorid])->one();
        //return $pr['nombreprov'];
        $pr=Proveedores::findOne(['proveedorid'=>$this->proveedorid]);
        return $pr->nombreprov;
    }

    function getNcategoriaid(){
        $ca=Categorias::findOne(['categoriaid'=>$this->categoriaid]);
        return $ca->nombrecat;
    }

    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['categoriaid' => 'categoriaid']);
    }

    /**
     * Gets query for [[DetalleOrdenes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdenes()
    {
        return $this->hasMany(DetalleOrdenes::className(), ['productoid' => 'productoid']);
    }

    /**
     * Gets query for [[Proveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['proveedorid' => 'proveedorid']);
    }


}
