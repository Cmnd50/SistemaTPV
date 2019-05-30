<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "limpiartablas".
 *
 * @property int $IdLimpiarTabla
 * @property string $Query
 * @property string $Orden
 * @property string $Activo
 */
class Limpiartablas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'limpiartablas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdLimpiarTabla', 'Query', 'Orden'], 'required'],
            [['IdLimpiarTabla'], 'integer'],
            [['Query'], 'string', 'max' => 200],
            [['Orden'], 'string', 'max' => 45],
            [['Activo'], 'string', 'max' => 1],
            [['IdLimpiarTabla'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdLimpiarTabla' => 'Id Limpiar Tabla',
            'Query' => 'Query',
            'Orden' => 'Orden',
            'Activo' => 'Activo',
        ];
    }
}
