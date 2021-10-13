<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataSaldo;

/**
 * DataSaldoSearch represents the model behind the search form of `app\models\DataSaldo`.
 */
class DataSaldoSearch extends DataSaldo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_skpd', 'tahun', 'bulan'], 'integer'],
            [['notransaksi', 'aktif'], 'safe'],
            [['saldo'], 'number'],
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
        $query = DataSaldo::find()->orderBy('bulan');

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
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'saldo' => $this->saldo,
        ]);

        $query->andFilterWhere(['like', 'notransaksi', $this->notransaksi])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
