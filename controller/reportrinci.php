<?php
$con = Connection::Connect();
$awal = date('Y-m-d', strtotime($_POST['tglawal']));
$awalbulan1 = date('m', strtotime($_POST['tglawal']));
$awalbulan = $_POST['tglawal'];
$akhirbulan = $_POST['tglakhir'];
$akhir = date('Y-m-d', strtotime($_POST['tglakhir']));

$akun = $_POST['kodeakun']; //10000
$pecah1 = substr($akun, 0, 1); //1
$nol1 = substr($akun, 1, 4); //0000
$pecah2 = substr($akun, 0, 2); //10
$nol2 = substr($akun, 2, 3); //000
$pecah3 = substr($akun, 0, 3); //100
$nol3 = substr($akun, 3, 2); //00
$all_var = get_defined_vars();
die(var_dump($all_var));
// echo $awalbulan." "."-"." ".$akhirbulan;
