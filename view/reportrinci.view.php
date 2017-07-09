<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>REPORT RINCI</title>
    <?php
    require "partials/header.php"; ?>
    <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
    <div class="" id="content">
      <h4>
        <?=date('l, jS F, Y', strtotime($awalbulan))." "."-"." ".date('l, jS F, Y', strtotime($akhirbulan));?>
      </h4>
      <?php

      while ($rp = $query->fetch_object()) {
          $kode2 = $rp->kode2; //10000 11000
          $status = $rp->status; //d d

          $res = $con->query("SELECT jurnalumum.tgltransaksi,jurnaldetil.nobukti,jurnaldetil.keterangan,jurnaldetil.noakun,jurnaldetil.unit,jurnaldetil.tipe,jurnaldetil.jumlah
          FROM jurnaldetil join jurnalumum on jurnaldetil.nobukti = jurnalumum.nobukti
          WHERE jurnalumum.del = '0' and jurnaldetil.del = '0' and jurnalumum.posting ='1' and jurnaldetil.noakun = $kode2 and month(jurnalumum.tgltransaksi) = '$bulan'and year(jurnalumum.tgltransaksi) = '$year'");
          $count = $res->num_rows;

          if ($count > 0) {
              echo "<br>

              <h5>$rp->Nama --- $rp->kode2</h5><br>";

              echo "<h5>Saldo Awal: ".Currency::rupiah($saldoawal)."</h5>"; ?>
      <div class="row">
        <div class="col s12">
          <table class="striped centered responsive-table" id="tableinput">
            <tr>
              <th>#</th>
              <th>Tgl Transaksi</th>
              <th>No Bukti</th>
              <th>Nama</th>
              <th>Debet</th>
              <th>Kredit</th>
              <th>Saldo</th>
            </tr>
            <tr></tr>

              <?php
              $K = 0;
              $saldo = 0;
              $saldo = $saldoawal;
              $jumlahdebet = 0;
              $jumlahkredit = 0;
              $saldotrans = 0;
              while ($r = $res->fetch_object()) {
                  $K++;

                  $tanggal = date('d-M-Y', strtotime($r->tgltransaksi));
                  echo "<tr><td>$K</td>";
                  echo "<td>$tanggal</td>";
                  echo "<td>$r->nobukti</td>";
                  echo "<td>$r->keterangan</td>";
                  if ($r->tipe == 'D') {
                      $jumlahdebet = $jumlahdebet + $r->jumlah;
                      if ($status == 'd') {
                          $saldo = $saldo - $r->jumlah;
                          $saldotrans = $saldotrans - $r->jumlah;
                      } else {
                          $saldo = $saldo + $r->jumlah;
                          $saldotrans = $saldotrans + $r->jumlah;
                      }
                      echo "<td>".Currency::rupiah($r->jumlah)."</td>"; // KOlom DEBET
                      echo "<td></td>";
                      echo "<td>".Currency::rupiah($saldo)."</td>"; //Kolom Saldo
                  } else {
                      $jumlahkredit = $jumlahkredit + $r->jumlah;
                      if ($status == 'd') {
                          $saldo = $saldo + $r->jumlah;
                          $saldotrans = $saldotrans + $r->jumlah;
                      } else {
                          $saldo = $saldo - $r->jumlah;
                          $saldotrans = $saldotrans - $r->jumlah;
                      }
                      echo "<td></td>";
                      echo "<td>".Currency::rupiah($r->jumlah)."</td>"; //Kolom Kredit
                      echo "<td>".Currency::rupiah($saldo)."</td></tr>
                      ";// Kolom SALDO
                  }
              }
              $saldoakhir = 0; ?>
          </table>
          <!-- <h5>Jumlah Debet: <?= Currency::rupiah($jumlahdebet); ?></h5>
          <h5>Jumlah kredit: <?= Currency::rupiah($jumlahkredit); ?></h5>
          <h5>Saldo Akhir: <?= Currency::rupiah($saldo); ?></h5> -->
          <div class="row">
            <div class="col s4">
              <div class="card  red darken-2">
                <div class="card-content white-text">
                  <span class="card-title"><b>Jumlah Debet</b></span>
                  <?= Currency::rupiah($jumlahdebet); ?>
                </div>
              </div>
            </div>
            <div class="col s4">
              <div class="card deep-orange darken-1">
                <div class="card-content white-text">
                  <span class="card-title"><b>Jumlah Kredit</b></span>
                  <?= Currency::rupiah($jumlahkredit); ?>
                </div>
              </div>
            </div>
            <div class="col s4">
              <div class="card light-green darken-2">
                <div class="card-content white-text">
                  <span class="card-title"><b>Saldo Akhir</b></span>
                  <?= Currency::rupiah($saldo); ?>
                </div>
              </div>
            </div>
          </div>
        <!-- </div>
        </div> -->
          <?php

          }
      }
      ?>
    </div> <!--Akhir Row col s12 -->
      </div><!--Akhir Row -->

    </div> <!--div id content -->

  </body>
</html>
