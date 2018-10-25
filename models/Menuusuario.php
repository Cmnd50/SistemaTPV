<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menuusuario".
 *
 * @property int $IdMenuUsuario
 * @property int $IdMenuDetalle
 * @property string $MenuUsuarioActivo
 * @property int $IdUsuario
 * @property int $IdMenu
 * @property int $TipoPermiso Esto es lo que define si es un permiso para ingresar al menu o es permiso para ingresar a un crud 1 = menu 2 = crud
 *
 * @property Menu $menu
 * @property Menudetalle $menuDetalle
 * @property Usuario $usuario
 */
class Menuusuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menuusuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMenuDetalle', 'IdUsuario', 'TipoPermiso'], 'required'],
            [['IdMenuDetalle', 'IdUsuario', 'IdMenu', 'TipoPermiso'], 'integer'],
            [['MenuUsuarioActivo'], 'string', 'max' => 1],
            [['IdMenu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['IdMenu' => 'IdMenu']],
            [['IdMenuDetalle'], 'exist', 'skipOnError' => true, 'targetClass' => Menudetalle::className(), 'targetAttribute' => ['IdMenuDetalle' => 'IdMenuDetalle']],
            [['IdUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['IdUsuario' => 'IdUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMenuUsuario' => 'Id Menu Usuario',
            'IdMenuDetalle' => 'Menu Detalle',
            'MenuUsuarioActivo' => 'Activo',
            'IdUsuario' => 'Usuario',
            'IdMenu' => 'Menu',
            'TipoPermiso' => 'Permiso',
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
    public function getMenuDetalle()
    {
        return $this->hasOne(Menudetalle::className(), ['IdMenuDetalle' => 'IdMenuDetalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['IdUsuario' => 'IdUsuario']);
    }

    public static function getCity($city_id)
{
    $data=\app\models\MenuDetalle::find()
   ->where(['IdMenu'=>$city_id])
   ->select(['IdMenuDetalle AS id','DescripcionMenuDetalle AS name'])->asArray()->all();

        return $data;
    }
}
