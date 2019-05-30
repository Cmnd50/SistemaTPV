<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Limpiartablas;

/**
 * BasedatosSearch represents the model behind the search form of `app\models\Limpiartablas`.
 */
class BasedatosSearch extends Limpiartablas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdLimpiarTabla'], 'integer'],
            [['Query', 'Orden', 'Activo'], 'safe'],
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
        $query = Limpiartablas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 100 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdLimpiarTabla' => $this->IdLimpiarTabla,
        ]);

        $query->andFilterWhere(['like', 'Query', $this->Query])
            ->andFilterWhere(['like', 'Orden', $this->Orden])
            ->andFilterWhere(['like', 'Activo', $this->Activo]);

        return $dataProvider;
    }
}
