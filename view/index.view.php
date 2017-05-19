<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AKUNTANSI JURNAL</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
  </head>
  <body>
    <!--Navigasi -->
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">APLIKASI TRANSAKSI KEUANGAN UNIKA SOEGIJAPRANATA</a></li>
            <li><a href="about">About</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="bukti" placeholder="No Bukti">
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      <div class="page-header">
        <h1>Input Jurnal</h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form class="form-horizontal" action="" method="post">
            <div class="form-group">
              <label for="" class="control-label col-sm-2">Tipe Kas</label>
              <div class="col-md-10">
                <select class="form-control" name="" id="tipeKas">
                  <option value="">KAS MASUK</option>
                  <option value="">KAS KELUAR</option>
                  <option value="">BANK MASUK</option>
                  <option value="">BANK KELUAR</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="control-label col-sm-2">Tgl Transaksi</label>
              <div class="col-md-10">
                  <input type="date" name="" id="tglTransaksi"class="form-control" value="">
                </div>
            </div>
            <div class="form-group">
              <label for="" class="control-label col-sm-2">Jumlah Debet</label>
              <div class="col-md-10">
                  <input type="text" name="" class="form-control" readonly value="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-2 col-md-offset-2">
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" name="button">DEBET INPUT</button>
              </div>
            </div>
            </form>
            </div>
            <div class="col-md-6">
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label for="" class="control-label col-sm-2">UNIT</label>
                  <div class="col-md-10">
                    <select class="form-control" name="" id="unit">
                      <option>Pilih</option>
                      <?php while ($row = $result->fetch_object()):?>
                       <option value="<?=$row->unit?>"><?=$row->nama;?></option>
                     <?php endwhile; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="control-label col-sm-2">Jumlah Kredit</label>
                  <div class="col-md-10">
                    <input type="text" readonly class="form-control" name="" value="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2 col-md-offset-2">
                    <button type="button" class="btn btn-primary" name="button">Kredit Input</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Membuat Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Modal Title</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="unitField" class="col-xs-3">UNIT</label>
              <div class="col-xs-7">
                <select class="form-control" name="" id="unitmodal">
                  <?php
                  $sql = "SELECT unit, nama FROM kodeunit where deleted = 'no'";
                  echo "<option>Pilih</option>";
                  while ($row = $result->fetch_object()) {
                      echo "<option value='$row->unit'>$row->nama</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="unitField" class="col-xs-3">Jenis Akun</label>
              <div class="col-xs-7">
                <select class="form-control" name="" id="pilih2">
                  <option value="">Pilih</option>
                  <option value="1">Asset</option>
                  <option value="2">Hutang</option>
                  <option value="3">Ekuitas</option>
                  <option value="4">Pendapatan</option>
                  <option value="5">Biaya</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">SIMPAN</button>
          </div>
        </div>
      </div>
    </div>

    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/js/cekbukti.js"></script>
  </body>
</html>
