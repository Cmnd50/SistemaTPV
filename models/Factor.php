<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factor".
 *
 * @property int $IdFactor Es el identificador del factor socioeconomico 
 * @property string $Nombre Indica el nombre del factor 
 * @property string $Descripcion Descripción del factor 
 * @property double $Ponderacion Indica la ponderación del factor 
 * @property bool $Activo Indica el estado (activo o inactivo)
 *
 * @property Pregunta[] $preguntas
 */
class Factor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ponderacion'], 'number'],
            [['Activo'], 'boolean'],
            [['Nombre'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdFactor' => 'Id Factor',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Ponderacion' => 'Ponderacion',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreguntas()
    {
        return $this->hasMany(Pregunta::className(), ['IdFactor' => 'IdFactor']);
    }
}
