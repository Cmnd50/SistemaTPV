<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $IdRespuesta Es el identificador de la respuesta 
 * @property int $IdPregunta Es el identificador de la pregunta 
 * @property string $Nombre Indica el nombre de la respuesta 
 * @property string $Descripcion Descripción de la respuesta 
 * @property double $Ponderacion Indica la ponderación de la respuesta 
 * @property bool $Activo Indica el estado (activo o inactivo)
 *
 * @property Pregunta $pregunta
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPregunta'], 'integer'],
            [['Ponderacion'], 'number'],
            [['Activo'], 'boolean'],
            [['Nombre'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 100],
            [['IdPregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['IdPregunta' => 'IdPregunta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdRespuesta' => 'Id Respuesta',
            'IdPregunta' => 'Pregunta',
            'Nombre' => 'Repuesta',
            'Descripcion' => 'Descripcion',
            'Ponderacion' => 'Ponderacion',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPregunta()
    {
        return $this->hasOne(Pregunta::className(), ['IdPregunta' => 'IdPregunta']);
    }
}
