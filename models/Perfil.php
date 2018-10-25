<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $IdPerfil
 * @property string $Descripcion
 *
 * @property Perfildetalle[] $perfildetalles
 * @property Menu[] $menus
 * @property Usuario[] $usuarios
 * @property Usuarioperfil[] $usuarioperfils
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdPerfil' => 'Id Perfil',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfildetalles()
    {
        return $this->hasMany(Perfildetalle::className(), ['IdPerfil' => 'IdPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['IdMenu' => 'IdMenu'])->viaTable('perfildetalle', ['IdPerfil' => 'IdPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['IdPuesto' => 'IdPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioperfils()
    {
        return $this->hasMany(Usuarioperfil::className(), ['IdPerfil' => 'IdPerfil']);
    }
}
