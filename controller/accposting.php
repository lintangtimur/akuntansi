<?php
// require "core/database/Connection.php";
// require "core/database/QueryBuilder.php";
$con = Connection::Connect();
$qb = new QueryBuilder();

// Larangan Request ke halaman jika selain POST
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    die("/GET request type is prohibited!");
}

// menampilkan nojurnal
$qb->select("nojurnal")
  ->from("jurnalumum")
  ->where("del = 0")
  ->whereAnd("posting ='0'");
$result = $con->query($qb->result());
while ($row = $result->fetch()) {

    // update nojurnal berdasarkan no jurnal
    updateJU($con, $row['nojurnal']);
}

/**
 * fungsi untuk update ke Jurnalumum
 * @param  PDO $con      PDO connection
 * @param  string $nojurnal nojurnal
 * @return string          sukses or not
 */
function updateJU($con, $nojurnal)
{
    $sql = "UPDATE  jurnalumum SET  posting =  '1',tglpost = now() WHERE  nojurnal ='$nojurnal'";
    $con->query($sql);
    if ($con) {
        echo "sukses";
    }
}
