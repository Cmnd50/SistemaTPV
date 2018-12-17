<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consulta;

/**
 * ConsultamedicoSearch represents the model behind the search form of `app\models\Consulta`.
 */
class ConsultamedicoSearch extends Consulta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdConsulta', 'IdUsuario', 'IdPersona', 'IdModulo', 'IdEnfermedad', 'Activo', 'IdEstado', 'Status'], 'integer'],
            [['Diagnostico', 'Comentarios', 'Otros', 'FechaConsulta', 'EstadoNutricional', 'CirugiasPrevias', 'MedicamentosActuales', 'ExamenFisica', 'PlanTratamiento', 'FechaProxVisita', 'Alergias'], 'safe'],
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
        $query = Consulta::find()
        ->where([
                '=','IdEstado', 2])
        ->andWhere([
                '=','Activo', 1]);  // FALTA AGREGAR LA VALIDACION DEL USUARIO.

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
            'IdConsulta' => $this->IdConsulta,
            'IdUsuario' => $this->IdUsuario,
            'IdPersona' => $this->IdPersona,
            'IdModulo' => $this->IdModulo,
            'IdEnfermedad' => $this->IdEnfermedad,
            'FechaConsulta' => $this->FechaConsulta,
            'Activo' => $this->Activo,
            'IdEstado' => $this->IdEstado,
            'Status' => $this->Status,
            'FechaProxVisita' => $this->FechaProxVisita,
        ]);

        $query->andFilterWhere(['like', 'Diagnostico', $this->Diagnostico])
            ->andFilterWhere(['like', 'Comentarios', $this->Comentarios])
            ->andFilterWhere(['like', 'Otros', $this->Otros])
            ->andFilterWhere(['like', 'EstadoNutricional', $this->EstadoNutricional])
            ->andFilterWhere(['like', 'CirugiasPrevias', $this->CirugiasPrevias])
            ->andFilterWhere(['like', 'MedicamentosActuales', $this->MedicamentosActuales])
            ->andFilterWhere(['like', 'ExamenFisica', $this->ExamenFisica])
            ->andFilterWhere(['like', 'PlanTratamiento', $this->PlanTratamiento])
            ->andFilterWhere(['like', 'Alergias', $this->Alergias]);

        return $dataProvider;
    }
}
