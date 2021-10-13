<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ta_belanja_rinc".
 *
 * @property int $id
 * @property int $tahun
 * @property int $kd_urusan
 * @property int $kd_bidang
 * @property int $kd_unit
 * @property int $kd_sub
 * @property int $kd_prog
 * @property int $id_prog
 * @property int $kd_keg
 * @property int $kd_rek_1
 * @property int $kd_rek_2
 * @property int $kd_rek_3
 * @property int $kd_rek_4
 * @property int $kd_rek_5
 * @property int $no_rinc
 * @property string $keterangan
 * @property string $aktif
 */
class TaBelanjaRinc extends \yii\db\ActiveRecord
{
    public $id_skpd;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_belanja_rinc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'kd_urusan', 'kd_bidang', 'kd_unit', 'kd_sub', 'kd_prog', 'id_prog', 'kd_keg', 'kd_rek_1', 'kd_rek_2', 'kd_rek_3', 'kd_rek_4', 'kd_rek_5', 'no_rinc'], 'integer'],
            [['aktif'], 'string'],
            [['keterangan'], 'string', 'max' => 160],
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
            'kd_urusan' => 'Kd Urusan',
            'kd_bidang' => 'Kd Bidang',
            'kd_unit' => 'Kd Unit',
            'kd_sub' => 'Kd Sub',
            'kd_prog' => 'Kd Prog',
            'id_prog' => 'Id Prog',
            'kd_keg' => 'Kd Keg',
            'kd_rek_1' => 'Kd Rek 1',
            'kd_rek_2' => 'Kd Rek 2',
            'kd_rek_3' => 'Kd Rek 3',
            'kd_rek_4' => 'Kd Rek 4',
            'kd_rek_5' => 'Kd Rek 5',
            'no_rinc' => 'No Rinc',
            'keterangan' => 'Keterangan',
            'aktif' => 'Aktif',
        ];
    }
    
     public static  function getTaBelanja($kd_urusan,$kd_bidang,$kd_unit,$kd_sub){
        
        $model = TaBelanjaRinc::find()
                ->where([
                    'kd_urusan'=>$kd_urusan,
                    'kd_bidang'=>$kd_bidang,
                    'kd_unit'=>$kd_unit,
                    'kd_sub'=>$kd_sub
                ])->all();
        
        return $model;
    }
}
