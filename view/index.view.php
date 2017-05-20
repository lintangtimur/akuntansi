<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AKUNTANSI JURNAL</title>
    <link rel="stylesheet" href="asset/css/materialize.min.css">

    <link rel="stylesheet" href="https:/fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
  <style type="text/css">
  body{
    background-color: #eceff1 ;
  }
  #container{
    padding-left: 300px;
  }
  ul.dropdown-content.select-dropdown li span {
    color: #1e88e5 ; /* no need for !important :) */
}
  #content{
    padding : 40px;
  }
  label{
    font-size: 20px;
  }
  /* label focus color */
   .input-field input:focus + label {
     color: red !important;
   }
   .input-field{
     color: black;
   }
   /* label underline focus color */
   .row .input-field input:focus {
     border-bottom: 1px solid red !important;
     box-shadow: 0 1px 0 0 red !important
   }

   input[type="search"] {
     height: 64px !important; /* or height of nav */
   }
  @media only screen and (max-width : 992px) {
      #container {
        padding-left: 0;
      }
    }
  </style>

    <nav class="top-nav blue darken-1">
      <div id="container" class="container nav-wrapper">
          <a href="#" class="brand-logo">STELINDATA</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input type="search" id="bukti" name="" value="">
                  <label for="search" class="label-icon"><i class="material-icons">search</i></label>
                </div>
              </form>

            </div>
          </ul>
      </div>
    </nav>
<div class="" id="container">
  <ul id="slide-out" class="side-nav fixed show-on-large-only">
    <li><a href="laporan-keuangan">Laporan Keuangan</a></li>
    <li><a href="about">About</a></li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#!">First</a></li>
              <li><a href="#!">Second</a></li>
              <li><a href="#!">Third</a></li>
              <li><a href="#!">Fourth</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>

<a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
    <div id="content">
      <div class="section">
        <div class="row">
          <div class="col s12">
            <div class="card z-depth-4">
              <div class="card-content">
                <h4>INPUT JURNAL</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="divider"></div> -->
      <div class="row">
        <form class="col s12 m6 l6" method="">
          <div class="card z-depth-4">
            <div class="card-content white-text">
              <!-- <span class="card-title">Card Title</span> -->
              <div class="row">
                <label for="">TIPE KAS</label>
                <div class="input-field col s12 inline">
                  <select id="tipeKas">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="">KAS MASUK</option>
                    <option value="">KAS KELUAR</option>
                    <option value="">BANK MASUK</option>
                    <option value="">BANK KELUAR</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <label for="">Tanggal Transaksi</label>
                <div class="input-field col s12 inline">
                  <input type="date" id="tglTransaksi" class="datepicker" name="" value="">
                </div>
              </div>

              <div class="row">
                <label for="">Jumlah Debet</label>
                <div class="input-field col s12 inline">
                  <input disabled type="date" class="datepicker" name="" value="">
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 inline">
                  <button data-target="modal1" class="btn blue darken-1 waves-effect waves-light" type="submit" name="">DEBET
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <form class="col l6">
          <div class="card z-depth-4">
            <div class="card-content white-text">
              <!-- <span class="card-title">Card Title</span> -->
              <div class="row">
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
                  <input disabled  type="text"name="" value="">
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 inline">
                  <button class="btn waves-effect waves-light blue " type="submit" name="">KREDIT INPUT
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
                 <th>Name</th>
                 <th>Item Name</th>
                 <th>Item Price</th>
             </tr>
           </thead>

           <tbody>
             <tr>
               <td>Alvin</td>
               <td>Eclair</td>
               <td>$0.87</td>
             </tr>
             <tr>
               <td>Alan</td>
               <td>Jellybean</td>
               <td>$3.76</td>
             </tr>
             <tr>
               <td>Jonathan</td>
               <td>Lollipop</td>
               <td>$7.00</td>
             </tr>
           </tbody>
         </table>
        </div>

      </div>
    </div>
    </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Debet Button</h4>
      <div class="row">
        <label for="">UNIT</label>
        <div class="input-field col s12 inline">
          <select id="unit">
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
        <label for="">JENIS AKUN</label>
        <div class="input-field col s12 inline">
          <select id="jenisAkun">
            <option value="" disabled selected>PILIH</option>
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
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Simpan</a>
    </div>
  </div>
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/materialize.js"></script>
    <script src="asset/js/cekbukti.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
    $('.datepicker').pickadate({
    selectMonths: false, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy/mm/dd'
  });
     $('.modal').modal();
    $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true // Choose whether you can drag to open on touch screens
  });
});

</script>
  </body>
</html>
