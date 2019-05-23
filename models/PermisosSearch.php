<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * PermisosSearch represents the model behind the search form of `app\models\Usuario`.
 */
class PermisosSearch extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUsuario', 'Activo', 'IdPuesto', 'Idioma'], 'integer'],
            [['InicioSesion', 'Nombres', 'Apellidos', 'Correo', 'Clave', 'FechaIngreso', 'AmilatAdmin', 'ImagenUsuario', 'Estado', 'HoraInicioSesion', 'HoraUltimaSesion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuario::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdUsuario' => $this->IdUsuario,
            'Activo' => $this->Activo,
            'IdPuesto' => $this->IdPuesto,
            'FechaIngreso' => $this->FechaIngreso,
            'Idioma' => $this->Idioma,
        ]);

        $query->andFilterWhere(['like', 'InicioSesion', $this->InicioSesion])
            ->andFilterWhere(['like', 'Nombres', $this->Nombres])
            ->andFilterWhere(['like', 'Apellidos', $this->Apellidos])
            ->andFilterWhere(['like', 'Correo', $this->Correo])
            ->andFilterWhere(['like', 'Clave', $this->Clave])
            ->andFilterWhere(['like', 'AmilatAdmin', $this->AmilatAdmin])
            ->andFilterWhere(['like', 'ImagenUsuario', $this->ImagenUsuario])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'HoraInicioSesion', $this->HoraInicioSesion])
            ->andFilterWhere(['like', 'HoraUltimaSesion', $this->HoraUltimaSesion]);

        return $dataProvider;
    }
}
