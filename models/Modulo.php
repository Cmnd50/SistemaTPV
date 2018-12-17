<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modulo".
 *
 * @property int $IdModulo
 * @property string $NombreModulo
 * @property string $Descripcion
 * @property bool $Activo
 *
 * @property Consulta[] $consultas
 * @property Enfermeriaprocedimiento[] $enfermeriaprocedimientos
 */
class Modulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Activo'], 'boolean'],
            [['NombreModulo'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdModulo' => 'Id Modulo',
            'NombreModulo' => 'Nombre Modulo',
            'Descripcion' => 'Descripcion',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['IdModulo' => 'IdModulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeriaprocedimientos()
    {
        return $this->hasMany(Enfermeriaprocedimiento::className(), ['IdModulo' => 'IdModulo']);
    }
}
