<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motivoprocedimiento".
 *
 * @property int $IdMotivoProcedimiento
 * @property string $Nombre
 * @property string $DescripcionProcedimiento
 *
 * @property Enfermeriaprocedimiento[] $enfermeriaprocedimientos
 */
class Motivoprocedimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'motivoprocedimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'DescripcionProcedimiento'], 'required'],
            [['Nombre', 'DescripcionProcedimiento'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMotivoProcedimiento' => 'Id Motivo Procedimiento',
            'Nombre' => 'Nombre',
            'DescripcionProcedimiento' => 'Descripcion Procedimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeriaprocedimientos()
    {
        return $this->hasMany(Enfermeriaprocedimiento::className(), ['IdMotivoProcedimiento' => 'IdMotivoProcedimiento']);
    }
}
