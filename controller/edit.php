<?php
$con = Connection::Connect();

$id = $_POST['id'];
$query = "SELECT kodeunit.nama, jurnaldetil.nodetiljurnal,jurnaldetil.noakun, kodeunit.nama,jurnaldetil.tipe, jurnaldetil.jumlah,jurnaldetil.keterangan
from jurnaldetil
join kodeunit on jurnaldetil.unit = kodeunit.unit
where jurnaldetil.nodetiljurnal = '$id'";
$result = $con->query($query);
while ($row = $result->fetch()) {
    $nama = $row['nama'];
    $noakun = $row['noakun'];
    $jumlah = $row['jumlah'];
    $keterangan = $row['keterangan'];
}
$data = [
  "nama" => $nama,
  "noakun" => $noakun,
  "jumlah" => $jumlah,
  "keterangan" => $keterangan
];
echo json_encode($data);
