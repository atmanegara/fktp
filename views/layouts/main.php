<?php
/* @var $this \yii\web\View */
/* @var $content string */

use dmstr\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
//  $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
   <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->beginBody() ?>

        <div class="wrapper">
            <header class="main-header">
                  <?php
            NavBar::begin([
                'brandLabel' => 'Monitoring JKN',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-static-top',
                ],
            ]);

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                 $menuItems[] = ['label' => 'Data Referensi', 'url' => '#', 'items' => [
                        ['label' => 'Skpd', 'url' => ['/ref-sub-skpd']],
//                        ['label' => 'Program', 'url' => ['/ref-program']],
//                        ['label' => 'Kegiatan', 'url' => ['/ref-kegiatan']],
                        ['label' => 'Belanja', 'url' => ['/ta-belanja-rinc']],
                        ['label' => 'Pegawai', 'url' => ['/ref-pegawai']]
                ],'visible'=> in_array(Yii::$app->user->identity->hakuser,['11']) ? true : false];
                $menuItems[] = ['label' => 'Data FKTP', 'url' => ['/ref-fktp'],'visible'=> in_array(Yii::$app->user->identity->hakuser,['11']) ? true : false];
                $menuItems[] = ['label' => 'Data Saldo', 'url' => ['/data-saldo'],'visible'=> in_array(Yii::$app->user->identity->hakuser,['11','22']) ? true : false];
                $menuItems[] = ['label' => 'Kas Buku', 'url' => ['/data-buku-kas'],'visible'=> in_array(Yii::$app->user->identity->hakuser,['11','22']) ? true : false];
                $menuItems[] = [
                    'label' => 'Laporan',
                    'items' => [
                         ['label' => 'Lap. Realisasi Anggaran', 'url' => ['/lap-realisasi-anggaran']],
                        ['label'=>'Lap. Pernyataan Pertanggung jawaban','url'=>['/lap-tanggung-jwb']]
//                       ['label' => 'Lap. Realisasi Data Kapitasi JKN', 'url' => ['/lap-realisasi-jkn']],
//                        ['label' => 'Lap. SP3B', 'url' => '#'],
//                        ['label' => 'Lap. SP2B', 'url' => '#'],
                    ],'visible'=> in_array(Yii::$app->user->identity->hakuser,['11','22']) ? true : false
                ];
                $menuItems[] = ['label' => 'Setting', 'url' => '#', 'items' => [
                        ['label' => 'Tarik Simda', 'url' => ['/integrasi/simda']],
                        ['label' => 'User', 'url' => ['/user']],
                    ['label'=>'Setting Entry Realisasi JKN','url'=>['/setting/entry-jkn']]
                ],'visible'=> in_array(Yii::$app->user->identity->hakuser,['11']) ? true : false];
                $menuItems[] = ['label' => 'Akun(' . Yii::$app->user->identity->username . ')', 'items' => [
                        '
                        <!-- User image 
                        <li class="user-header">
                            <img src="" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>-->
                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-primary btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                       '
                        . Html::a(
                                'Sign out',
                                ['/site/logout'],
                                ['data-method' => 'post', 'class' => 'btn btn-warning btn-flat']
                        )
                        . '
                                
                            </div>
                        </li>
                   '
                ]];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-custom-menu'],
                // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems
            ]);
            NavBar::end();
            ?> 
            </header>
         
  <div class="content-wrapper">
      <div class="container">
          <section class="content-header">
                  <?php
//            Breadcrumbs::widget([
//                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//            ])
            ?>
          </section>
          <section class="content">
               <?= Alert::widget() ?>
                <?= $content ?>
                
          </section>
      </div>
  </div>
     
        </div>



<?php $this->endBody() ?>
    </body>
</html>
        <?php $this->endPage() ?>
