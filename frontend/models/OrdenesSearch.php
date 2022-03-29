<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordenes;

/**
 * OrdenesSearch represents the model behind the search form of `app\models\Ordenes`.
 */
class OrdenesSearch extends Ordenes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ordenid', 'empleadoid', 'clienteid', 'descuento'], 'integer'],
            [['fechaorden'], 'safe'],
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
        $query = Ordenes::find();

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
            'ordenid' => $this->ordenid,
            'empleadoid' => $this->empleadoid,
            'clienteid' => $this->clienteid,
            'fechaorden' => $this->fechaorden,
            'descuento' => $this->descuento,
        ]);

        return $dataProvider;
    }
}
