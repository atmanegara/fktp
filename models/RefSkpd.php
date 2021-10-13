<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_skpd".
 *
 * @property int $id
 * @property int $kd_urusan
 * @property int $kd_bidang
 * @property int $kd_unit
 * @property string $nm_unit
 * @property string $aktif
 *
 * @property DataBukuKas[] $dataBukuKas
 */
class RefSkpd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_skpd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_urusan', 'kd_bidang', 'kd_unit'], 'integer'],
            [['aktif'], 'string'],
            [['nm_unit'], 'string', 'max' => 160],
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
            'kd_unit' => 'Kd Unit',
            'nm_unit' => 'Nm Unit',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataBukuKas()
    {
        return $this->hasMany(DataBukuKas::className(), ['id_ref_skpd' => 'id']);
    }
}
