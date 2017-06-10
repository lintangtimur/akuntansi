<?php
$con = Connection::Connect();
$k = 0;
$sql = "SELECT jurnalumum.nobukti, jurnalumum.tgltransaksi, jurnalumum.nojurnal, kodeunit.nama, jurnalumum.jenis
FROM jurnalumum
JOIN kodeunit on kodeunit.unit = jurnalumum.unit
WHERE jurnalumum.del ='0'
AND jurnalumum.posting ='0'";
$result = $con->query($sql);
require "view/posting.view.php";
