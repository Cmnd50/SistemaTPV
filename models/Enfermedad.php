<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enfermedad".
 *
 * @property int $IdEnfermedad Es el identificador de la enfermedad 
 * @property string $Codigo
 * @property int $Numero
 * @property string $Nombre Indica el nombre de la enfermedad 
 * @property int $IdTipoDiagnostico
 *
 * @property Consulta[] $consultas
 * @property Consultaindicador[] $consultaindicadors
 * @property Consulta[] $consultas0
 * @property Tipodiagnostico $tipoDiagnostico
 */
class Enfermedad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enfermedad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Codigo', 'Numero', 'Nombre', 'IdTipoDiagnostico'], 'required'],
            [['Numero', 'IdTipoDiagnostico'], 'integer'],
            [['Codigo', 'Nombre'], 'string', 'max' => 45],
            [['IdTipoDiagnostico'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodiagnostico::className(), 'targetAttribute' => ['IdTipoDiagnostico' => 'IdTipoDiagnostico']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdEnfermedad' => 'Id Enfermedad',
            'Codigo' => 'Codigo',
            'Numero' => 'Numero',
            'Nombre' => 'Nombre',
            'IdTipoDiagnostico' => 'Id Tipo Diagnostico',
            'fullNameEnfe' => Yii::t('app', 'Full Name'),
            'fullNameEnfe' => 'Enfermedad'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['IdEnfermedad' => 'IdEnfermedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultaindicadors()
    {
        return $this->hasMany(Consultaindicador::className(), ['IdEnfermedad' => 'IdEnfermedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas0()
    {
        return $this->hasMany(Consulta::className(), ['IdConsulta' => 'IdConsulta'])->viaTable('consultaindicador', ['IdEnfermedad' => 'IdEnfermedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDiagnostico()
    {
        return $this->hasOne(Tipodiagnostico::className(), ['IdTipoDiagnostico' => 'IdTipoDiagnostico']);
    }

    public function getFullNameEnfe()
    {
            return 'ICD: '.$this->Numero.' - '.$this->Nombre;
    }
}
