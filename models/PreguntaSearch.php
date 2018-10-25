<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pregunta;

/**
 * PreguntaSearch represents the model behind the search form of `app\models\Pregunta`.
 */
class PreguntaSearch extends Pregunta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPregunta', 'IdFactor'], 'integer'],
            [['Nombre', 'Descripcion'], 'safe'],
            [['Ponderacion'], 'number'],
            [['Activo'], 'boolean'],
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
        $query = Pregunta::find();

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
            'IdPregunta' => $this->IdPregunta,
            'IdFactor' => $this->IdFactor,
            'Ponderacion' => $this->Ponderacion,
            'Activo' => $this->Activo,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
