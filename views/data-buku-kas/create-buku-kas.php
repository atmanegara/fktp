<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;
use kartik\editable\Editable;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataBukuKasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Buku Kas';
$this->params['breadcrumbs'][] = $this->title;

$bulan = Yii::$app->request->get('bulan');
$hakuser = Yii::$app->user->identity->hakuser;
if (in_array($hakuser, ['11'])) {
    $readonlyskpd = false;
} else {
    $id_skpd = Yii::$app->user->identity->id_skpd;
    $dataSkpd = app\models\RefSubSkpd::find()->where(['id' => $id_skpd])->one();
    $readonlyskpd = $dataSkpd['entry_jkn'] == 'Y' ? false : true;
}
echo $readonlyskpd;
?>
<div class="data-buku-kas-index">
    <div class="row">
        <div class="col-md-12">
            <p>
                <b><?= $refSubSkpd['nm_sub_unit'] ?></b>
            </p>
        </div>
    </div>
<?php Pjax::begin(['id' => 'pjax-data-buku-kas']) ?>
    <div class="row">
        <div class="col-md-12">
            <p>
<?=
$this->render('_form_transaksi', [
    'refSubSkpd' => $refSubSkpd,
    'bulan' => $bulan
])
?>                
            </p>


        </div>


    </div>


    <div class="row">       
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Data Kas
                </div>
                <div class="panel-body">
                    <table  class="table table-bordered table-responsive-md table-striped" style="font-size: 12px">
                        <tr>
                            <td>No</td>
                            <td>Tgl Transaksi</td>
                            <td>No Bukti</td>
                            <td>Uraian</td>
                            <td>Pendapatan</td>
                            <td>Belanja</td>
                            <td>saldo</td>
                            <td>Aksi</td>
                        </tr>
                        <tr style="background-color: #99ffff">
                            <td style="text-align: center" colspan="4" ><?= $keterangan ?></td>
                            <td><?= Yii::$app->formatter->asDecimal($dataSaldoAwal['saldo']) ?></td>
                            <td></td>
                            <td><?= Yii::$app->formatter->asDecimal($dataSaldoAwal['saldo']) ?></td>
                        </tr>

<?php
$data = $dataProvider->getModels();
$no = 0;
foreach ($data as $value) {
    if ($value['pendapatan'] == 0) {
        $readonlypendapatan = true;
    } else {
        $readonlypendapatan = false;
    }
    if ($value['belanja'] == 0) {
        $readonlybelanja = true;
    } else {
        $readonlybelanja = false;
    }
    ?>
                            <tr>
                                <td><?= $value['nourut'] ?></td>
                                <td><?= $value['tgl_transaksi'] ?></td>
                                <td><?= $value['nobukti'] ?></td>
                                <td><?= $value['kode_rek'] . " " . $value['keterangan'] ?></td>
                                <td><?=
                        Editable::widget([
                            'name' => 'pendapatan',
                            'readonly' => !$readonlyskpd ? $readonlypendapatan : true,
                            'header' => 'Pendapatan',
                            'value' => $value['pendapatan'],
                            'format' => \kartik\editable\Editable::FORMAT_LINK,
                            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                            'afterInput' => Html::hiddenInput('id', $value['id'], ['id' => 'id']),
                            'pjaxContainerId' => 'pjax-data-buku-kas',
                            'pluginEvents' => [
                                'editableSuccess' => "function(event, val, form, data) {"
                                . " getdata()}",
                            //   "editableBeforeSubmit"=>"function(event, val,form, data) { alert(data) }",
                            ],
                        ]);
    ?></td>
                                <td><?=
                                    Editable::widget([
                                        'name' => 'belanja',
                                        'readonly' => !$readonlyskpd ? $readonlybelanja : true,
                                        'asPopover' => true,
                                        'header' => 'belanja',
                                        'value' => $value['belanja'],
                                        'format' => \kartik\editable\Editable::FORMAT_LINK,
                                        'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                                        'afterInput' => Html::hiddenInput('id', $value['id'], ['id' => 'id']),
                                        'pjaxContainerId' => 'pjax-data-buku-kas',
                                        'pluginEvents' => [
                                            'editableSuccess' => "function(event, val, form, data) {"
                                            . " getdata()}",
                                        //   "editableBeforeSubmit"=>"function(event, val,form, data) { alert(data) }",
                                        ],
                                    ]);
                                    ?>
                                </td>
                                <td><?= Yii::$app->formatter->asDecimal($value['saldo']) ?></td>
                                <td><p>
    <?php
//                echo Html::button("<span class='glyphicon glyphicon-pencil'></span>",[
//                    'class'=>'btn btn-sm btn-warning'
//                ]);
    echo Html::a("<span class='glyphicon glyphicon-trash'></span>", yii\helpers\Url::to(['delete-item', 'id' => $value['id']]), [
        'class' => 'btn btn-sm btn-danger',
        'data' => [
            'confirm' => 'Anda Yakin item ini dihapus? permanen LOHHH',
            'method' => 'post'
        ]
    ])
    ?>
                                    </p></td>
                            </tr>
    <?php
    $no++;
}
?>
                        <tr style="background-color: yellow">
                            <td colspan="4">Jumlah Bulan <?= app\component\BulanComponent::NamaBulan($bulan) . ' ' . date('Y') ?></td>

                            <td><?= Yii::$app->formatter->asDecimal($jumsaldobulanx['pendapatan']) ?></td>
                            <td><?= Yii::$app->formatter->asDecimal($jumsaldobulanx['belanja']) ?></td>
                            <td><?= Yii::$app->formatter->asDecimal($jumsaldobulanx['pendapatan'] - $jumsaldobulanx['belanja']) ?></td>
                        </tr>
                        <tr style="background-color: #99ff66">
                            <td colspan="4">Jumlah Sampain dengan Bulan <?= app\component\BulanComponent::NamaBulan($bulan) . ' ' . date('Y') ?></td>

                            <td><?= Yii::$app->formatter->asDecimal($jumsaldosampaibulanx['pendapatan']) ?></td>
                            <td><?= Yii::$app->formatter->asDecimal($jumsaldosampaibulanx['belanja']) ?></td>
                            <td><?= Yii::$app->formatter->asDecimal($jumsaldosampaibulanx['pendapatan'] - $jumsaldosampaibulanx['belanja']) ?></td>
                        </tr>
                    </table>

                </div>
                <div class="panel-footer clearfix">
<?php
$id_skpd = $refSubSkpd['id'];

echo Dialog::widget(['overrideYiiConfirm' => true]);
echo \yii\bootstrap\Html::a('Selesai', ['selesai-input-kas', 'id_skpd' => $id_skpd, 'bulan' => $bulan], [
    'class' => 'btn btn-warning pull-left',
    'data' => [
        'confirm' => 'Yakin selesai pekerjaan pian?',
        'method' => 'post'
    ]
])
?>
                </div>
            </div>


            </body>

            </html>

        </div>
    </div>
<?php Pjax::end() ?>

</div>


<script>
    function getdata() {

        jQuery.pjax.defaults.timeout = false;
        jQuery.pjax.reload({container: '#pjax-data-buku-kas'});
//            krajeeDialogCust.alert('sukses');
//        $.notify('Data sukses di input', {
//            type: 'success',
//            allow_dismiss: false,
//            delay: 10,
//            placement: {from: 'top', align: 'right'}
//        });
    }

</script>