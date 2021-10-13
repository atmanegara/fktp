<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_sub_skpd".
 *
 * @property int $id
 * @property int $kd_bidang
 * @property int $kd_urusan
 * @property int $kd_unit
 * @property int $kd_sub
 * @property string $nm_sub_unit
 * @property string $aktif
 *
 * @property DataBukuKas[] $dataBukuKas
 */
class RefSubSkpd extends \yii\db\ActiveRecord
{
    public $nm_unit;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_sub_skpd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_bidang', 'kd_urusan', 'kd_unit', 'kd_sub'], 'required'],
            [['kd_bidang', 'kd_urusan', 'kd_unit', 'kd_sub'], 'integer'],
            [['aktif'], 'string'],
            [['nm_sub_unit'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_bidang' => 'Kd Bidang',
            'kd_urusan' => 'Kd Urusan',
            'kd_unit' => 'Kd Unit',
            'kd_sub' => 'Kd Sub',
            'nm_sub_unit' => 'Nm Sub Unit',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataBukuKas()
    {
        return $this->hasMany(DataBukuKas::className(), ['id_ref_sub_skpd' => 'id']);
    }
}
