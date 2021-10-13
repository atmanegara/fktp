<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LapSp3b;

/**
 * LapSp3bSearch represents the model behind the search form of `app\models\LapSp3b`.
 */
class LapSp3bSearch extends LapSp3b
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_skpd', 'bulan'], 'integer'],
            [['no_sp3b', 'tgl_sp3b', 'no_dppa', 'tgl_dppa', 'catatan'], 'safe'],
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
        $query = LapSp3b::find();

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
            'id_skpd' => $this->id_skpd,
            'bulan' => $this->bulan,
            'tgl_sp3b' => $this->tgl_sp3b,
            'tgl_dppa' => $this->tgl_dppa,
        ]);

        $query->andFilterWhere(['like', 'no_sp3b', $this->no_sp3b])
            ->andFilterWhere(['like', 'no_dppa', $this->no_dppa])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}
