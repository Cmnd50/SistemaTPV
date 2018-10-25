<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perfildetalle;

/**
 * PerfildetalleSearch represents the model behind the search form of `app\models\Perfildetalle`.
 */
class PerfildetalleSearch extends Perfildetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPerfil', 'IdMenu'], 'integer'],
            [['Seleccionar', 'Insertar', 'Actualizar', 'Eliminar', 'Imprimir', 'Activo'], 'boolean'],
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
        $query = Perfildetalle::find();

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
            'IdPerfil' => $this->IdPerfil,
            'IdMenu' => $this->IdMenu,
            'Seleccionar' => $this->Seleccionar,
            'Insertar' => $this->Insertar,
            'Actualizar' => $this->Actualizar,
            'Eliminar' => $this->Eliminar,
            'Imprimir' => $this->Imprimir,
            'Activo' => $this->Activo,
        ]);

        return $dataProvider;
    }
}
