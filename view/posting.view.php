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
    <div class="" id="container">
    <nav class="top-nav blue darken-1">
      <div id="container" class="container nav-wrapper">
          <a href="#" class="brand-logo">POSTING</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input type="search" id="bukti" name="" value="">
                  <label for="" class="label-icon"><i class="material-icons">search</i></label>
                </div>
              </form>

            </div>
          </ul>
      </div>
    </nav>

    <ul id="slide-out" class="side-nav fixed show-on-large-only">
      <li><a href="report">Report</a></li>
      <li><a href="about">About</a></li>
      <li><a href="posting">Posting</a></li>
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

    <!-- Halaman utama -->
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
              $con = Connection::Connect();
              $k = 0;
              $sql = "SELECT jurnalumum.nobukti, jurnalumum.tgltransaksi, jurnalumum.nojurnal, kodeunit.nama, jurnalumum.jenis
              FROM jurnalumum
              JOIN kodeunit on kodeunit.unit = jurnalumum.unit
              WHERE jurnalumum.del ='0'
              AND jurnalumum.posting ='0'";
              $result = $con->query($sql);
              while ($row = $result->fetch_object()) {
                  $k = $k + 1;
                  echo "<tr>";
                  echo "<td>$k</td>";
                  echo "<td>$row->nobukti</td>";
                  echo "<td>$row->tgltransaksi</td>";
                  echo "<td>$row->nama</td>";
                  echo "<td>$row->jenis</td>";
                  echo "</tr>";
              }
               ?>
            </table>
          </div>
        </div>
      </div>
    </div>

</div>

    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/materialize.js"></script>
  </body>
</html>
