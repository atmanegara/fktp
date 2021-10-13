<?php
namespace app\component;

use yii\base\Component;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NamaBulanComponent
 *
 * @author Administrator
 */
class BulanComponent extends Component {
    
    
    public static function NamaBulan($bulan){
        
        $namabulan = [
            1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        ];
        
        return $namabulan[$bulan];
        
    }
}
