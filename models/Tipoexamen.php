<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoexamen".
 *
 * @property int $IdTipoExamen
 * @property string $NombreExamen
 *
 * @property Examenesvarios[] $examenesvarios
 * @property Examenheces[] $examenheces
 * @property Examenhemograma[] $examenhemogramas
 * @property Examenorina[] $examenorinas
 * @property Examenquimica[] $examenquimicas
 * @property Listaexamen[] $listaexamens
 * @property Logexamenes[] $logexamenes
 */
class Tipoexamen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoexamen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreExamen'], 'required'],
            [['NombreExamen'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdTipoExamen' => 'Id Tipo Examen',
            'NombreExamen' => 'Nombre Examen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesvarios()
    {
        return $this->hasMany(Examenesvarios::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenheces()
    {
        return $this->hasMany(Examenheces::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenhemogramas()
    {
        return $this->hasMany(Examenhemograma::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenorinas()
    {
        return $this->hasMany(Examenorina::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenquimicas()
    {
        return $this->hasMany(Examenquimica::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaexamens()
    {
        return $this->hasMany(Listaexamen::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogexamenes()
    {
        return $this->hasMany(Logexamenes::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }
}
