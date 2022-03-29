<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property int $empleadoid
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $fecha_nac
 * @property int|null $reporta_a
 * @property int|null $extension
 *
 * @property Empleados[] $empleados
 * @property Ordenes[] $ordenes
 * @property Empleados $reportaA
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empleadoid'], 'required'],
            [['empleadoid', 'reporta_a', 'extension'], 'default', 'value' => null],
            [['empleadoid', 'reporta_a', 'extension'], 'integer'],
            [['fecha_nac'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 30],
            [['empleadoid'], 'unique'],
            [['reporta_a'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['reporta_a' => 'empleadoid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empleadoid' => 'Empleadoid',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nac' => 'Fecha Nac',
            'reporta_a' => 'Reporta A',
            'extension' => 'Extension',
        ];
    }

    /**
     * Gets query for [[Empleados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleados::className(), ['reporta_a' => 'empleadoid']);
    }

    /**
     * Gets query for [[Ordenes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenes()
    {
        return $this->hasMany(Ordenes::className(), ['empleadoid' => 'empleadoid']);
    }

    /**
     * Gets query for [[ReportaA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReportaA()
    {
        return $this->hasOne(Empleados::className(), ['empleadoid' => 'reporta_a']);
    }
}
