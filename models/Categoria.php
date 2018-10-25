<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $IdCategoria
 * @property string $NombreCategoria
 *
 * @property Medicamentos[] $medicamentos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreCategoria'], 'required'],
            [['NombreCategoria'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCategoria' => 'Id Categoria',
            'NombreCategoria' => 'Nombre Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentos()
    {
        return $this->hasMany(Medicamentos::className(), ['IdCategoria' => 'IdCategoria']);
    }
}
