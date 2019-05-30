<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuraciongeneral".
 *
 * @property int $IdConfiguracionGeneral
 * @property string $IpServidora
 * @property string $NombreCarpeta
 * @property string $UnidadServer
 */
class Configuraciongeneral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configuraciongeneral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IpServidora', 'NombreCarpeta', 'UnidadServer'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdConfiguracionGeneral' => 'Id Configuracion General',
            'IpServidora' => 'Ip Servidora',
            'NombreCarpeta' => 'Nombre Carpeta',
            'UnidadServer' => 'Unidad Server',
        ];
    }
}
