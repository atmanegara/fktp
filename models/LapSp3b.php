<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lap_sp3b".
 *
 * @property int $id
 * @property int $id_skpd
 * @property int $bulan bulan realisasi/bulan yang akan dilaporakan
 * @property string $no_sp3b
 * @property string $tgl_sp3b
 * @property string $no_dppa
 * @property string $tgl_dppa
 * @property string $catatan
 */
class LapSp3b extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lap_sp3b';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_skpd', 'bulan'], 'integer'],
            [['tgl_sp3b', 'tgl_dppa'], 'safe'],
            [['catatan'], 'string'],
            [['no_sp3b', 'no_dppa'], 'string', 'max' => 50],
            [['id'], 'unique'],
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
            'no_sp3b' => 'No Sp3b',
            'tgl_sp3b' => 'Tgl Sp3b',
            'no_dppa' => 'No Dppa',
            'tgl_dppa' => 'Tgl Dppa',
            'catatan' => 'Catatan',
        ];
    }
}
