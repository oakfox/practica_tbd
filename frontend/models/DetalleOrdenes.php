<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_ordenes".
 *
 * @property int $ordenid
 * @property int $detalleid
 * @property int $productoid
 * @property int $cantidad
 *
 * @property Ordenes $orden
 * @property Productos $producto
 */
class DetalleOrdenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_ordenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ordenid', 'detalleid', 'productoid', 'cantidad'], 'required'],
            [['ordenid', 'detalleid', 'productoid', 'cantidad'], 'default', 'value' => null],
            [['ordenid', 'detalleid', 'productoid', 'cantidad'], 'integer'],
            [['ordenid', 'detalleid'], 'unique', 'targetAttribute' => ['ordenid', 'detalleid']],
            [['ordenid'], 'exist', 'skipOnError' => true, 'targetClass' => Ordenes::className(), 'targetAttribute' => ['ordenid' => 'ordenid']],
            [['productoid'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['productoid' => 'productoid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ordenid' => 'Ordenid',
            'detalleid' => 'Detalleid',
            'productoid' => 'Productoid',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[Orden]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrden()
    {
        return $this->hasOne(Ordenes::className(), ['ordenid' => 'ordenid']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['productoid' => 'productoid']);
    }
}
