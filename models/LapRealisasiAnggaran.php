<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lap_realisasi_anggaran".
 *
 * @property int $id
 * @property int $id_skpd
 * @property int $bulan
 * @property int $tahun
 * @property string $tgl_buat
 */
class LapRealisasiAnggaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lap_realisasi_anggaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_skpd', 'bulan', 'tahun'], 'integer'],
            [['tgl_buat'], 'safe'],
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
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tgl_buat' => 'Tgl Buat',
        ];
    }
}
