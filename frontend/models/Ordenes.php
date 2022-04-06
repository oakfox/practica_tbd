<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ordenes".
 *
 * @property int $ordenid
 * @property int $empleadoid
 * @property int $clienteid
 * @property string $fechaorden
 * @property int|null $descuento
 *
 * @property Clientes $cliente
 * @property DetalleOrdenes[] $detalleOrdenes
 * @property Empleados $empleado
 */
class Ordenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'empleadoid', 'clienteid', 'fechaorden'], 'required'],
            [['ordenid', 'empleadoid', 'clienteid', 'descuento'], 'default', 'value' => null],
            [['ordenid', 'empleadoid', 'clienteid', 'descuento'], 'integer'],
            [['fechaorden'], 'safe'],
            [['ordenid'], 'unique'],
            [['clienteid'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['clienteid' => 'clienteid']],
            [['empleadoid'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['empleadoid' => 'empleadoid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ordenid' => 'Ordenid',
            'empleadoid' => 'Empleadoid',
            'nempleadoid' => 'Empleado',
            'clienteid' => 'Clienteid',
            'nclienteid' => 'Cliente',
            'fechaorden' => 'Fechaorden',
            'descuento' => 'Descuento',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['clienteid' => 'clienteid']);
    }

    /**
     * Gets query for [[DetalleOrdenes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdenes()
    {
        return $this->hasMany(DetalleOrdenes::className(), ['ordenid' => 'ordenid']);
    }

    /**
     * Gets query for [[Empleado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleados::className(), ['empleadoid' => 'empleadoid']);
    }

    function getNempleadoid(){
        $emp=Empleados::findOne(['empleadoid'=>$this->empleadoid]);
        return $emp?$emp->nombre.' '.$emp->apellido:'--';
    }

    function getNclienteid(){
        $cli=Clientes::findOne(['clienteid'=>$this->clienteid]);
        return $cli?$cli->nombrecontacto:'--';
    }

    public static function getClientes(){
        $lista=Clientes::findBySql("select clienteid, concat(trim(nombrecia),'-',nombrecontacto) nombrecontacto from clientes")->asArray()->all();
        return ArrayHelper::map($lista, 'clienteid', 'nombrecontacto');
    }


}
