$(document).ready(function(){
  $("#unit").change(function(){
    var pilih = $("#tipeKas").val();
    var tglTransaksi = $("#tglTransaksi").val();
    var unitKredit = $("#unit").val();
    datanya = "unitkredit="+unitKredit+'&tipeKas='+pilih+'&tgl='+tglTransaksi;

    $.ajax({
      url : "nobukti.php",
      type : "POST",
      data : datanya,
      success : function(ajaxData){
        $("#bukti").val(ajaxData);
        console.log(ajaxData);
      }
    });
  });
});
