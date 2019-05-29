<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receta;

/**
 * RecetasSearch represents the model behind the search form of `app\models\Receta`.
 */
class RecetasSearch extends Receta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdReceta', 'IdUsuario', 'IdPersona', 'IdConsulta', 'Activo'], 'integer'],
            [['Fecha', 'Comentarios', 'Consultaimaurl', 'IPServer', 'UnidadServer'], 'safe'],
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
        $query = Receta::find();

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
            'IdReceta' => $this->IdReceta,
            'IdUsuario' => $this->IdUsuario,
            'IdPersona' => $this->IdPersona,
            'IdConsulta' => $this->IdConsulta,
            'Fecha' => $this->Fecha,
            'Activo' => $this->Activo,
        ]);

        $query->andFilterWhere(['like', 'Comentarios', $this->Comentarios])
            ->andFilterWhere(['like', 'Consultaimaurl', $this->Consultaimaurl])
            ->andFilterWhere(['like', 'IPServer', $this->IPServer])
            ->andFilterWhere(['like', 'UnidadServer', $this->UnidadServer]);

        return $dataProvider;
    }
}
