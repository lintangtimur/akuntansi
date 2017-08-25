<?php
$con = Connection::Connect();
$awal = date('Y-m-d', strtotime($_POST['tglawal'])); //2017-07-31
$awalbulan1 = date('m', strtotime($_POST['tglawal'])); //07
$awalbulan = $_POST['tglawal']; //2017/07/31
$akhirbulan = $_POST['tglakhir']; //2017/07/31
$akhir = date('Y-m-d', strtotime($_POST['tglakhir'])); //2017-07-31

$akun = $_POST['kodeakun']; //10000 11000
$pecah1 = substr($akun, 0, 1); //1 1
$nol1 = substr($akun, 1, 4); //0000 1000
$pecah2 = substr($akun, 0, 2); //10 11
$nol2 = substr($akun, 2, 3); //000 000
$pecah3 = substr($akun, 0, 3); //100 110
$nol3 = substr($akun, 3, 2); //00 00

// die(var_dump($nol3));
// echo $awalbulan." "."-"." ".$akhirbulan;

if ($akun == 'all') {
    $query = $con->query('SELECT kode2, "Nama",status FROM kode_rek2');
} else {
    if ($nol1 == '0000') {
        $query = $con->prepare('SELECT kode2, "Nama",status FROM kode_rek2 where kode2 like :pecah');
        $query->execute([
          ':pecah' => $pecah1.'%'
        ]);
    } else {
        if ($nol2 == '000') {
            $query = $con->prepare('SELECT kode2, "Nama",status FROM kode_rek2 where kode2 like :pecah');
            $query->execute([
              ':pecah' => $pecah2.'%'
            ]);
        } else {
            if ($nol3 == '00') {
                $query = $con->query('SELECT kode2, "Nama",status FROM kode_rek2 where kode2 like :pecah');
                $query->execute([
                  ':pecah' => $pecah3.'%'
                ]);
            } else {
                $query = $con->query('SELECT kode2, "Nama",status FROM kode_rek2 where kode2 = :akun ');
                $query->execute([
                  ':akun' => $akun
                ]);
            }
        }
    }
}

$saldoawal = 0;
$bulan = date('m', strtotime($awal)); //  07
$year = date('Y', strtotime($awal)); //  2017
$bulansblm = date('m', strtotime('-1 month', strtotime($awalbulan1))); //12
// die(var_dump($year));

require "view/reportrinci.view.php";
