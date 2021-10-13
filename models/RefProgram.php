<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_program".
 *
 * @property int $id
 * @property int $kd_urusan
 * @property int $kd_bidang
 * @property int $kd_urusan1
 * @property int $kd_bidang1
 * @property int $kd_unit
 * @property int $kd_sub
 * @property int $kd_prog
 * @property int $id_prog
 * @property string $ket_program
 * @property int $tahun
 * @property string $aktif
 *
 * @property DataBukuKas[] $dataBukuKas
 */
class RefProgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_urusan', 'kd_bidang', 'kd_urusan1', 'kd_bidang1', 'kd_unit', 'kd_sub', 'kd_prog', 'id_prog', 'tahun'], 'integer'],
            [['aktif'], 'string'],
            [['ket_program'], 'string', 'max' => 160],
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
            'id_prog' => 'Id Prog',
            'ket_program' => 'Ket Program',
            'tahun' => 'Tahun',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataBukuKas()
    {
        return $this->hasMany(DataBukuKas::className(), ['id_ref_program' => 'id']);
    }
}
