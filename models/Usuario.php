<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $IdUsuario
 * @property string $InicioSesion
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Correo
 * @property string $Clave
 * @property int $Activo
 * @property int $IdPuesto
 * @property string $FechaIngreso
 *
 * @property Bajalotes[] $bajalotes
 * @property Enfermeriaprocedimiento[] $enfermeriaprocedimientos
 * @property Entradas[] $entradas
 * @property Examenesvarios[] $examenesvarios
 * @property Examenheces[] $examenheces
 * @property Examenhemograma[] $examenhemogramas
 * @property Examenorina[] $examenorinas
 * @property Examenquimica[] $examenquimicas
 * @property Listaexamen[] $listaexamens
 * @property Logexamenes[] $logexamenes
 * @property Receta[] $recetas
 * @property Salidas[] $salidas
 * @property Transaccion[] $transaccions
 * @property Puesto $puesto
 * @property Usuarioperfil[] $usuarioperfils
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Activo', 'IdPuesto'], 'integer'],
            [['FechaIngreso'], 'safe'],
            [['InicioSesion'], 'string', 'max' => 50],
            [['Nombres', 'Apellidos', 'Correo', 'Clave'], 'string', 'max' => 100],
            [['IdPuesto'], 'exist', 'skipOnError' => true, 'targetClass' => Puesto::className(), 'targetAttribute' => ['IdPuesto' => 'idPuesto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUsuario' => 'ID',
            'InicioSesion' => 'Usuario',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'Correo' => 'Correo',
            'Clave' => 'Clave',
            'Activo' => 'Activo',
            'IdPuesto' => 'Puesto',
            'FechaIngreso' => 'Fecha Ingreso',
            'fullName' => Yii::t('app', 'Full Name'),
            'fullName' => 'Medico'
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBajalotes()
    {
        return $this->hasMany(Bajalotes::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeriaprocedimientos()
    {
        return $this->hasMany(Enfermeriaprocedimiento::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesvarios()
    {
        return $this->hasMany(Examenesvarios::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenheces()
    {
        return $this->hasMany(Examenheces::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenhemogramas()
    {
        return $this->hasMany(Examenhemograma::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenorinas()
    {
        return $this->hasMany(Examenorina::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenquimicas()
    {
        return $this->hasMany(Examenquimica::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaexamens()
    {
        return $this->hasMany(Listaexamen::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogexamenes()
    {
        return $this->hasMany(Logexamenes::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salidas::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccions()
    {
        return $this->hasMany(Transaccion::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuesto()
    {
        return $this->hasOne(Puesto::className(), ['idPuesto' => 'IdPuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioperfils()
    {
        return $this->hasMany(Usuarioperfil::className(), ['IdUsuario' => 'IdUsuario']);
    }

        public function getFullName()
    {
            return $this->Nombres.' '.$this->Apellidos;
    }
}
