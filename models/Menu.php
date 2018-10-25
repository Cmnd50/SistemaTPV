<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $IdMenu
 * @property string $DescripcionMenu
 * @property string $Icono
 * @property string $TipoMenu
 *
 * @property Menudetalle[] $menudetalles
 * @property Menuusuario[] $menuusuarios
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DescripcionMenu', 'Icono', 'TipoMenu'], 'required'],
            [['DescripcionMenu', 'TipoMenu'], 'string', 'max' => 45],
            [['Icono'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMenu' => 'Id Menu',
            'DescripcionMenu' => 'Descripcion Menu',
            'Icono' => 'Icono',
            'TipoMenu' => 'Tipo Menu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenudetalles()
    {
        return $this->hasMany(Menudetalle::className(), ['IdMenu' => 'IdMenu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuusuarios()
    {
        return $this->hasMany(Menuusuario::className(), ['IdMenu' => 'IdMenu']);
    }
}
