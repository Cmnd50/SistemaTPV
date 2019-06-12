<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * ConsultapacienteSearch represents the model behind the search form of `app\models\Persona`.
 */
class ConsultapacienteSearch extends Persona
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPersona', 'IdEstadoCivil', 'IdEstado', 'IdPais'], 'integer'],
            [['Nombres', 'Apellidos', 'FechaNacimiento', 'Direccion', 'Correo', 'IdGeografia', 'Genero', 'IdParentesco', 'Telefono', 'Celular', 'Alergias', 'Medicamentos', 'Enfermedad', 'Dui', 'CodigoPaciente','TelefonoResponsable', 'Categoria', 'NombresResponsable', 'ApellidosResponsable', 'Parentesco', 'DuiResponsable'], 'safe'],
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
        $query = Persona::find();

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
            'IdPersona' => $this->IdPersona,
            'FechaNacimiento' => $this->FechaNacimiento,
            'IdEstadoCivil' => $this->IdEstadoCivil,
            'IdEstado' => $this->IdEstado,
            'IdPais' => $this->IdPais,
        ]);

        $query->andFilterWhere(['like', 'Nombres', $this->Nombres])
            ->andFilterWhere(['like', 'Apellidos', $this->Apellidos])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Correo', $this->Correo])
            ->andFilterWhere(['like', 'IdGeografia', $this->IdGeografia])
            ->andFilterWhere(['like', 'Genero', $this->Genero])
            ->andFilterWhere(['like', 'IdParentesco', $this->IdParentesco])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Celular', $this->Celular])
            ->andFilterWhere(['like', 'Alergias', $this->Alergias])
            ->andFilterWhere(['like', 'Medicamentos', $this->Medicamentos])
            ->andFilterWhere(['like', 'Enfermedad', $this->Enfermedad])
            ->andFilterWhere(['like', 'Dui', $this->Dui])
            ->andFilterWhere(['like', 'TelefonoResponsable', $this->TelefonoResponsable])
            ->andFilterWhere(['like', 'Categoria', $this->Categoria])
            ->andFilterWhere(['like', 'NombresResponsable', $this->NombresResponsable])
            ->andFilterWhere(['like', 'ApellidosResponsable', $this->ApellidosResponsable])
            ->andFilterWhere(['like', 'Parentesco', $this->Parentesco])
            ->andFilterWhere(['like', 'DuiResponsable', $this->DuiResponsable])
            ->andFilterWhere(['like', 'CodigoPaciente', $this->CodigoPaciente]);
        return $dataProvider;
    }
}
