<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "puesto".
 *
 * @property int $idPuesto
 * @property string $Descripcion
 *
 * @property Usuario[] $usuarios
 */
class Puesto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'puesto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPuesto' => 'Id Puesto',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['IdPuesto' => 'idPuesto']);
    }
}
