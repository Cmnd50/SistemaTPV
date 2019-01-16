<?php

namespace app\models;
use yii\helpers\Html;
use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $IdConsulta Es el identificador de la consulta
 * @property int $IdUsuario Es el identificador del medico 
 * @property int $IdPersona Es el identificador de la persona (paciente)
 * @property int $IdModulo Es el identifiador del modulo o areas 
 * @property string $Diagnostico Diagnostico de la consulta 
 * @property string $Comentarios Comentarios extras de la consulta
 * @property string $Otros Espacio para anotaciones libres 
 * @property int $IdEnfermedad Es el identificador de la enfermedad
 * @property string $FechaConsulta Indica la fecha de la consulta
 * @property int $Activo
 * @property int $IdEstado
 * @property int $Status
 * @property string $EstadoNutricional
 * @property string $CirugiasPrevias
 * @property string $MedicamentosActuales
 * @property string $ExamenFisica
 * @property string $PlanTratamiento
 * @property string $FechaProxVisita
 * @property string $Alergias
 *
 * @property Estado $estado
 * @property Modulo $modulo
 * @property Enfermedad $enfermedad
 * @property Persona $persona
 * @property Consultaindicador[] $consultaindicadors
 * @property Enfermedad[] $enfermedads
 * @property Examenesvarios[] $examenesvarios
 * @property Examenheces[] $examenheces
 * @property Examenhemograma[] $examenhemogramas
 * @property Examenorina[] $examenorinas
 * @property Examenquimica[] $examenquimicas
 * @property Indicador[] $indicadors
 * @property Listaexamen[] $listaexamens
 * @property Receta[] $recetas
 * @property Usuario[] $usuario
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUsuario', 'IdPersona', 'IdModulo', 'IdEnfermedad', 'Activo', 'IdEstado', 'Status'], 'integer'],
            [['Diagnostico', 'Comentarios', 'Otros', 'EstadoNutricional', 'CirugiasPrevias', 'MedicamentosActuales', 'ExamenFisica', 'PlanTratamiento', 'Alergias'], 'string'],
            [['FechaConsulta', 'FechaProxVisita'], 'safe'],
            [['IdEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['IdEstado' => 'IdEstado']],
            [['IdModulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['IdModulo' => 'IdModulo']],
            [['IdEnfermedad'], 'exist', 'skipOnError' => true, 'targetClass' => Enfermedad::className(), 'targetAttribute' => ['IdEnfermedad' => 'IdEnfermedad']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'IdPersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        if($_SESSION['IdIdioma'] == 1){
             return [
            'IdConsulta' => 'Id Consulta',
            'IdUsuario' => 'Id Usuario',
            'IdPersona' => 'Paciente',
            'IdModulo' => 'Modulo',
            'Diagnostico' => 'Diagnostico',
            'Comentarios' => 'Comentarios',
            'Otros' => 'Otros',
            'IdEnfermedad' => 'Id Enfermedad',
            'FechaConsulta' => 'Fecha Consulta',
            'Activo' => 'Activo',
            'IdEstado' => 'Id Estado',
            'Status' => 'Status',
            'EstadoNutricional' => 'Estado Nutricional',
            'CirugiasPrevias' => 'Cirugias Previas',
            'MedicamentosActuales' => 'Medicamentos Actuales',
            'ExamenFisica' => 'Examen Fisica',
            'PlanTratamiento' => 'Plan Tratamiento',
            'FechaProxVisita' => 'Fecha Prox Visita',
            'Alergias' => 'Alergias',
        ];
        }
        else{
            return [
            'IdConsulta' => 'Id Consulta',
            'IdUsuario' => 'Id Usuario',
            'IdPersona' => 'Patient',
            'IdModulo' => 'Module',
            'Diagnostico' => 'Diagnostico',
            'Comentarios' => 'Comentarios',
            'Otros' => 'Otros',
            'IdEnfermedad' => 'Id Enfermedad',
            'FechaConsulta' => 'Fecha Consulta',
            'Activo' => 'Activo',
            'IdEstado' => 'Id Estado',
            'Status' => 'Status',
            'EstadoNutricional' => 'Estado Nutricional',
            'CirugiasPrevias' => 'Cirugias Previas',
            'MedicamentosActuales' => 'Medicamentos Actuales',
            'ExamenFisica' => 'Examen Fisica',
            'PlanTratamiento' => 'Plan Tratamiento',
            'FechaProxVisita' => 'Fecha Prox Visita',
            'Alergias' => 'Alergias',
            ];
        }
       
    }

    /**
     * @return \yii\db\ActiveQuery
     *
     * 
     */
    


    // public function getFullName()
    //  {
    //     $personas = Persona::className();
    //     return $personas->Nombres . ' ' . $personas->Apellidos;
    //  }


    // public function getUsuario()
    // {
    //     return $this->hasOne(Estado::className(), ['IdEstado' => 'IdEstado']);
    // }


    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['IdEstado' => 'IdEstado']);
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
    public function getEnfermedad()
    {
        return $this->hasOne(Enfermedad::className(), ['IdEnfermedad' => 'IdEnfermedad']);
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
    public function getConsultaindicadors()
    {
        return $this->hasMany(Consultaindicador::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermedads()
    {
        return $this->hasMany(Enfermedad::className(), ['IdEnfermedad' => 'IdEnfermedad'])->viaTable('consultaindicador', ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesvarios()
    {
        return $this->hasMany(Examenesvarios::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenheces()
    {
        return $this->hasMany(Examenheces::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenhemogramas()
    {
        return $this->hasMany(Examenhemograma::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenorinas()
    {
        return $this->hasMany(Examenorina::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenquimicas()
    {
        return $this->hasMany(Examenquimica::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadors()
    {
        return $this->hasMany(Indicador::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaexamens()
    {
        return $this->hasMany(Listaexamen::className(), ['IdConsulta' => 'IdConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['IdConsulta' => 'IdConsulta']);
    }


}
