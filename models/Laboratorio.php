<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorio".
 *
 * @property int $IdLaboratorio Es el indentificador del laboratorio
 * @property string $NombreLaboratorio Indica el nombre del labortorio
 *
 * @property Marca[] $marcas
 * @property Medicamentos[] $medicamentos
 */
class Laboratorio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreLaboratorio'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdLaboratorio' => 'Id Laboratorio',
            'NombreLaboratorio' => 'Nombre Laboratorio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcas()
    {
        return $this->hasMany(Marca::className(), ['IdLaboratorio' => 'IdLaboratorio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentos()
    {
        return $this->hasMany(Medicamentos::className(), ['IdLaboratorio' => 'IdLaboratorio']);
    }
}
