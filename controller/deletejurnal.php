<?php
if (isset($_POST['detilid'])) {
    $stmt = $con->prepare(
    "DELETE FROM jurnaldetil where nodetiljurnal = :id"
  );
    $result = $stmt->execute(
    [':id' => $_POST['detilid']]
  );

    if (!empty($result)) {
        echo "Data berhasil dihapus";
    }
}
