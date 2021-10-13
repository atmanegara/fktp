<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LapTanggungJwb;

/**
 * LapTanggungJwbSearch represents the model behind the search form of `app\models\LapTanggungJwb`.
 */
class LapTanggungJwbSearch extends LapTanggungJwb
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun', 'id_skpd', 'bulan'], 'integer'],
            [['notransaksi', 'format_fktp', 'tgl_jam'], 'safe'],
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
        $query = LapTanggungJwb::find();

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
            'tahun' => $this->tahun,
            'id_skpd' => $this->id_skpd,
            'bulan' => $this->bulan,
            'tgl_jam' => $this->tgl_jam,
        ]);

        $query->andFilterWhere(['like', 'notransaksi', $this->notransaksi])
            ->andFilterWhere(['like', 'format_fktp', $this->format_fktp]);

        return $dataProvider;
    }
}
