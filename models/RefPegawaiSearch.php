<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefPegawai;

/**
 * RefPegawaiSearch represents the model behind the search form of `app\models\RefPegawai`.
 */
class RefPegawaiSearch extends RefPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_skpd'], 'integer'],
            [['nip_peg', 'nm_peg', 'jabt_peg', 'aktif'], 'safe'],
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
        $query = RefPegawai::find();

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
        ]);

        $query->andFilterWhere(['like', 'nip_peg', $this->nip_peg])
            ->andFilterWhere(['like', 'nm_peg', $this->nm_peg])
            ->andFilterWhere(['like', 'jabt_peg', $this->jabt_peg])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
