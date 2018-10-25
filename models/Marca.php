<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marca".
 *
 * @property int $IdMarca Es el identificador de la marca 
 * @property int $IdLaboratorio
 * @property string $Nombre Indica el nombre de la marca 
 *
 * @property Laboratorio $laboratorio
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdLaboratorio'], 'required'],
            [['IdLaboratorio'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['IdLaboratorio'], 'exist', 'skipOnError' => true, 'targetClass' => Laboratorio::className(), 'targetAttribute' => ['IdLaboratorio' => 'IdLaboratorio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMarca' => 'Id Marca',
            'IdLaboratorio' => 'Id Laboratorio',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaboratorio()
    {
        return $this->hasOne(Laboratorio::className(), ['IdLaboratorio' => 'IdLaboratorio']);
    }
}
