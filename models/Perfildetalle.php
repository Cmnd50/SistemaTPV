<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfildetalle".
 *
 * @property int $IdPerfil
 * @property int $IdMenu
 * @property bool $Seleccionar
 * @property bool $Insertar
 * @property bool $Actualizar
 * @property bool $Eliminar
 * @property bool $Imprimir
 * @property bool $Activo
 *
 * @property Menu $menu
 * @property Perfil $perfil
 */
class Perfildetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfildetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPerfil', 'IdMenu'], 'required'],
            [['IdPerfil', 'IdMenu'], 'integer'],
            [['Seleccionar', 'Insertar', 'Actualizar', 'Eliminar', 'Imprimir', 'Activo'], 'boolean'],
            [['IdPerfil', 'IdMenu'], 'unique', 'targetAttribute' => ['IdPerfil', 'IdMenu']],
            [['IdMenu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['IdMenu' => 'IdMenu']],
            [['IdPerfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['IdPerfil' => 'IdPerfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdPerfil' => 'Id Perfil',
            'IdMenu' => 'Id Menu',
            'Seleccionar' => 'Seleccionar',
            'Insertar' => 'Insertar',
            'Actualizar' => 'Actualizar',
            'Eliminar' => 'Eliminar',
            'Imprimir' => 'Imprimir',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['IdMenu' => 'IdMenu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['IdPerfil' => 'IdPerfil']);
    }
}
