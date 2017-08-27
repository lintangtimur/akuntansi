$(document).ready(function() {
  $('select').material_select();
  $('.datepicker').pickadate({
    selectMonths: false, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy/mm/dd'
  });

  $('.modal').modal();

  //Jumlah Debet accounting.js
  $('#jumlahinput').on('change keyup keydown', function() {
    var nilaiDebet = $('#jumlahinput').val();

    $('#jumlahinput').val(accounting.formatNumber(nilaiDebet));
  });

  //Jumlah Kredit modal input
  $('#jumlahinput_kredit').on('change keyup keydown', function() {
    var nilaiKredit = $('#jumlahinput_kredit').val();

    $('#jumlahinput_kredit').val(accounting.formatNumber(nilaiKredit));
  });

  $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true // Choose whether you can drag to open on touch screens
  });

  $("#modalDebet").submit(function(event) {
    var bukti2 = $("#bukti").val();
    var inputakun2 = $("#akunmodal").val();
    var nounit2 = $("#unitmodal").val();
    var jumlah = $("#jumlahinput").val();
    var keterangan2 = $("#keterangan").val();
    tipe2 = 'D';
    var nocek = $("#nocekmodal").val();
    data1 = "bukti=" + bukti2 + "&nounit=" + nounit2 + "&inputakun=" + inputakun2 +
      "&jumlahinput=" + jumlah + "&keterangan=" + keterangan2 + "&tipe=" + tipe2 + "&nocek=" + nocek;

    $.ajax({
        type: 'POST',
        url: 'inputdebet',
        data: data1
      })
      .done(function(data) {
        console.log(data);
        Materialize.toast('Success', 2000, 'green');
        $("tbody").html(data.table);
        $("#jumlahD").val(data.total);
      })
      .fail(function(data) {
        console.log(data);
      });
    event.preventDefault();
  });

  $("#modalKredit").submit(function(event) {
    event.preventDefault();
    var bukti2 = $("#bukti").val();
    var inputakun2 = $("#akunmodal_kredit").val();
    var nounit2 = $("#unitmodal_kredit").val();
    var jumlah = $("#jumlahinput_kredit").val();
    var keterangan2 = $("#keterangan_kredit").val();
    tipe2 = 'K';
    var nocek = $("#nocekmodal_kredit").val();
    data1 = "bukti=" + bukti2 + "&nounit=" + nounit2 + "&inputakun=" + inputakun2 +
      "&jumlahinput=" + jumlah + "&keterangan=" + keterangan2 + "&tipe=" + tipe2 + "&nocek=" + nocek;

    $.ajax({
        type: 'POST',
        url: 'inputkredit',
        data: data1
      })
      .done(function(data) {
        console.log(data);
        Materialize.toast('Success', 2000, 'green');
        $("tbody").html(data.table);
        $("#jumlahK").val(data.total);
      })
      .fail(function(data) {
        console.log(data);
      });
  });

  $("#selesai").click(function() {
    $('#loading').show();
    var bukti = $("#bukti").val();
    var nounit = $("#unit").val();
    var tanggal = $("#tglTransaksi").val();
    var tipeKas = $("#tipeKas").val();
    var jumlahDebet = $("#jumlahD").val();
    var jumlahKredit = $("#jumlahK").val();

    payload = "bukti=" + bukti + "&nounit=" + nounit + "&tipeKas=" + tipeKas + "&tglTransaksi=" + tanggal + "&jumlahDebet=" + jumlahDebet + "&jumlahKredit=" + jumlahKredit;

    if (jumlahDebet == jumlahKredit) {
      $.ajax({
        type: "post",
        url: "inputjurnalumum",
        data: payload,
        dataType: 'json',
        encode: true,
        success: function(data) {
          if (data.success) {
            console.log(data);
            Materialize.toast("Berhasil masuk ke jurnal umum", 4000, 'green accent-2');
            $('#loading').hide();
            // location.reload();
          } else {
            if (data.hasOwnProperty('err')) {
              Materialize.toast(data.err, 4000, 'red accent-2');
            }
            $('#loading').hide();
          }
        }
      });
    } else {
      $('#loading').hide();
      Materialize.toast("<i class='material-icons'>info</i>Jumlah debet tidak sama dengan jumlah kredit", 3000, 'deep-orange lighten-1');
    }
  });

  $('#posting').click(function() {
    console.log("Modal button posting di klik");
    $('#modal_confirm').modal('open');

  });

  // tombol setuju jika akan di posting ke jurnalumum
  $('#agree').click(function() {
    $.ajax({
      type: 'post',
      url: 'accposting',
      success: function(resp) {
        if (resp == "sukses") {
          $('.modal').modal('close');
          location.reload();
        }
      }
    });
  });

  // Ketika memilih UNIT di kredit, akan cek tanggal transaksi sudah dipilih apa belum
  $("#unit").change(function() {
    var pilih = $("#tipeKas").val();
    var tglTransaksi = $("#tglTransaksi").val();
    var unitKredit = $("#unit").val();

    datanya = "unitkredit=" + unitKredit + '&tipeKas=' + pilih + '&tgl=' + tglTransaksi;

    $.ajax({
      url: "nobukti",
      type: "POST",
      dataType: "json",
      data: datanya,
      encode: true,
      success: function(ajaxData) {
        // console.log(ajaxData);
        if (ajaxData.error) {
          Materialize.toast(ajaxData.message, 4000, 'red accent-2');
        } else {
          $("#bukti").val(ajaxData.nomor + "/" + ajaxData.pilih + "/" + ajaxData.unit + "/" + ajaxData.bulan + "/" + ajaxData.tahun);
        }
      }
    });
  });
});

$("#unit").change(function() {
  var pilih = $("#tipeKas").val();
  var tglTransaksi = $("#tglTransaksi").val();
  var unitKredit = $("#unit").val();

  datanya = "unitkredit=" + unitKredit + '&tipeKas=' + pilih + '&tgl=' + tglTransaksi;

  $.ajax({
    url: "nobukti",
    type: "POST",
    dataType: "json",
    data: datanya,
    encode: true,
    success: function(ajaxData) {
      // console.log(ajaxData);
      if (ajaxData.error) {
        Materialize.toast(ajaxData.message, 4000, 'red accent-2');
      } else {
        $("#bukti").val(ajaxData.nomor + "/" + ajaxData.pilih + "/" + ajaxData.unit + "/" + ajaxData.bulan + "/" + ajaxData.tahun);
      }
    }
  });
});
