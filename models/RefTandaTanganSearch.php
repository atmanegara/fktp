<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefTandaTangan;

/**
 * RefTandaTanganSearch represents the model behind the search form of `app\models\RefTandaTangan`.
 */
class RefTandaTanganSearch extends RefTandaTangan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ref_sub_skpd', 'ttd1_id_ref_pegawai', 'ttd2_id_ref_pegawai', 'ttd3_id_ref_pegawai'], 'integer'],
            [['kd_report', 'title_report'], 'safe'],
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
        $query = RefTandaTangan::find();

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
            'id_ref_sub_skpd' => $this->id_ref_sub_skpd,
            'ttd1_id_ref_pegawai' => $this->ttd1_id_ref_pegawai,
            'ttd2_id_ref_pegawai' => $this->ttd2_id_ref_pegawai,
            'ttd3_id_ref_pegawai' => $this->ttd3_id_ref_pegawai,
        ]);

        $query->andFilterWhere(['like', 'kd_report', $this->kd_report])
            ->andFilterWhere(['like', 'title_report', $this->title_report]);

        return $dataProvider;
    }
}
