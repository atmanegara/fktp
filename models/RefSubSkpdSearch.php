<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefSubSkpd;

/**
 * RefSubSkpdSearch represents the model behind the search form of `app\models\RefSubSkpd`.
 */
class RefSubSkpdSearch extends RefSubSkpd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_bidang', 'kd_urusan', 'kd_unit', 'kd_sub'], 'integer'],
            [['nm_sub_unit', 'aktif'], 'safe'],
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
        $query = RefSubSkpd::find();

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
            'kd_bidang' => $this->kd_bidang,
            'kd_urusan' => $this->kd_urusan,
            'kd_unit' => $this->kd_unit,
            'kd_sub' => $this->kd_sub,
        ]);

        $query->andFilterWhere(['like', 'nm_sub_unit', $this->nm_sub_unit])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
