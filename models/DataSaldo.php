<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_saldo".
 *
 * @property int $id
 * @property int $id_skpd
 * @property int $tahun
 * @property int $bulan
 * @property string $notransaksi format:bulan.tahun.fktp
 * @property double $saldo saldo awal/akhir
 * @property string $aktif
 */
class DataSaldo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_saldo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_skpd', 'tahun', 'bulan'], 'integer'],
            [['saldo'], 'number'],
            [['aktif'], 'string'],
            [['notransaksi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_skpd' => 'Id Skpd',
            'tahun' => 'Tahun',
            'bulan' => 'Bulan',
            'notransaksi' => 'Notransaksi',
            'saldo' => 'Saldo',
            'aktif' => 'Aktif',
        ];
    }
}
