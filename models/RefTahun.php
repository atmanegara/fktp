<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_tahun".
 *
 * @property int $id
 * @property string $inisial
 * @property string $tahun
 */
class RefTahun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_tahun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inisial'], 'string', 'max' => 2],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inisial' => 'Inisial',
            'tahun' => 'Tahun',
        ];
    }
}
