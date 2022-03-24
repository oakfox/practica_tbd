<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "proveedores".
 *
 * @property int $proveedorid
 * @property string $nombreprov
 * @property string $contacto
 * @property string|null $celuprov
 * @property string|null $fijoprov
 *
 * @property Productos[] $productos
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proveedorid', 'nombreprov', 'contacto'], 'required'],
            [['proveedorid'], 'default', 'value' => null],
            [['proveedorid'], 'integer'],
            [['nombreprov', 'contacto'], 'string', 'max' => 50],
            [['celuprov', 'fijoprov'], 'string', 'max' => 12],
            [['proveedorid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proveedorid' => 'Proveedorid',
            'nombreprov' => 'Nombreprov',
            'contacto' => 'Contacto',
            'celuprov' => 'Celuprov',
            'fijoprov' => 'Fijoprov',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['proveedorid' => 'proveedorid']);
    }

    public static function getLproveedor(){
        $objeto=Proveedores::findBySql("select proveedorid, concat(trim(nombreprov),' [',trim(contacto),']') nombre
from proveedores
order by nombreprov asc")->asArray()->all();
        return ArrayHelper::map($objeto,'proveedorid','nombre');
    }
}
