<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta".
 *
 * @property int $IdPregunta Es el identificador de la pregunta 
 * @property int $IdFactor Es el identificador del factor con la ponderación 
 * @property string $Nombre Indica el nombre de la pregunta 
 * @property string $Descripcion Descripción de la pregunta 
 * @property double $Ponderacion Indica la ponderación de la pregunta 
 * @property bool $Activo Indica el estado (activo o inactivo)
 *
 * @property Factor $factor
 * @property Respuesta[] $respuestas
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pregunta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdFactor'], 'required'],
            [['IdFactor'], 'integer'],
            [['Ponderacion'], 'number'],
            [['Activo'], 'boolean'],
            [['Nombre', 'Descripcion'], 'string', 'max' => 100],
            [['IdFactor'], 'exist', 'skipOnError' => true, 'targetClass' => Factor::className(), 'targetAttribute' => ['IdFactor' => 'IdFactor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdPregunta' => 'Pregunta',
            'IdFactor' => 'Factor',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Ponderacion' => 'Ponderacion',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactor()
    {
        return $this->hasOne(Factor::className(), ['IdFactor' => 'IdFactor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestas()
    {
        return $this->hasMany(Respuesta::className(), ['IdPregunta' => 'IdPregunta']);
    }
}
