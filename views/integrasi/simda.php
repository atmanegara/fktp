<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use kartik\dialog\Dialog;
?>


<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                Integrasi
            </div>
            <div class="box-body">
                <p>
                    <?=
                    Html::button('SKPD & Sub SKPD', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getSkpd()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <span id="caption-skpd" class="pull-left"></span>
                    <small id="label-skpd" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-skpd" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
                <p>
                    <?=
                    Html::button('Program', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getProgram()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <small id="label-program" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-program" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
                <p>
                    <?=
                    Html::button('Kegiatan', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getKegiatan()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <small id="label-kegiatan" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-kegiatan" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
                <p>
                    <?=
                    Html::button('Kode Rekening Lv. 1,2,3,4,5', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getRekening()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <span id="caption-rekening" class="pull-left"></span>
                    <small id="label-rekening" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-rekening" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
                <p>
                    <?=
                    Html::button('Belanja', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getBelanja()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <small id="label-belanja" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-belanja" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
 <p>
                    <?=
                    Html::button('Pendapatan', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getPendapatan()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <small id="label-pendapatan" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-pendapatan" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
                 <p>
                    <?=
                    Html::button('Pajak', [
                        'class' => 'btn btn-success',
                        'onClick' => 'getPajak()'
                    ])
                    ?>
                </p>
                <div class="clearfix">
                    <small id="label-pajak" class="pull-right">0%</small>
                </div>
                <div class="progress xxs">
                    <div id="progress-pajak" class="progress-bar progress-bar-green" style="width: 0%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
echo Dialog::widget([
    'libName' => 'krajeeDialogSuccess',
    'options' => ['type' => Dialog::TYPE_SUCCESS], // default options
]);
echo Dialog::widget([
    'libName' => 'krajeeDialogDanger',
    'options' => ['type' => Dialog::TYPE_DANGER], // default options
]);
?>
<script>

    function getSkpd()
    {
        var loop = new Await;
        var posting = $.post("<?= Url::to(['get-ref-skpd']) ?>", function () {
            console.log('success')
        })
                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    i = 0;
                    byk = data.message.length;
                    $("#caption-skpd").html('Ref SKPD');
   
                    loop.each(data.message, function (key, value) {
                        i = i + 1;
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Nm_Unit = value['Nm_Unit'];
                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-skpd']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_unit: Kd_Unit,
                            nama_skpd: Nm_Unit
                        })
                                .done(function () {
                                    console.log('done1');
                                })
                                .fail(function (xhr, status) {
                                    krajeeDialogDanger.alert('gagal,ini pesan errornya ' + xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-skpd").html(loading + ' %');
                                    $("#progress-skpd").attr("style", "width : " + loading + '%')
                                    console.log(loading);


                                });
                    });
                     loop.done(function(){
                          console.log('finish 1');
                     })
                })
//                     posting.then(function(){
//                         getSubSkpd();
//                });

        posting.always(function () {
            console.log('finish 1');
            //  krajeeDialogSuccess.alert('sukses');
            getSubSkpd();
        })
    }
    ;
    function getSubSkpd()
    {
        var posting = $.post("<?= Url::to(['get-ref-sub-skpd']) ?>")

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-skpd").html('Ref Sub SKPD');

                    $.each(data.message, function (key, value) {
                      
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Kd_Sub = value['Kd_Sub'];
                        var Nm_Sub_Unit = value['Nm_Sub_Unit'];
                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-sub-skpd']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_unit: Kd_Unit,
                            kd_sub: Kd_Sub,
                            nama_skpd: Nm_Sub_Unit
                        })
                                .done(function(){
                                      i = i + 1;
                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-skpd").html(loading + ' %');
                                    $("#progress-skpd").attr("style", "width : " + loading + '%')
                                    console.log('suucess');


                                });
                    });
                });
        posting.always(function () {
            console.log('finish 2');
            krajeeDialogSuccess.alert('sukses');

        })
    }
    ;

    function getProgram()
    {
        var posting = $.post("<?= Url::to(['get-ref-program']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    console.log(byk);
                    $.each(data.message, function (key, value) {
                        var Tahun = value['Tahun'];
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Kd_Sub = value['Kd_Sub'];
                        var Kd_Prog = value['Kd_Prog'];

                        var ID_Prog = value['ID_Prog'];
                        var Ket_Program = value['Ket_Program'];
                        var Kd_Urusan1 = value['Kd_Urusan1'];
                        var Kd_Bidang1 = value['Kd_Bidang1'];
                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-program']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_prog: Kd_Prog,
                            kd_unit: Kd_Unit,
                            kd_sub: Kd_Sub,
                            ket_program: Ket_Program,
                            kd_bidang1: Kd_Bidang1,
                            kd_urusan1: Kd_Urusan1,
                            id_prog: ID_Prog
                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-program").html(loading + ' %');
                                    $("#progress-program").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            krajeeDialogSuccess.alert('sukses');
        })
    }
    ;
    //kegiatan

    function getKegiatan()
    {
        var posting = $.post("<?= Url::to(['get-ref-kegiatan']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $.each(data.message, function (key, value) {
                        var Tahun = value['Tahun'];
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Kd_Sub = value['Kd_Sub'];
                        var Kd_Prog = value['Kd_Prog'];
                        var ID_Prog = value['ID_Prog'];
                        var Kd_Keg = value['Kd_Keg'];

                        var idprog = ID_Prog.toString()
                        var Kd_Urusan1 = idprog.substring(0, 2);
                        var Kd_Bidang1 = idprog.substring(2, 1);
                        var Ket_Kegiatan = value['Ket_Kegiatan'];
                        var Lokasi = value['Lokasi'];
                        var Kelompok_Sasaran = value['Kelompok_Sasaran'];
                        var Pagu_Anggaran = value['Pagu_Anggaran'];
                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-kegiatan']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_program: Kd_Prog,
                            kd_unit: Kd_Unit,
                            kd_sub: Kd_Sub,
                            kd_kegiatan: Kd_Keg,
                            nama_kegiatan: Ket_Kegiatan,
                            pagun: Pagu_Anggaran,
                            kd_bidang1: Kd_Bidang1,
                            kd_urusan1: Kd_Urusan1,
                            id_prog: ID_Prog
                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-kegiatan").html(loading + ' %');
                                    $("#progress-kegiatan").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            krajeeDialogSuccess.alert('sukses');
        })
    }
    ;
    function getRekening()
    {
        //Rekening 1
        var posting = $.post("<?= Url::to(['get-rekening-satu']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-rekening").html('Data Rekening 1');
                    $.each(data.message, function (key, value) {
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Nm_Rek_1 = value['Nm_Rek_1'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-rek-satu']) ?>", {
                            kd_rek_1: Kd_Rek_1,
                            nm_rek_1: Nm_Rek_1,

                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-rekening").html(loading + ' %');
                                    $("#progress-rekening").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            getRekeningDua()
        })
    }
    ;
    function getRekeningDua()
    {
        //Rekening 1
        var posting = $.post("<?= Url::to(['get-rekening-dua']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-rekening").html('Data Rekening 2');
                    $.each(data.message, function (key, value) {
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Nm_Rek_2 = value['Nm_Rek_2'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-rek-dua']) ?>", {
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            nm_rek_2: Nm_Rek_2,

                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-rekening").html(loading + ' %');
                                    $("#progress-rekening").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            getRekeningTiga()
        })
    }
    ;
    function getRekeningTiga()
    {
        //Rekening 1
        var posting = $.post("<?= Url::to(['get-rekening-tiga']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-rekening").html('Data Rekening 3');
                    $.each(data.message, function (key, value) {
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Kd_Rek_3 = value['Kd_Rek_3'];
                        var Nm_Rek_3 = value['Nm_Rek_3'];
                        var SaldoNorm = value['SaldoNorm'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-rek-tiga']) ?>", {
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            kd_rek_3: Kd_Rek_3,
                            nm_rek_3: Nm_Rek_3,
                            saldonorm: SaldoNorm,

                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-rekening").html(loading + ' %');
                                    $("#progress-rekening").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            getRekeningEmpat()
        })
    }
    ;
    function getRekeningEmpat()
    {
        //Rekening 1
        var posting = $.post("<?= Url::to(['get-rekening-empat']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-rekening").html('Data Rekening 4');
                    $.each(data.message, function (key, value) {
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Kd_Rek_3 = value['Kd_Rek_3'];
                        var Kd_Rek_4 = value['Kd_Rek_4'];
                        var Nm_Rek_4 = value['Nm_Rek_4'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-rek-empat']) ?>", {
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            kd_rek_3: Kd_Rek_3,
                            kd_rek_4: Kd_Rek_4,
                            nm_rek_4: Nm_Rek_4
                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-rekening").html(loading + ' %');
                                    $("#progress-rekening").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            getRekeningLima()
        })
    }
    ;
    function getRekeningLima()
    {
        //Rekening 1
        var posting = $.post("<?= Url::to(['get-rekening-lima']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-rekening").html('Data Rekening 5');
                    $.each(data.message, function (key, value) {
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Kd_Rek_3 = value['Kd_Rek_3'];
                        var Kd_Rek_4 = value['Kd_Rek_4'];
                        var Kd_Rek_5 = value['Kd_Rek_5'];
                        var Nm_Rek_5 = value['Nm_Rek_5'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-ref-rek-lima']) ?>", {
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            kd_rek_3: Kd_Rek_3,
                            kd_rek_4: Kd_Rek_4,
                            kd_rek_5: Kd_Rek_5,
                            nm_rek_5: Nm_Rek_5

                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-rekening").html(loading + ' %');
                                    $("#progress-rekening").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                    })
                });
        posting.always(function () {
            krajeeDialogSuccess.alert('sukses');
        })
    }
    ;

    function getBelanja()
    {
        //Rekening 1
        var posting = $.post("<?= Url::to(['get-belanja']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-belanja").html('Data Belanja');
                    $.each(data.message, function (key, value) {
                        var Tahun = value['Tahun'];
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Kd_Sub = value['Kd_Sub'];
                        var Kd_Prog = value['Kd_Prog'];
                        var ID_Prog = value['ID_Prog'];
                        var Kd_Keg = value['Kd_Keg'];
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Kd_Rek_3 = value['Kd_Rek_3'];
                        var Kd_Rek_4 = value['Kd_Rek_4'];
                        var Kd_Rek_5 = value['Kd_Rek_5'];
                        var Nm_Rek_5 = value['Nm_Rek_5'];
                        var No_Rinc = value['No_Rinc'];
                        var Keterangan = value['Keterangan'];
                        var Total = value['Total'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-belanja-rinc']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_unit: Kd_Unit,
                            kd_sub: Kd_Sub,
                            kd_prog: Kd_Prog,
                            id_prog: ID_Prog,
                            kd_keg: Kd_Keg,
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            kd_rek_3: Kd_Rek_3,
                            kd_rek_4: Kd_Rek_4,
                            kd_rek_5: Kd_Rek_5,
                            nm_rek_5: Nm_Rek_5,
                            no_rinc: No_Rinc,
                            keterangan: Keterangan,
                            total : Total
                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-belanja").html(loading + ' %');
                                    $("#progress-belanja").attr("style", "width : " + loading + '%')
            if(byk==i){
                  krajeeDialogSuccess.alert('sukses');
                  return false;
            }
                                })
                    })
                });
     
    };
    //Pendapatan
   function getPendapatan()
    {
        //Pendapatan
        var posting = $.post("<?= Url::to(['get-pendapatan']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-pendapatan").html('Data Pendapatan');
                    $.each(data.message, function (key, value) {
                        var Tahun = value['Tahun'];
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Kd_Sub = value['Kd_Sub'];
                        var Kd_Prog = value['Kd_Prog'];
                        var ID_Prog = value['ID_Prog'];
                        var Kd_Keg = value['Kd_Keg'];
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Kd_Rek_3 = value['Kd_Rek_3'];
                        var Kd_Rek_4 = value['Kd_Rek_4'];
                        var Kd_Rek_5 = value['Kd_Rek_5'];
                        var Nm_Rek_5 = value['Nm_Rek_5'];
                        var No_Rinc = value['No_ID'];
                        var Keterangan = value['Keterangan'];
                        var Total = value['Total'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-belanja-rinc']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_unit: Kd_Unit,
                            kd_sub: Kd_Sub,
                            kd_prog: Kd_Prog,
                            id_prog: ID_Prog,
                            kd_keg: Kd_Keg,
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            kd_rek_3: Kd_Rek_3,
                            kd_rek_4: Kd_Rek_4,
                            kd_rek_5: Kd_Rek_5,
                            nm_rek_5: Nm_Rek_5,
                            no_rinc: No_Rinc,
                            keterangan: Keterangan,
                            total : Total
                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-pendapatan").html(loading + ' %');
                                    $("#progress-pendapatan").attr("style", "width : " + loading + '%')
                                    if(byk==i){
                  krajeeDialogSuccess.alert('sukses');
                  return false;
            }
                                })
                    })
                console.log('selesai');
                });
       
    };
    //Pajak
     function getPajak()
    {
                                let loop = new Await;
       var posting = $.post("<?= Url::to(['get-pajak']) ?>", function () {
            console.log('start')
        })

                .done(function () {
                    console.log('done');
                })

                .always(function (data) {
                    data = JSON.parse(data);
                    var i = 0;
                    var byk = data.message.length;
                    $("#caption-pajak").html('Data Pajak');
                    
                loop.each(data.message, function (key, value) {
                        var Tahun = value['Tahun'];
                        var Kd_Urusan = value['Kd_Urusan'];
                        var Kd_Bidang = value['Kd_Bidang'];
                        var Kd_Unit = value['Kd_Unit'];
                        var Kd_Sub = value['Kd_Sub'];
                        var Kd_Prog = value['Kd_Prog'];
                        var ID_Prog = value['ID_Prog'];
                        var Kd_Keg = value['Kd_Keg'];
                        var Kd_Rek_1 = value['Kd_Rek_1'];
                        var Kd_Rek_2 = value['Kd_Rek_2'];
                        var Kd_Rek_3 = value['Kd_Rek_3'];
                        var Kd_Rek_4 = value['Kd_Rek_4'];
                        var Kd_Rek_5 = value['Kd_Rek_5'];
                        var Nm_Rek_5 = value['Nm_Rek_5'];
                        var No_Rinc = value['Kd_Pembayaran'];
                        var Keterangan = value['Keterangan'];

                        var insert = $.get("<?= \yii\helpers\Url::to(['insert-belanja-rinc']) ?>", {
                            kd_urusan: Kd_Urusan,
                            kd_bidang: Kd_Bidang,
                            kd_unit: Kd_Unit,
                            kd_sub: Kd_Sub,
                            kd_prog: Kd_Prog,
                            id_prog: ID_Prog,
                            kd_keg: Kd_Keg,
                            kd_rek_1: Kd_Rek_1,
                            kd_rek_2: Kd_Rek_2,
                            kd_rek_3: Kd_Rek_3,
                            kd_rek_4: Kd_Rek_4,
                            kd_rek_5: Kd_Rek_5,
                            nm_rek_5: Nm_Rek_5,
                            no_rinc: No_Rinc,
                            keterangan: Keterangan
                        })
                                .done(function () {
                                    i = i + 1;

                                })
                                .fail(function (xhr, status) {
                                    console.log(xhr.responseText);
                                    return false
                                })

                                .always(function () {
                                    var loading = parseInt((i / byk) * 100);
                                    $("#label-pajak").html(loading + ' %');
                                    $("#progress-pajak").attr("style", "width : " + loading + '%')
                                    //     console.log(i);
                                })
                                loop.object.push(value)
                    });
                            loop.done(function(response){
                       krajeeDialogSuccess.alert(response); //   console.log('selesai');
                        
                    });
              
        
                });
     
    };
</script>