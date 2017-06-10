 <?php
require "core/database/Connection.php";
require "core/utilities/RomanMonths.php";
header('Content-Type: application/json');
$con = Connection::Connect();
$required = [
  "tgl"
];
$error = false;
foreach ($required as $req) {
    if (empty($_POST[$req])) {
        $error = true;
    }
}
if (!$error) {
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
    $data = [
        "nomor" => $nomor,
        "pilih" => $pilih,
        "unit" => $unit,
        "bulan" => RomanMonths::Convert($bulan),
        "tahun" => $tahun
      ];
} else {
    $data = [
      "error" => true,
      "message" => "Tanggal transaksi dibutuhkan!"
    ];
}

echo json_encode($data);
