<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefSkpd;

/**
 * RefSkpdSearch represents the model behind the search form of `app\models\RefSkpd`.
 */
class RefSkpdSearch extends RefSkpd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_urusan', 'kd_bidang', 'kd_unit'], 'integer'],
            [['nm_unit', 'aktif'], 'safe'],
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
        $query = RefSkpd::find();

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
            'kd_urusan' => $this->kd_urusan,
            'kd_bidang' => $this->kd_bidang,
            'kd_unit' => $this->kd_unit,
        ]);

        $query->andFilterWhere(['like', 'nm_unit', $this->nm_unit])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
