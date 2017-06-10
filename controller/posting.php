<?php
$qb = new QueryBuilder();
$con = Connection::Connect();
$qb->select(
  'jurnalumum.nobukti',
  'jurnalumum.tgltransaksi',
  'jurnalumum.nojurnal',
  'kodeunit.nama',
  'jurnalumum.jenis'
  )
  ->from('jurnalumum')
  ->join('kodeunit on kodeunit.unit = jurnalumum.unit')
  ->where("jurnalumum.del = '0'")
  ->whereAnd("jurnalumum.posting ='0'");

$k = 0;

$result = $con->query($qb->result());
require "view/posting.view.php";
