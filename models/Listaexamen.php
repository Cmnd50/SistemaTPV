<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listaexamen".
 *
 * @property int $IdListaExamen
 * @property int $IdUsuario
 * @property int $IdConsulta
 * @property int $IdPersona
 * @property int $IdTipoExamen
 * @property int $Activo
 * @property string $FechaExamen
 * @property string $Indicacion
 *
 * @property Examenesvarios[] $examenesvarios
 * @property Examenheces[] $examenheces
 * @property Examenhemograma[] $examenhemogramas
 * @property Examenorina[] $examenorinas
 * @property Examenquimica[] $examenquimicas
 * @property Consulta $consulta
 * @property Persona $persona
 * @property Tipoexamen $tipoExamen
 * @property Usuario $usuario
 */
class Listaexamen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listaexamen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUsuario', 'IdConsulta', 'IdPersona', 'IdTipoExamen', 'Activo'], 'integer'],
            [['FechaExamen'], 'safe'],
            [['Indicacion'], 'string', 'max' => 500],
            [['IdConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['IdConsulta' => 'IdConsulta']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'IdPersona']],
            [['IdTipoExamen'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoexamen::className(), 'targetAttribute' => ['IdTipoExamen' => 'IdTipoExamen']],
            [['IdUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['IdUsuario' => 'IdUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdListaExamen' => 'Id Lista Examen',
            'IdUsuario' => 'Id Usuario',
            'IdConsulta' => 'Id Consulta',
            'IdPersona' => 'Paciente',
            'IdTipoExamen' => 'Examen',
            'Activo' => 'Activo',
            'FechaExamen' => 'Fecha',
            'Indicacion' => 'Indicacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesvarios()
    {
        return $this->hasMany(Examenesvarios::className(), ['IdListaExamen' => 'IdListaExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenheces()
    {
        return $this->hasMany(Examenheces::className(), ['IdListaExamen' => 'IdListaExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenhemogramas()
    {
        return $this->hasMany(Examenhemograma::className(), ['IdListaExamen' => 'IdListaExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenorinas()
    {
        return $this->hasMany(Examenorina::className(), ['IdListaExamen' => 'IdListaExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenquimicas()
    {
        return $this->hasMany(Examenquimica::className(), ['IdListaExamen' => 'IdListaExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoExamen()
    {
        return $this->hasOne(Tipoexamen::className(), ['IdTipoExamen' => 'IdTipoExamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['IdUsuario' => 'IdUsuario']);
    }
}
