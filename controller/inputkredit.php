<?php
// require "core/database/Connection.php";
// require "core/utilities/Currency.php";
header('Content-Type: application/json');
$con = Connection::Connect();

$inputakun = $_POST['inputakun'];
$jumlah = str_replace(',', '', $_POST['jumlahinput']);
$bukti = $_POST['bukti'];
$jenis = $_POST['tipe'];
$unit = $_POST['nounit'];
$nocek = $_POST['nocek'];
$keterangan = $_POST['keterangan'];

// $sql_insert = "INSERT INTO jurnaldetil
//  VALUES('','$bukti', '$inputakun', '$unit', '$jenis', '$jumlah', '$keterangan', '$nocek', '0')";
$insert_pdo = "INSERT INTO public.jurnaldetil(
 nobukti, noakun, unit, tipe, jumlah, keterangan, nocek, del)
 VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
$result = $con->prepare($insert_pdo);
$result->execute([
  $bukti, $inputakun, $unit, $jenis, $jumlah, $keterangan, $nocek
]);

$sql_select = "SELECT jurnaldetil.nodetiljurnal,jurnaldetil.noakun, kodeunit.nama,jurnaldetil.tipe,  jurnaldetil.jumlah,jurnaldetil.keterangan
  FROM jurnaldetil
  JOIN kodeunit ON jurnaldetil.unit = kodeunit.unit
  WHERE jurnaldetil.nobukti = '$bukti'
  AND jurnaldetil.del = '0'";

$result = $con->query($sql_select);
$table = "<tr>";
$looping = 0;
while ($row = $result->fetch()) {
    $looping++;
    $table .= "<td>$looping"."</td>";
    $table .= "<td>".$row['noakun']."</td>";
    $table .= "<td>".$row['nama']."</td>";
    $nominal = Currency::rupiah($row['jumlah']);
    if ($row['tipe'] == "D") {
        $table .= "<td>$nominal</td><td></td>";
    } else {
        $table .= "<td></td><td>$nominal</td>";
    }
    $table .= "<td>".$row['keterangan']."</td>";
    $table .= "<td><button class='btn red darken-4 waves-effect waves-light' name=''>Del<i class='material-icons right'>delete_forever</i></button></td></tr>";
}
$data['table'] = $table;

$sql_sum = "SELECT SUM(jumlah) AS total
  FROM jurnaldetil
  WHERE nobukti = '$bukti'
  AND tipe = '$jenis'
  AND del = '0'";

$result = $con->query($sql_sum);
while ($row = $result->fetch()) {
    $data['total'] = Currency::rupiah($row['total']);
}
echo json_encode($data);
