<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geografia".
 *
 * @property string $IdGeografia Es el identificador de la zona geografica 
 * @property string $Nombre Indica el nombre de la zona geografica 
 * @property string $IdPadre Es el identificador del padre de la zona 
 * @property int $Nivel Indica el nivel de la zona 
 * @property string $Jerarquia Indica la jerarquia de la zona 
 *
 * @property Persona[] $personas
 */
class Geografia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geografia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdGeografia', 'Nombre', 'Nivel', 'Jerarquia'], 'required'],
            [['Nivel'], 'integer'],
            [['IdGeografia', 'IdPadre'], 'string', 'max' => 20],
            [['Nombre'], 'string', 'max' => 50],
            [['Jerarquia'], 'string', 'max' => 900],
            [['IdGeografia'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdGeografia' => 'Id Geografia',
            'Nombre' => 'Nombre',
            'IdPadre' => 'Id Padre',
            'Nivel' => 'Nivel',
            'Jerarquia' => 'Jerarquia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['IdGeografia' => 'IdGeografia']);
    }
}
