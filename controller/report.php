<?php
$con = Connection::Connect();
$qb = new QueryBuilder();

// SELECT kode1, kode2, Nama from kode_rek2
$qb->select("kode1, kode2, Nama")
    ->from("kode_rek2");
$result = $con->query($qb->result());
require "view/report.view.php";
