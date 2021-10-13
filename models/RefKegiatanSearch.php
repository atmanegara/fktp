<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefKegiatan;

/**
 * RefKegiatanSearch represents the model behind the search form of `app\models\RefKegiatan`.
 */
class RefKegiatanSearch extends RefKegiatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_urusan', 'kd_bidang', 'kd_urusan1', 'kd_bidang1', 'kd_unit', 'kd_sub', 'kd_prog', 'kd_keg', 'id_prog'], 'integer'],
            [['ket_kegiatan', 'lokasi', 'sasaran', 'aktif'], 'safe'],
            [['pagu_anggaran'], 'number'],
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
        $query = RefKegiatan::find();

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
            'kd_urusan1' => $this->kd_urusan1,
            'kd_bidang1' => $this->kd_bidang1,
            'kd_unit' => $this->kd_unit,
            'kd_sub' => $this->kd_sub,
            'kd_prog' => $this->kd_prog,
            'kd_keg' => $this->kd_keg,
            'id_prog' => $this->id_prog,
            'pagu_anggaran' => $this->pagu_anggaran,
        ]);

        $query->andFilterWhere(['like', 'ket_kegiatan', $this->ket_kegiatan])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'sasaran', $this->sasaran])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
