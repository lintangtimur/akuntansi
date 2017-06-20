<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>REPORT</title>
    <?php require "partials/header.php"; ?>
  </head>
  <body>
    <?php require "partials/footer.php"; ?>
    <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>

    <div class="" id="content">
      <div class="section">
        <div class="row">
          <div class="col s12">
            <div class="card z-depth-4">
              <div class="card-content">
                <h4>REPORT</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card z-depth-4">
        <div class="card-content">
           <span class="card-title">Laporan Buku Besar per transaksi</span>
           <div class="card-action">

              <div class="row">
                <label for="nameField">No Akun</label>
                <div class="input-field col s12 inline">
                  <select id="inputakun" name="jenisakun">
                    <option value="">Pilih</option>
                    <?php while ($row = $result->fetch_object()):?>
                      <option value="<?= $row->kode2;?>"><?= $row->kode1?><?= $row->kode2?> | <?= $row->Nama;?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <label for="unitField">Awal Transaksi</label>
                <div class="input-field col s12 inline">
                  <input type="date" name="" value="<?php echo date('Y-m');?>">
                </div>
              </div>

              <div class="row">
                <label for="unitField">Akhir Transaksi</label>
                <div class="input-field col s12 inline">
                  <input type="date" name="" value="<?php echo date('Y-m');?>">
                </div>
              </div>

            </div>
        </div>
      </div>

    </div>
    <?php require "partials/footer.php"; ?>
  </body>
</html>
