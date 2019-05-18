<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicador".
 *
 * @property int $IdIndicador Es el identificador del indicador o toma de signos en la enfermería 
 * @property int $IdConsulta Es el identificador de la consulta 
 * @property double $Peso Indica el peso de la persona 
 * @property int $UnidadPeso Indica la unidad de medida del peso 
 * @property double $Altura Indica la altura 
 * @property int $UnidadAltura Indica la unidad de medida de la altura 
 * @property double $Temperatura Indica la temperatura de la persona 
 * @property int $UnidadTemperatura Indica la unidade de medida de la temperatura 
 * @property string $Pulso Indica el pulso de la persona 
 * @property int $PresionMax Indica la presión maxima de la persona 
 * @property int $PresionMin Indica la presión minima de la persona 
 * @property string $Observaciones Observaciones o notas adicionales 
 * @property string $PeriodoMeunstral
 * @property string $Glucotex
 * @property string $PC
 * @property string $PT
 * @property string $PA
 * @property string $FR
 * @property string $PAP
 * @property string $Motivo
 *
 * @property Consulta $consulta
 */
class Indicador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdConsulta', 'Peso', 'UnidadPeso', 'Altura', 'UnidadAltura', 'Temperatura', 'UnidadTemperatura', 'Pulso', 'PresionMax', 'PresionMin'], 'required'],
            [['IdConsulta', 'UnidadPeso', 'UnidadAltura', 'UnidadTemperatura', 'PresionMax', 'PresionMin'], 'integer'],
            [['Peso', 'Altura', 'Temperatura'], 'number'],
            [['Observaciones', 'Motivo'], 'string'],
            [['Pulso'], 'string', 'max' => 11],
            [['PeriodoMeunstral', 'PAP'], 'string', 'max' => 10],
            [['Glucotex', 'PC', 'PT', 'PA', 'FR'], 'string', 'max' => 45],
            [['IdConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['IdConsulta' => 'IdConsulta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdIndicador' => 'ID Indicador',
            'IdConsulta' => 'ID de Consulta',
            'Peso' => 'Peso',
            'UnidadPeso' => 'Unidad',
            'Altura' => 'Altura',
            'UnidadAltura' => 'Unidad',
            'Temperatura' => 'Temperatura',
            'UnidadTemperatura' => 'Unidad',
            'Pulso' => 'Pulso',
            'PresionMax' => 'Presion Max',
            'PresionMin' => 'Presion Min',
            'Observaciones' => 'Observaciones',
            'PeriodoMeunstral' => 'Periodo Meunstral',
            'Glucotex' => 'Glucotex',
            'PC' => 'P C',
            'PT' => 'P T',
            'PA' => 'P A',
            'FR' => 'F R',
            'PAP' => 'P A P',
            'Motivo' => 'Motivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['IdConsulta' => 'IdConsulta']);
    }
}
