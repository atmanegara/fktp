<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefRek4;

/**
 * RefRek4Search represents the model behind the search form of `app\models\RefRek4`.
 */
class RefRek4Search extends RefRek4
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_rek_1', 'kd_rek_2', 'kd_rek_3', 'kd_rek_4'], 'integer'],
            [['nm_rek_4', 'aktif'], 'safe'],
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
        $query = RefRek4::find();

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
            'id' => $this->id,
            'kd_rek_1' => $this->kd_rek_1,
            'kd_rek_2' => $this->kd_rek_2,
            'kd_rek_3' => $this->kd_rek_3,
            'kd_rek_4' => $this->kd_rek_4,
        ]);

        $query->andFilterWhere(['like', 'nm_rek_4', $this->nm_rek_4])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
