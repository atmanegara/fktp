<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_rek_3".
 *
 * @property int $id
 * @property int $kd_rek_1
 * @property int $kd_rek_2
 * @property int $kd_rek_3
 * @property string $nm_rek_3
 * @property string $saldonorm posisi akunting
 * @property string $aktif
 */
class RefRek3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_rek_3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_rek_1', 'kd_rek_2', 'kd_rek_3'], 'integer'],
            [['aktif'], 'string'],
            [['nm_rek_3', 'saldonorm'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_rek_1' => 'Kd Rek 1',
            'kd_rek_2' => 'Kd Rek 2',
            'kd_rek_3' => 'Kd Rek 3',
            'nm_rek_3' => 'Nm Rek 3',
            'saldonorm' => 'Saldonorm',
            'aktif' => 'Aktif',
        ];
    }
}
