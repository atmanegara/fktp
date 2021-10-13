<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LapRealisasiJkn;

/**
 * LapRealisasiJknSearch represents the model behind the search form of `app\models\LapRealisasiJkn`.
 */
class LapRealisasiJknSearch extends LapRealisasiJkn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_skpd', 'bln_realisasi'], 'integer'],
            [['nomor', 'tgl'], 'safe'],
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
        $query = LapRealisasiJkn::find();

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
            'tgl' => $this->tgl,
            'bln_realisasi' => $this->bln_realisasi,
        ]);

        $query->andFilterWhere(['like', 'nomor', $this->nomor]);

        return $dataProvider;
    }
}
