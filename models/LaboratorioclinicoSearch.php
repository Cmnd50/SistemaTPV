<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Listaexamen;

/**
 * LaboratorioclinicoSearch represents the model behind the search form of `app\models\Listaexamen`.
 */
class LaboratorioclinicoSearch extends Listaexamen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdListaExamen', 'IdUsuario', 'IdConsulta', 'IdPersona', 'IdTipoExamen', 'Activo'], 'integer'],
            [['FechaExamen', 'Indicacion'], 'safe'],
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
        $query = Listaexamen::find()
         ->where([
                '=','Activo', 1]);

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
            'IdListaExamen' => $this->IdListaExamen,
            'IdUsuario' => $this->IdUsuario,
            'IdConsulta' => $this->IdConsulta,
            'IdPersona' => $this->IdPersona,
            'IdTipoExamen' => $this->IdTipoExamen,
            'Activo' => $this->Activo,
            'FechaExamen' => $this->FechaExamen,
        ]);

        $query->andFilterWhere(['like', 'Indicacion', $this->Indicacion]);

        return $dataProvider;
    }
}
