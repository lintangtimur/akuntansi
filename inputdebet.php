<?php
require "core/database/Connection.php";
require "core/utilities/Currency.php";
header('Content-Type: application/json');
$con = Connection::Connect();

$inputakun = $_POST['inputakun'];
$jumlah = $_POST['jumlahinput'];
$bukti = $_POST['bukti'];
$jenis = $_POST['tipe'];
$unit = $_POST['nounit'];
$nocek = $_POST['nocek'];
$keterangan = $_POST['keterangan'];

$sql_insert = "INSERT INTO jurnaldetil
 VALUES('','$bukti', '$inputakun', '$unit', '$jenis',     '$jumlah', '$keterangan', '$nocek', '0')";
 $result = $con->query($sql_insert);

$sql_select = "SELECT jurnaldetil.nodetiljurnal,jurnaldetil.noakun, kodeunit.nama,jurnaldetil.tipe,  jurnaldetil.jumlah,jurnaldetil.keterangan
  FROM jurnaldetil
  JOIN kodeunit ON jurnaldetil.unit = kodeunit.unit
  WHERE jurnaldetil.nobukti = '$bukti'
  AND jurnaldetil.del = '0'";

$result = $con->query($sql_select);
$table = "<tr>";
$looping = 0;
while ($row = $result->fetch_object()) {
    $looping++;
    $table .= "<td>$looping"."</td>";
    $table .= "<td>$row->noakun"."</td>";
    $table .= "<td>$row->nama"."</td>";
    $nominal = Currency::rupiah($row->jumlah);
    $table .= "<td class='harga'>$nominal"."</td><td></td>";
    $table .= "<td>$row->keterangan"."</td></tr>";
}
$data['table'] = $table;

$sql_sum = "SELECT SUM(jumlah) AS total
  FROM jurnaldetil
  WHERE nobukti = '$bukti'
  AND tipe = '$jenis'
  AND del = '0'";

$result = $con->query($sql_sum);
while ($row = $result->fetch_object()) {
    $data['total'] = Currency::rupiah($row->total);
}
echo json_encode($data);
