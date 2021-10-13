<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LapSp2b;

/**
 * LapSp2bSearch represents the model behind the search form of `app\models\LapSp2b`.
 */
class LapSp2bSearch extends LapSp2b
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_skpd', 'no_sp2b', 'id_lap_sp3b', 'id_tnd_tnagn'], 'integer'],
            [['tgl_sp2b'], 'safe'],
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
        $query = LapSp2b::find();

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
            'no_sp2b' => $this->no_sp2b,
            'tgl_sp2b' => $this->tgl_sp2b,
            'id_lap_sp3b' => $this->id_lap_sp3b,
            'id_tnd_tnagn' => $this->id_tnd_tnagn,
        ]);

        return $dataProvider;
    }
}
