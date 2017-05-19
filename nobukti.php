 <?php
require "core/database/Connection.php";
require "core/utilities/RomanMonths.php";
$con = Connection::Connect();

$pilih = $_POST['tipeKas'];
$unit = $_POST['unitkredit'];
$tgl = $_POST['tgl'];
$bulan = substr($tgl, 5, 2); //2017-05-10 => 05
$tahun = substr($tgl, 0, 4); //2017-05-10 => 2017
$count = 0;

$sql = "SELECT nojurnal FROM jurnalumum WHERE month(tgltransaksi) = '$bulan' and unit='$unit'
          AND jenis='$pilih' AND year(tgltransaksi) = '$tahun'";
$result = $con->query($sql);
$count = $result->num_rows;
$nomor = $count + 1;

echo $nomor."/".$pilih."/".$unit."/".RomanMonths::Convert($bulan)."/".$tahun;
