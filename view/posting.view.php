<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>POSTING</title>
    <link rel="stylesheet" href="asset/css/materialize.min.css">
    <link rel="stylesheet" href="https:/fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
    <style type="text/css">
    #container{
      padding-left: 300px;
    }
    input[type="search"] {
      height: 64px !important; /* or height of nav */
    }
    #content{
      padding : 40px;
    }
    @media only screen and (max-width : 992px) {
        #container {
          padding-left: 0;
        }
      }
    </style>

    <?php require "partials/header.php"; ?>

    <!-- Halaman utama -->
    <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
    <div id="content">
      <button class="btn light-blue darken-4 waves-effect waves-light" type="button" name="button" id="posting">POSTING</button>
      <div class="section">
        <div class="row">
          <div class="col s12">
            <table class="striped">
              <tr>
                <th>#</th>
                <th>No Bukti</th>
                <th>Tgl Transaksi</th>
                <th>Unit</th>
                <th>Jenis</th>
              </tr>
              <?php
              while ($row = $result->fetch_object()): ?>
              <?php $k = $k + 1;  ?>
                  <tr>
                  <td><?= $k?></td>
                  <td><?= $row->nobukti?></td>
                  <td><?= $row->tgltransaksi?></td>
                  <td><?=$row->nama?></td>
                  <td><?=$row->jenis?></td>
                  </tr>
              <?php endwhile; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Konfirmasi -->
<div id="modal_confirm" class="modal">
          <div class="modal-content">
            <h4>KONFIRMASI</h4>
            <p>Apakah anda akan mem-post semua data ini?</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat red ">Nope!</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Setuju</a>
          </div>
        </div>
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/cekbukti.js"></script>
    <script src="asset/js/materialize.js"></script>
  </body>
</html>
