<?php
require "core/database/Connection.php";
header('Content-Type: application/json');

$con = Connection::Connect();
$tanggal = $_POST['tglTransaksi'];
$bukti = $_POST['bukti'];
$tipeKas = $_POST['tipeKas'];
$unit = $_POST['nounit'];
$user = "";

$sql = "INSERT INTO jurnalumum VALUES('', '$tanggal', '', '$bukti', '$tipeKas', '$user', '0','0', '0', '0','0','0','$unit')";
$result = $con->query($sql);
if ($result) {
    $data = ["success" => true];
} else {
    $data = ["success" => false];
}
echo json_encode($data);
