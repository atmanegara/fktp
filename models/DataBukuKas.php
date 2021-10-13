<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_buku_kas".
 *
 * @property int $id
 * @property int $nourut
 * @property int $id_ref_skpd
 * @property int $id_ta_belanja_rinc
 * @property string $tgl_transaksi
 * @property int $tahun
 * @property int $bulan
 * @property double $pendapatan
 * @property double $belanja
 * @property double $saldo
 * @property string $notransaksi format:bulan.tahun.fktp
 * @property string $nobukti foramt:nourut/bulan/tahun/fktp/norek(level5)
 * @property string $aktif
 *
 * @property RefKegiatan $refKegiatan
 * @property RefProgram $refProgram
 * @property RefSkpd $refSkpd
 * @property RefSubSkpd $refSubSkpd
 */
class DataBukuKas extends \yii\db\ActiveRecord
{
    public $keterangan;
    public $kode_rek;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_buku_kas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nourut', 'id_ref_skpd',  'id_ta_belanja_rinc', 'tahun', 'bulan'], 'integer'],
            [['tgl_transaksi'], 'safe'],
            [['pendapatan', 'belanja', 'saldo'], 'number'],
            [['aktif'], 'string'],
            [['notransaksi', 'nobukti'], 'string', 'max' => 50],
            [['id_ref_skpd'], 'exist', 'skipOnError' => true, 'targetClass' => RefSkpd::className(), 'targetAttribute' => ['id_ref_skpd' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nourut' => 'Nourut',
            'id_ref_skpd' => 'Id Ref Skpd',
            'id_ref_kegiatan' => 'Id Ref Kegiatan',
            'id_ref_program' => 'Id Ref Program',
            'id_ta_belanja_rinc' => 'Id Ref Rek 5',
            'id_ref_sub_skpd' => 'Id Ref Sub Skpd',
            'tgl_transaksi' => 'Tgl Transaksi',
            'tahun' => 'Tahun',
            'bulan' => 'Bulan',
            'pendapatan' => 'Pendapatan',
            'belanja' => 'Belanja',
            'saldo' => 'Saldo',
            'notransaksi' => 'Notransaksi',
            'nobukti' => 'Nobukti',
            'aktif' => 'Aktif',
        ];
    }

 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefSkpd()
    {
        return $this->hasOne(RefSkpd::className(), ['id' => 'id_ref_skpd']);
    }

}
