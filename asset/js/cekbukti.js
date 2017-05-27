$(document).ready(function(){
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

  $("#modalDebet").submit(function(event){
    event.preventDefault();
    var bukti2 = $("#bukti").val();
    var inputakun2 = $("#akunmodal").val();
    var nounit2 = $("#unitmodal").val();
    var jumlah = $("#jumlahinput").val();
    var keterangan2 = $("#keterangan").val();
    tipe2 = 'D';
    var nocek = $("#nocekmodal").val();
    data1 = "bukti="+bukti2+"&nounit="+nounit2+"&inputakun="+inputakun2+
    "&jumlahinput="+jumlah+"&keterangan="+keterangan2 + "&tipe="+tipe2+"&nocek="+nocek;

    $.ajax({
      type: 'POST',
      url: 'inputdebet.php',
      data:data1
    })
    .done(function(msg){
        console.log("MSG:"+msg);
      })
    .fail(function(data){
        console.log("eror");
      });
    });

  $("#unit").change(function(){
    var pilih = $("#tipeKas").val();
    var tglTransaksi = $("#tglTransaksi").val();
    var unitKredit = $("#unit").val();

    datanya = "unitkredit="+unitKredit+'&tipeKas='+pilih+'&tgl='+tglTransaksi;

    $.ajax({
      url : "nobukti.php",
      type : "POST",
      dataType : "json",
      data : datanya,
      encode : true,
      success : function(ajaxData){
        console.log(ajaxData);
        if(ajaxData.error)
        {
          Materialize.toast('Harap masukkan tanggal', 4000, 'red accent-2');
        }else{
          $("#bukti").val(ajaxData.nomor+"/"+ajaxData.pilih+"/"+ajaxData.unit+"/"+ajaxData.bulan    +"/"+ajaxData.tahun);
        }
      }
    });
});
});
