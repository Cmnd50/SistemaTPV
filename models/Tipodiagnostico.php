<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipodiagnostico".
 *
 * @property int $IdTipoDiagnostico
 * @property string $NombreDiagnostico
 *
 * @property Enfermedad[] $enfermedads
 */
class Tipodiagnostico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipodiagnostico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreDiagnostico'], 'required'],
            [['NombreDiagnostico'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdTipoDiagnostico' => 'Id Tipo Diagnostico',
            'NombreDiagnostico' => 'Nombre Diagnostico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermedads()
    {
        return $this->hasMany(Enfermedad::className(), ['IdTipoDiagnostico' => 'IdTipoDiagnostico']);
    }
}
