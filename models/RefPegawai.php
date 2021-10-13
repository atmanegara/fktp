<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_pegawai".
 *
 * @property int $id
 * @property string $nip_peg
 * @property string $nm_peg
 * @property string $jabt_peg
 * @property int $id_skpd
 * @property string $aktif
 */
class RefPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_skpd'], 'integer'],
            [['aktif'], 'string'],
            [['nip_peg', 'nm_peg', 'jabt_peg'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip_peg' => 'Nip Peg',
            'nm_peg' => 'Nm Peg',
            'jabt_peg' => 'Jabt Peg',
            'id_skpd' => 'Id Skpd',
            'aktif' => 'Aktif',
        ];
    }
}
