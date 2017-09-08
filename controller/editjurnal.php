<?php
if (isset($_POST['nodetil'])) {
    $output = [];
    $stmt = $con->prepare(
      "SELECT kodeunit.nama, jurnaldetil.noakun, jurnaldetil.jumlah, jurnaldetil.keterangan, jurnaldetil.nocek
      FROM jurnaldetil
      join kodeunit on jurnaldetil.unit = kodeunit.unit
      where nodetiljurnal = '".$_POST['nodetil']."'"
    );

    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $row) {
        $output['unit'] = $row['nama']; //YAYASAN
        $output['noakun'] = $row['noakun']; //10000
        $output['jumlah'] = $row['jumlah']; //9000
        $output['keterangan'] = $row['keterangan'];
        $output['nocek'] = $row['nocek'];
    }

    echo json_encode($output);
}
