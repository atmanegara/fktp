<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LapRealisasiAnggaran;

/**
 * LapRealisasiAnggaranSearch represents the model behind the search form of `app\models\LapRealisasiAnggaran`.
 */
class LapRealisasiAnggaranSearch extends LapRealisasiAnggaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_skpd', 'bulan', 'tahun'], 'integer'],
            [['tgl_buat'], 'safe'],
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
        $query = LapRealisasiAnggaran::find();

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
            'tahun' => $this->tahun,
            'tgl_buat' => $this->tgl_buat,
        ]);

        return $dataProvider;
    }
}
