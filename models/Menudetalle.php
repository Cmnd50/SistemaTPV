<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menudetalle".
 *
 * @property int $IdMenuDetalle
 * @property int $IdMenu
 * @property string $DescripcionMenuDetalle
 * @property string $Url
 * @property string $Icono
 *
 * @property Menu $menu
 * @property Menuusuario[] $menuusuarios
 */
class Menudetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menudetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMenu'], 'required'],
            [['IdMenu'], 'integer'],
            [['DescripcionMenuDetalle', 'Url'], 'string', 'max' => 400],
            [['Icono'], 'string', 'max' => 200],
            [['IdMenu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['IdMenu' => 'IdMenu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMenuDetalle' => 'Id Menu Detalle',
            'IdMenu' => 'Menu',
            'DescripcionMenuDetalle' => 'Descripcion',
            'Url' => 'Url',
            'Icono' => 'Icono',
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
    public function getMenuusuarios()
    {
        return $this->hasMany(Menuusuario::className(), ['IdMenuDetalle' => 'IdMenuDetalle']);
    }
}
