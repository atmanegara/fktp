<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TaBelanjaRinc;

/**
 * TaBelanjaRincSearch represents the model behind the search form of `app\models\TaBelanjaRinc`.
 */
class TaBelanjaRincSearch extends TaBelanjaRinc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','id_skpd', 'tahun', 'kd_urusan', 'kd_bidang', 'kd_unit', 'kd_sub', 'kd_prog', 'id_prog', 'kd_rek_1', 'kd_rek_2', 'kd_rek_3', 'kd_rek_4', 'kd_rek_5', 'no_rinc'], 'integer'],
            [['keterangan', 'aktif'], 'safe'],
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
        $query = TaBelanjaRinc::find();
        $query->select('ta_belanja_rinc.*,ref_sub_skpd.id as id_skpd');
        $query->innerJoin('ref_sub_skpd','ref_sub_skpd.kd_urusan=ta_belanja_rinc.kd_urusan '
                . 'and ref_sub_skpd.kd_bidang=ta_belanja_rinc.kd_bidang '
                . 'and ref_sub_skpd.kd_unit=ta_belanja_rinc.kd_unit '
                . 'and ref_sub_skpd.kd_sub=ta_belanja_rinc.kd_sub');
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
            'kd_urusan' => $this->kd_urusan,
            'kd_bidang' => $this->kd_bidang,
            'kd_unit' => $this->kd_unit,
            'kd_sub' => $this->kd_sub,
            'kd_prog' => $this->kd_prog,
            'id_prog' => $this->id_prog,
            'kd_rek_1' => $this->kd_rek_1,
            'kd_rek_2' => $this->kd_rek_2,
            'kd_rek_3' => $this->kd_rek_3,
            'kd_rek_4' => $this->kd_rek_4,
            'kd_rek_5' => $this->kd_rek_5,
            'no_rinc' => $this->no_rinc,
            'ref_sub_skpd.id'=> $this->id_skpd,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
