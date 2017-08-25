<?php
// require "core/database/Connection.php";
header('Content-Type: application/json');

$con = Connection::Connect();
$tanggal = $_POST['tglTransaksi'];
$bukti = $_POST['bukti'];
$tipeKas = $_POST['tipeKas'];
$unit = $_POST['nounit'];
$user = "";

$sql = 'INSERT INTO public.jurnalumum(
	tgltransaksi, nobukti, jenis, print, cost, tagihan, del, posting, unit)
	VALUES (?, ?, ?, 0, 0, 0, 0, 0, ?);';
$result = $con->prepare($sql);
$result->execute([
  $tanggal, $bukti, $tipeKas, $unit
]);

if ($result) {
    $data = ["success" => true];
} else {
    $data = ["success" => false];
}
echo json_encode($data);
