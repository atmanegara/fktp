<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_rek_1".
 *
 * @property int $id
 * @property int $kd_rek_1
 * @property string $nm_rek_1
 * @property string $aktif
 */
class RefRek1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_rek_1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_rek_1'], 'integer'],
            [['aktif'], 'string'],
            [['nm_rek_1'], 'string', 'max' => 50],
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
            'nm_rek_1' => 'Nm Rek 1',
            'aktif' => 'Aktif',
        ];
    }
}
