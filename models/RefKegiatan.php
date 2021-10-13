<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_kegiatan".
 *
 * @property int $id
 * @property int $kd_urusan
 * @property int $kd_bidang
 * @property int $kd_urusan1
 * @property int $kd_bidang1
 * @property int $kd_unit
 * @property int $kd_sub
 * @property int $kd_prog
 * @property int $kd_keg
 * @property int $id_prog
 * @property string $ket_kegiatan
 * @property string $lokasi
 * @property string $sasaran
 * @property string $pagu_anggaran
 * @property string $aktif
 *
 * @property DataBukuKas[] $dataBukuKas
 */
class RefKegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_urusan', 'kd_bidang', 'kd_urusan1', 'kd_bidang1', 'kd_unit', 'kd_sub', 'kd_prog', 'kd_keg', 'id_prog'], 'required'],
            [['kd_urusan', 'kd_bidang', 'kd_urusan1', 'kd_bidang1', 'kd_unit', 'kd_sub', 'kd_prog', 'kd_keg', 'id_prog'], 'integer'],
            [['pagu_anggaran'], 'number'],
            [['aktif'], 'string'],
            [['ket_kegiatan', 'lokasi', 'sasaran'], 'string', 'max' => 160],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_urusan' => 'Kd Urusan',
            'kd_bidang' => 'Kd Bidang',
            'kd_urusan1' => 'Kd Urusan1',
            'kd_bidang1' => 'Kd Bidang1',
            'kd_unit' => 'Kd Unit',
            'kd_sub' => 'Kd Sub',
            'kd_prog' => 'Kd Prog',
            'kd_keg' => 'Kd Keg',
            'id_prog' => 'Id Prog',
            'ket_kegiatan' => 'Ket Kegiatan',
            'lokasi' => 'Lokasi',
            'sasaran' => 'Sasaran',
            'pagu_anggaran' => 'Pagu Anggaran',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataBukuKas()
    {
        return $this->hasMany(DataBukuKas::className(), ['id_ref_kegiatan' => 'id']);
    }
}
