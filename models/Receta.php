<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receta".
 *
 * @property int $IdReceta
 * @property int $IdUsuario
 * @property int $IdPersona
 * @property int $IdConsulta
 * @property string $Fecha
 * @property int $Activo
 * @property string $Comentarios
 * @property string $Consultaimaurl
 * @property string $IPServer
 * @property string $UnidadServer
 *
 * @property Consulta $consulta
 * @property Persona $persona
 * @property Usuario $usuario
 * @property RecetaMedicamentos[] $recetaMedicamentos
 * @property Salidas[] $salidas
 */
class Receta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUsuario', 'IdPersona', 'IdConsulta', 'Fecha'], 'required'],
            [['IdUsuario', 'IdPersona', 'IdConsulta', 'Activo'], 'integer'],
            [['Fecha'], 'safe'],
            [['Comentarios'], 'string', 'max' => 1000],
            [['Consultaimaurl'], 'string', 'max' => 400],
            [['IPServer', 'UnidadServer'], 'string', 'max' => 45],
            [['IdConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['IdConsulta' => 'IdConsulta']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'IdPersona']],
            [['IdUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['IdUsuario' => 'IdUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdReceta' => 'ID',
            'IdUsuario' => 'Medico',
            'IdPersona' => 'Paciente',
            'IdConsulta' => 'ID Consulta',
            'Fecha' => 'Fecha',
            'Activo' => 'Activo',
            'Comentarios' => 'Comentarios',
            'Consultaimaurl' => 'Consultaimaurl',
            'IPServer' => 'I P Server',
            'UnidadServer' => 'Unidad Server',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetaMedicamentos()
    {
        return $this->hasMany(RecetaMedicamentos::className(), ['IdReceta' => 'IdReceta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salidas::className(), ['IdReceta' => 'IdReceta']);
    }
}
