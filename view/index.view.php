<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AKUNTANSI JURNAL</title>
<?php require "partials/header.php"; ?>

<a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
    <div id="content">
      <div class="section">
        <div class="row">
          <div class="col s12">
            <div class="card z-depth-4">
              <div class="card-content">
                <h4>INPUT JURNAL </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="divider"></div> -->
      <div class="row">
        <div class="col s12 m6 l6">
          <div class="card z-depth-4">
            <div class="card-content white-text">
              <!-- <span class="card-title">Card Title</span> -->
              <div class="row">
                <input type="hidden" name="jenisDebet" value="D">
                <label for="">TIPE KAS</label>
                <div class="input-field col s12 inline">
                  <select id="tipeKas">
                    <option value="" selected>Choose your option</option>
                    <option value="KM">KAS MASUK</option>
                    <option value="KK">KAS KELUAR</option>
                    <option value="BM">BANK MASUK</option>
                    <option value="BK">BANK KELUAR</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <label for="">Tanggal Transaksi</label>
                <div class="input-field col s12 inline">
                  <input type="date" id="tglTransaksi" data-error class="datepicker" name="" value="">
                </div>
              </div>

              <div class="row">
                <label for="">Jumlah Debet</label>
                <div class="input-field col s12 inline">
                  <input disabled type="text" class="" id="jumlahD" name="" value="">
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 inline">
                  <button data-target="modal1" class="btn blue darken-1 waves-effect waves-light"  name="">DEBET
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <form class="col l6">
          <div class="card z-depth-4">
            <div class="card-content white-text">
              <!-- <span class="card-title">Card Title</span> -->
              <div class="row">
                <input type="hidden" name="jenisKredit" value="K">
                <label for="">UNIT</label>
                <div class="input-field col s12 inline">
                  <select id="unit">
                    <option value="" disabled selected>Choose your option</option>
                    <?php while ($row = $result->fetch_object()):?>
                    <option value="<?=$row->unit?>"><?=$row->nama;?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <label for="">Jumlah Kredit</label>
                <div class="input-field col s12 inline">
                  <input disabled id="jumlahK" id="jumlahD" type="text"name="" value="">
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 inline">
                  <button class="btn waves-effect waves-light blue" data-target="modal2" name="">KREDIT INPUT
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- UNTUK TABLE  -->
      <div class="card z-depth-4">
        <div class="card-content">
          <span class="card-title">JURNAL TABLE</span>
          <table class="striped">
           <thead>
             <tr>
                 <th>#</th>
                 <th>No Rek</th>
                 <th>Unit</th>
                 <th>Debet</th>
                 <th>Kredit</th>
                 <th>Keterangan</th>
             </tr>
           </thead>
           <tbody>
           </tbody>
         </table>
        </div>

      </div>
      <img id="loading" src="../asset/svg/Ellipsis.svg">
      <button  id="selesai" type="button" class="btn green waves-effect waves-light" name="button">DONE</button>
    </div>
    </div>

  <!-- Modal DEBET -->
  <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4>Debet Button</h4>
        <div class="row">
          <form class="" id="modalDebet" action="" method="post">
          <label for="">UNIT</label>
          <div class="input-field col s12 inline">
            <select id="unitmodal">
              <option value="" disabled selected>Choose your option</option>
              <?php
              $result = $con->query($sql);
              while ($row = $result->fetch_object()):?>
              <option value="<?=$row->unit?>"><?=$row->nama;?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <label for="">NO AKUN</label>
          <div class="input-field col s12 inline">
            <select id="akunmodal">
              <option value="" selected>PILIH</option>
              <?php
              $sql = "SELECT kode1,kode2,Nama FROM  kode_rek2";
              $result = $con->query($sql);
              while ($row = $result->fetch_object()) :
              ?>
              <option value="<?= $row->kode2;?>"><?= $row->kode1?><?= $row->kode2?> | <?= $row->Nama;?></option>
            <?php endwhile; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <label for="">JUMLAH</label>
          <div class="input-field col s12 inline">
            <input type="text" id="jumlahinput" name="jumlahinput" value="">
          </div>
        </div>
        <div class="row">
          <label for="">KETERANGAN</label>
          <div class="input-field col s12 inline">
            <textarea id="keterangan" class="materialize-textarea" data-length="120" name="keterangan" rows="8" cols="80"></textarea>
          </div>
        </div>
        <div class="row">
          <label for="">NO CEK</label>
          <div class="input-field col s12 inline">
            <input type="text" id="nocekmodal" name="nocek" value="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="simpan" class="modal-action modal-close waves-effect waves-green btn-flat" name="" type="submit" >SIMPAN</button>
      </div>
    </div>
  </form>

  <!-- Modal Kredit -->
  <div id="modal2" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4>KREDIT</h4>
        <div class="row">
          <form class="" id="modalKredit" method="post">
          <label for="">UNIT</label>
          <div class="input-field col s12 inline">
            <select id="unitmodal_kredit">
              <option value="" disabled selected>Choose your option</option>
              <?php
              $sql = "SELECT unit, nama from kodeunit where deleted='no'";
              $result = $con->query($sql);
              while ($row = $result->fetch_object()):?>
              <option value="<?=$row->unit?>"><?=$row->nama;?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <label for="">NO AKUN</label>
          <div class="input-field col s12 inline">
            <select id="akunmodal_kredit">
              <option value="" selected>PILIH</option>
              <?php
              $sql = "SELECT kode1,kode2,Nama FROM  kode_rek2";
              $result = $con->query($sql);
              while ($row = $result->fetch_object()) :
              ?>
              <option value="<?= $row->kode2;?>"><?= $row->kode1?><?= $row->kode2?> | <?= $row->Nama;?></option>
            <?php endwhile; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <label for="">JUMLAH</label>
          <div class="input-field col s12 inline">
            <input type="text" id="jumlahinput_kredit" name="jumlahinput" value="">
          </div>
        </div>
        <div class="row">
          <label for="">KETERANGAN</label>
          <div class="input-field col s12 inline">
            <textarea id="keterangan_kredit" class="materialize-textarea" data-length="120" name="keterangan" rows="8" cols="80"></textarea>
          </div>
        </div>
        <div class="row">
          <label for="">NO CEK</label>
          <div class="input-field col s12 inline">
            <input type="text" id="nocekmodal_kredit" name="nocek" value="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="simpan" class="modal-action modal-close waves-effect waves-green btn-flat" name="" type="submit" >SIMPAN</button>
      </div>
    </div>
<?php require "partials/footer.php"; ?>

  </body>
</html>
