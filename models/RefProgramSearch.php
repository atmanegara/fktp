<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefProgram;

/**
 * RefProgramSearch represents the model behind the search form of `app\models\RefProgram`.
 */
class RefProgramSearch extends RefProgram
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_urusan', 'kd_bidang', 'kd_urusan1', 'kd_bidang1', 'kd_unit', 'kd_prog', 'tahun'], 'integer'],
            [['ket_program', 'aktif'], 'safe'],
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
        $query = RefProgram::find();

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
            'kd_prog' => $this->kd_prog,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'ket_program', $this->ket_program])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
