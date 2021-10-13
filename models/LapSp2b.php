<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lap_sp2b".
 *
 * @property int $id
 * @property int $id_skpd
 * @property int $no_sp2b
 * @property string $tgl_sp2b
 * @property int $id_lap_sp3b
 * @property int $id_tnd_tnagn
 */
class LapSp2b extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lap_sp2b';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_skpd', 'no_sp2b', 'id_lap_sp3b', 'id_tnd_tnagn'], 'integer'],
            [['tgl_sp2b'], 'safe'],
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
            'id_skpd' => 'Id Skpd',
            'no_sp2b' => 'No Sp2b',
            'tgl_sp2b' => 'Tgl Sp2b',
            'id_lap_sp3b' => 'Id Lap Sp3b',
            'id_tnd_tnagn' => 'Id Tnd Tnagn',
        ];
    }
}
