<?php
// require "core/database/Connection.php";
header('Content-Type: application/json');

$con = Connection::Connect();
$tanggal = $_POST['tglTransaksi'];
$bukti = $_POST['bukti'];
$tipeKas = $_POST['tipeKas'];
$unit = $_POST['nounit'];
$user = "";
$jumlahDebet = $_POST['jumlahDebet'];
$jumlahKredit = $_POST['jumlahKredit'];

if (empty($jumlahDebet) && empty($jumlahKredit)) {
    $data = [
            'err' => "Is Empty!"
        ];
    echo json_encode($data);
} else {
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
}
