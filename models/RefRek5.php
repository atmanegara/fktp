<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_rek_5".
 *
 * @property int $id
 * @property int $kd_rek_1
 * @property int $kd_rek_2
 * @property int $kd_rek_3
 * @property int $kd_rek_4
 * @property int $kd_rek_5
 * @property string $nm_rek_5
 * @property string $aktif
 */
class RefRek5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_rek_5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_rek_1', 'kd_rek_2', 'kd_rek_3', 'kd_rek_4', 'kd_rek_5'], 'integer'],
            [['aktif'], 'string'],
            [['nm_rek_5'], 'string', 'max' => 50],
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
            'kd_rek_4' => 'Kd Rek 4',
            'kd_rek_5' => 'Kd Rek 5',
            'nm_rek_5' => 'Nm Rek 5',
            'aktif' => 'Aktif',
        ];
    }
    
    public static function getrekeninglima($kd_rek){
        $getRek5 = RefRek5::find()->where(['IN','kd_rek_1'=>$kd_rek])->all();
        
        return \yii\helpers\ArrayHelper::map($array, 'id','nm_rek_5');
    }
}
