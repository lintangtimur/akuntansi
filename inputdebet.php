<?php
require "core/database/Connection.php";
$con = Connection::Connect();
$inputakun = $_POST['inputakun'];
$jumlah = $_POST['jumlahinput'];
$bukti = $_POST['bukti'];
$jenis = $_POST['tipe'];
$unit = $_POST['nounit'];
$nocek = $_POST['nocek'];
$keterangan = $_POST['keterangan'];
$sql = "INSERT INTO jurnaldetil VALUES('','$bukti', '$inputakun', '$unit', '$jenis', '$jumlah',
  '$keterangan', '$nocek', '0')";
$result = $con->query($sql);
if ($result) {
    echo "DATA TELAH MASUK";
} else {
    echo $con->error;
}
