<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enfermedad;

/**
 * EnfermedadSearch represents the model behind the search form of `app\models\Enfermedad`.
 */
class EnfermedadSearch extends Enfermedad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdEnfermedad', 'Numero', 'IdTipoDiagnostico'], 'integer'],
            [['Codigo', 'Nombre'], 'safe'],
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
        $query = Enfermedad::find();

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
            'IdEnfermedad' => $this->IdEnfermedad,
            'Numero' => $this->Numero,
            'IdTipoDiagnostico' => $this->IdTipoDiagnostico,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
