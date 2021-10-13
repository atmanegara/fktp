<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_rek_2".
 *
 * @property int $id
 * @property int $kd_rek_1
 * @property int $kd_rek_2
 * @property string $nm_rek_2
 * @property string $aktif
 */
class RefRek2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_rek_2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_rek_1', 'kd_rek_2'], 'integer'],
            [['aktif'], 'string'],
            [['nm_rek_2'], 'string', 'max' => 50],
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
            'nm_rek_2' => 'Nm Rek 2',
            'aktif' => 'Aktif',
        ];
    }
}
