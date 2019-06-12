<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $IdPersona Es el identificador de la persona (paciente)
 * @property string $Nombres Indica los nombres de la persona 
 * @property string $Apellidos Indica los apellidos de la persona 
 * @property string $FechaNacimiento Indica la fecha de nacimiento de la persona 
 * @property string $Direccion Indica la direcciÃ³n del domicilio de la persona 
 * @property string $Correo Indica el correo electrÃ³nico de la persona 
 * @property string $IdGeografia Es el identificador de la zona geogrÃ¡fica 
 * @property string $Genero Indica el genero de la persona 
 * @property int $IdEstadoCivil Es el identificador del estado civil de la persona 
 * @property string $IdParentesco Es el identificador del parentesco 
 * @property string $Telefono
 * @property string $Celular
 * @property string $Alergias
 * @property string $Medicamentos
 * @property string $Enfermedad
 * @property string $Dui
 * @property string $TelefonoResponsable
 * @property int $IdEstado
 * @property int $CodigoPaciente
 * @property string $Categoria
 * @property string $NombresResponsable Es el identificador del responsable (en caso de que sea menor de edad)
 * @property string $ApellidosResponsable
 * @property string $Parentesco
 * @property string $DuiResponsable
 * @property int $IdPais
 *
 * @property Consulta[] $consultas
 * @property Enfermeriaprocedimiento[] $enfermeriaprocedimientos
 * @property Examenesvarios[] $examenesvarios
 * @property Examenheces[] $examenheces
 * @property Examenhemograma[] $examenhemogramas
 * @property Examenorina[] $examenorinas
 * @property Examenquimica[] $examenquimicas
 * @property Listaexamen[] $listaexamens
 * @property Logexamenes[] $logexamenes
 * @property Estado $estado
 * @property Estadocivil $estadoCivil
 * @property Geografia $geografia
 * @property Receta[] $recetas
 * @property Test[] $tests
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombres', 'Apellidos', 'IdEstado'], 'required'],
            [['FechaNacimiento'], 'safe'],
            [['IdEstadoCivil', 'IdEstado', 'IdPais'], 'integer'],
            [['Nombres', 'Apellidos', 'Correo', 'IdParentesco', 'NombresResponsable', 'ApellidosResponsable'], 'string', 'max' => 100],
            [['Direccion'], 'string', 'max' => 500],
            [['IdGeografia','CodigoPaciente'], 'string', 'max' => 20],
            [['Genero'], 'string', 'max' => 9],
            [['Dui'], 'default', 'value' => null],
            [['Telefono', 'Celular', 'Dui', 'TelefonoResponsable'], 'string', 'max' => 15],
            [['Alergias', 'Medicamentos', 'Enfermedad'], 'string', 'max' => 800],
            [['Categoria', 'Parentesco', 'DuiResponsable'], 'string', 'max' => 45],
            [['IdEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['IdEstado' => 'IdEstado']],
            [['IdEstadoCivil'], 'exist', 'skipOnError' => true, 'targetClass' => Estadocivil::className(), 'targetAttribute' => ['IdEstadoCivil' => 'IdEstadoCivil']],
            [['IdGeografia'], 'exist', 'skipOnError' => true, 'targetClass' => Geografia::className(), 'targetAttribute' => ['IdGeografia' => 'IdGeografia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
     if($_SESSION['IdIdioma'] == 1){
        return [
            'IdPersona' => 'Paciente',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'FechaNacimiento' => 'Fecha Nacimiento',
            'Direccion' => 'Direccion',
            'Correo' => 'Correo',
            'IdGeografia' => 'Geografia',
            'Genero' => 'Genero',
            'IdEstadoCivil' => 'Estado Civil',
            'IdParentesco' => 'Parentesco',
            'Telefono' => 'Telefono',
            'Celular' => 'Celular',
            'Alergias' => 'Alergias',
            'Medicamentos' => 'Medicamentos',
            'Enfermedad' => 'Enfermedad',
            'Dui' => 'Dui',
            'TelefonoResponsable' => 'Telefono Responsable',
            'IdEstado' => 'Estado de Consulta',
            'Categoria' => 'Categoria',
            'NombresResponsable' => 'Nombres Responsable',
            'ApellidosResponsable' => 'Apellidos Responsable',
            'Parentesco' => 'Parentesco',
            'CodigoPaciente' => 'BC',
            'DuiResponsable' => 'Dui Responsable',
            'IdPais' => 'Pais',
            'estado.NombreEstado' => 'Estado',
            'fullName' => Yii::t('app', 'Full Name'),
            'fullName' => 'Paciente'
        ];
    }
    else{
        return [
           'IdPersona' => 'Paciente',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'FechaNacimiento' => 'Fecha Nacimiento',
            'Direccion' => 'Direccion',
            'Correo' => 'Correo',
            'IdGeografia' => 'Geografia',
            'Genero' => 'Genero',
            'IdEstadoCivil' => 'Estado Civil',
            'IdParentesco' => 'Parentesco',
            'Telefono' => 'Telefono',
            'Celular' => 'Celular',
            'Alergias' => 'Alergias',
            'Medicamentos' => 'Medicamentos',
            'Enfermedad' => 'Enfermedad',
            'Dui' => 'Dui',
            'TelefonoResponsable' => 'Telefono Responsable',
            'IdEstado' => 'Estado de Consulta',
            'Categoria' => 'Categoria',
            'NombresResponsable' => 'Nombres Responsable',
            'ApellidosResponsable' => 'Apellidos Responsable',
            'Parentesco' => 'Parentesco',
            'CodigoPaciente' => 'BC',
            'DuiResponsable' => 'Dui Responsable',
            'IdPais' => 'Pais',
            'estado.NombreEstado' => 'Estado',
            'fullName' => Yii::t('app', 'Full Name'),
            'fullName' => 'Patient'
            ];
    }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeriaprocedimientos()
    {
        return $this->hasMany(Enfermeriaprocedimiento::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesvarios()
    {
        return $this->hasMany(Examenesvarios::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenheces()
    {
        return $this->hasMany(Examenheces::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenhemogramas()
    {
        return $this->hasMany(Examenhemograma::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenorinas()
    {
        return $this->hasMany(Examenorina::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenquimicas()
    {
        return $this->hasMany(Examenquimica::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaexamens()
    {
        return $this->hasMany(Listaexamen::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogexamenes()
    {
        return $this->hasMany(Logexamenes::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['IdEstado' => 'IdEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoCivil()
    {
        return $this->hasOne(Estadocivil::className(), ['IdEstadoCivil' => 'IdEstadoCivil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeografia()
    {
        return $this->hasOne(Geografia::className(), ['IdGeografia' => 'IdGeografia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['IdPersona' => 'IdPersona']);
    }

    public function getFullName()
    {
            return $this->Nombres.' '.$this->Apellidos;
    }


}
