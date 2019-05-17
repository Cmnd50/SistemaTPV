<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enfermeriaprocedimiento".
 *
 * @property int $IdEnfermeriaProcedimiento
 * @property int $IdPersona
 * @property string $FechaProcedimiento
 * @property string $Observaciones
 * @property int $IdMotivoProcedimiento
 * @property int $IdUsuario
 * @property int $IdModulo
 * @property string $Estado
 * @property string $Procedimientoimaurl
 *
 * @property Modulo $modulo
 * @property Motivoprocedimiento $motivoProcedimiento
 * @property Persona $persona
 * @property Usuario $usuario
 * @property Indicadorprocedimiento[] $indicadorprocedimientos
 * @property Listaexamen[] $listaexamens
 * @property Listarayosx[] $listarayosxes
 */
class Enfermeriaprocedimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enfermeriaprocedimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPersona'], 'required'],
            [['IdPersona', 'IdMotivoProcedimiento', 'IdUsuario', 'IdModulo'], 'integer'],
            [['FechaProcedimiento'], 'safe'],
            [['Observaciones'], 'string'],
            [['Estado'], 'string', 'max' => 45],
            [['Procedimientoimaurl'], 'string', 'max' => 300],
            [['IdModulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['IdModulo' => 'IdModulo']],
            [['IdMotivoProcedimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Motivoprocedimiento::className(), 'targetAttribute' => ['IdMotivoProcedimiento' => 'IdMotivoProcedimiento']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'IdPersona']],
            [['IdUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['IdUsuario' => 'IdUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdEnfermeriaProcedimiento' => 'ID',
            'IdPersona' => 'Paciente',
            'FechaProcedimiento' => 'Fecha',
            'Observaciones' => 'Observaciones',
            'IdMotivoProcedimiento' => 'Motivo',
            'IdUsuario' => 'Medico',
            'IdModulo' => 'Modulo',
            'Estado' => 'Estado',
            'Procedimientoimaurl' => 'Procedimientoimaurl',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasOne(Modulo::className(), ['IdModulo' => 'IdModulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivoProcedimiento()
    {
        return $this->hasOne(Motivoprocedimiento::className(), ['IdMotivoProcedimiento' => 'IdMotivoProcedimiento']);
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
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadorprocedimientos()
    {
        return $this->hasMany(Indicadorprocedimiento::className(), ['IdEnfermeriaProcedimiento' => 'IdEnfermeriaProcedimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaexamens()
    {
        return $this->hasMany(Listaexamen::className(), ['IdEnfermeriaProcedimiento' => 'IdEnfermeriaProcedimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListarayosxes()
    {
        return $this->hasMany(Listarayosx::className(), ['IdEnfermeriaProcedimiento' => 'IdEnfermeriaProcedimiento']);
    }
}
