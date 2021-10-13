<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataBukuKas;

/**
 * DataBukuKasSearch represents the model behind the search form of `app\models\DataBukuKas`.
 */
class DataBukuKasSearch extends DataBukuKas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nourut', 'id_ref_skpd','tahun', 'bulan'], 'integer'],
            [['pendapatan', 'belanja', 'saldo'], 'number'],
            [['notransaksi', 'nobukti', 'aktif'], 'safe'],
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
        $query = DataBukuKas::find()
                 ->select(["data_buku_kas.*,concat(b.kd_rek_1,'.',b.kd_rek_2,'.',b.kd_rek_3,'.',b.kd_rek_4,'.',b.kd_rek_5) kode_rek,b.keterangan"])
                ->innerJoin('ta_belanja_rinc b','data_buku_kas.id_ta_belanja_rinc=b.id');
          //      ->innerJoin('ref_rek_5 b','data_buku_kas.id_ref_rek_5=b.id');

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
            'nourut' => $this->nourut,
            'id_ref_skpd' => $this->id_ref_skpd,
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'pendapatan' => $this->pendapatan,
            'belanja' => $this->belanja,
            'saldo' => $this->saldo,
        ]);

        $query->andFilterWhere(['like', 'notransaksi', $this->notransaksi])
            ->andFilterWhere(['like', 'nobukti', $this->nobukti])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
