<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enfermeriaprocedimiento;

/**
 * ProcedimientoSearch represents the model behind the search form of `app\models\Enfermeriaprocedimiento`.
 */
class ProcedimientoSearch extends Enfermeriaprocedimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdEnfermeriaProcedimiento', 'IdPersona', 'IdMotivoProcedimiento', 'IdUsuario', 'IdModulo'], 'integer'],
            [['FechaProcedimiento', 'Observaciones', 'Estado', 'Procedimientoimaurl', 'IpServer', 'UnidadServer'], 'safe'],
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
        $query = Enfermeriaprocedimiento::find();

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
            'IdEnfermeriaProcedimiento' => $this->IdEnfermeriaProcedimiento,
            'IdPersona' => $this->IdPersona,
            'FechaProcedimiento' => $this->FechaProcedimiento,
            'IdMotivoProcedimiento' => $this->IdMotivoProcedimiento,
            'IdUsuario' => $this->IdUsuario,
            'IdModulo' => $this->IdModulo,
        ]);

        $query->andFilterWhere(['like', 'Observaciones', $this->Observaciones])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Procedimientoimaurl', $this->Procedimientoimaurl])
            ->andFilterWhere(['like', 'IpServer', $this->IpServer])
            ->andFilterWhere(['like', 'UnidadServer', $this->UnidadServer]);

        return $dataProvider;
    }
}
