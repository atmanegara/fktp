<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lap_tanggung_jwb".
 *
 * @property int $id
 * @property int $tahun
 * @property int $id_skpd
 * @property string $notransaksi
 * @property int $bulan
 * @property string $format_fktp
 * @property string $tgl_jam
 */
class LapTanggungJwb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lap_tanggung_jwb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'id_skpd', 'bulan'], 'integer'],
            [['tgl_jam'], 'safe'],
            [['notransaksi'], 'string', 'max' => 12],
            [['format_fktp'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'id_skpd' => 'Id Skpd',
            'notransaksi' => 'Notransaksi',
            'bulan' => 'Bulan',
            'format_fktp' => 'Format Fktp',
            'tgl_jam' => 'Tgl Jam',
        ];
    }
}
