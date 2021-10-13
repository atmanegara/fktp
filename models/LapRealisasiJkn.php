<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lap_realisasi_jkn".
 *
 * @property int $id
 * @property int $id_skpd
 * @property string $nomor
 * @property string $tgl
 * @property int $bln_realisasi
 */
class LapRealisasiJkn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lap_realisasi_jkn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_skpd', 'bln_realisasi'], 'integer'],
            [['tgl'], 'safe'],
            [['nomor'], 'string', 'max' => 50],
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
            'nomor' => 'Nomor',
            'tgl' => 'Tgl',
            'bln_realisasi' => 'Bln Realisasi',
        ];
    }
}
