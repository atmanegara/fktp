<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_tanda_tangan".
 *
 * @property int $id
 * @property int $id_ref_sub_skpd
 * @property string $kd_report
 * @property string $title_report
 * @property int $ttd1_id_ref_pegawai
 * @property int $ttd2_id_ref_pegawai
 * @property int $ttd3_id_ref_pegawai
 */
class RefTandaTangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_tanda_tangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ref_sub_skpd'], 'required'],
            [['id', 'id_ref_sub_skpd', 'ttd1_id_ref_pegawai', 'ttd2_id_ref_pegawai', 'ttd3_id_ref_pegawai'], 'integer'],
            [['kd_report', 'title_report'], 'string', 'max' => 50],
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
            'id_ref_sub_skpd' => 'Id Ref Sub Skpd',
            'kd_report' => 'Kd Report',
            'title_report' => 'Title Report',
            'ttd1_id_ref_pegawai' => 'Ttd1 Id Ref Pegawai',
            'ttd2_id_ref_pegawai' => 'Ttd2 Id Ref Pegawai',
            'ttd3_id_ref_pegawai' => 'Ttd3 Id Ref Pegawai',
        ];
    }
}
