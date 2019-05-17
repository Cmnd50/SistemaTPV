<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Indicadorprocedimiento;

/**
 * IndicadorprocedimientoSearch represents the model behind the search form of `app\models\Indicadorprocedimiento`.
 */
class IndicadorprocedimientoSearch extends Indicadorprocedimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdIndicadorProcedimiento', 'IdEnfermeriaProcedimiento', 'UnidadPeso', 'UnidadAltura', 'UnidadTemperatura', 'PresionMax', 'PresionMin'], 'integer'],
            [['Peso', 'Altura', 'Temperatura'], 'number'],
            [['Pulso', 'Observaciones', 'PeriodoMeunstral', 'Glucotex', 'PC', 'PT', 'PA', 'FR', 'PAP', 'Motivo'], 'safe'],
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
        $query = Indicadorprocedimiento::find();

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
            'IdIndicadorProcedimiento' => $this->IdIndicadorProcedimiento,
            'IdEnfermeriaProcedimiento' => $this->IdEnfermeriaProcedimiento,
            'Peso' => $this->Peso,
            'UnidadPeso' => $this->UnidadPeso,
            'Altura' => $this->Altura,
            'UnidadAltura' => $this->UnidadAltura,
            'Temperatura' => $this->Temperatura,
            'UnidadTemperatura' => $this->UnidadTemperatura,
            'PresionMax' => $this->PresionMax,
            'PresionMin' => $this->PresionMin,
        ]);

        $query->andFilterWhere(['like', 'Pulso', $this->Pulso])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones])
            ->andFilterWhere(['like', 'PeriodoMeunstral', $this->PeriodoMeunstral])
            ->andFilterWhere(['like', 'Glucotex', $this->Glucotex])
            ->andFilterWhere(['like', 'PC', $this->PC])
            ->andFilterWhere(['like', 'PT', $this->PT])
            ->andFilterWhere(['like', 'PA', $this->PA])
            ->andFilterWhere(['like', 'FR', $this->FR])
            ->andFilterWhere(['like', 'PAP', $this->PAP])
            ->andFilterWhere(['like', 'Motivo', $this->Motivo]);

        return $dataProvider;
    }
}
