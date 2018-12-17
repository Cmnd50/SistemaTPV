<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Geografia;

/**
 * GeografiaSearch represents the model behind the search form of `app\models\Geografia`.
 */
class GeografiaSearch extends Geografia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdGeografia', 'Nombre', 'IdPadre', 'Jerarquia'], 'safe'],
            [['Nivel'], 'integer'],
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
        $query = Geografia::find();

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
            'Nivel' => $this->Nivel,
        ]);

        $query->andFilterWhere(['like', 'IdGeografia', $this->IdGeografia])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'IdPadre', $this->IdPadre])
            ->andFilterWhere(['like', 'Jerarquia', $this->Jerarquia]);

        return $dataProvider;
    }
}
