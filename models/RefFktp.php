<?php

namespace app\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "ref_fktp".
 *
 * @property int $id
 * @property string $thn_fktp
 * @property string $kode_fktp
 * @property string $format_fktp
 * @property int $id_sub_skpd
 * @property string $aktif
 *
 * @property DataSaldo[] $dataSaldos
 * @property RefSubSkpd $subSkpd
 */
class RefFktp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_fktp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub_skpd','kode_fktp'],'required','message'=>'Wajib di isi'],
            [['id_sub_skpd'], 'integer'],
            [['aktif'], 'string'],
            [['thn_fktp', 'kode_fktp'], 'string', 'max' => 2],
            [['format_fktp'], 'string', 'max' => 5],
            [['id_sub_skpd'], 'exist', 'skipOnError' => true, 'targetClass' => RefSubSkpd::className(), 'targetAttribute' => ['id_sub_skpd' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thn_fktp' => 'Thn Fktp',
            'kode_fktp' => 'Kode Fktp',
            'format_fktp' => 'Format Fktp',
            'id_sub_skpd' => 'Id Sub Skpd',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataSaldos()
    {
        return $this->hasMany(DataSaldo::className(), ['id_ref_fktp' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSkpd()
    {
        return $this->hasOne(RefSubSkpd::className(), ['id' => 'id_sub_skpd']);
    }
    
    public static function getFktp(){
        $fkpt = (new Query())
                ->select('a.id_sub_skpd,b.nm_sub_unit,a.format_fktp')
                ->from('ref_fktp a')
                ->innerJoin('ref_sub_skpd b','a.id_sub_skpd=b.id')->where(['a.aktif'=>'Y'])->all();
        return \yii\helpers\ArrayHelper::map($fkpt,'id_sub_skpd','nm_sub_unit');
    }
      public static function getFktpBySkpd($id_skpd){
        $fkpt = (new Query())
                ->select('a.id_sub_skpd,b.nm_sub_unit,a.format_fktp')
                ->from('ref_fktp a')
                ->innerJoin('ref_sub_skpd b','a.id_sub_skpd=b.id')->where(['a.aktif'=>'Y','b.id'=>$id_skpd])->all();
        return \yii\helpers\ArrayHelper::map($fkpt,'id_sub_skpd','nm_sub_unit');
    }
}
