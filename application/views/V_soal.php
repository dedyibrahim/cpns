<body onload="data_soal();" class="bg_login_pns">

<div class="col-md-6 offset-5" style="background-color:#fff; "><hr>
<div class="container" style="background-color:#ffc107;  color: #dc3545; padding:1%; ">
<div class="row">
<div class="col">
<h5 align="center">Selamat Mengerjakan <?php echo $this->session->userdata('nama_lengkap') ?> :-)</h5>
</div>
<div class="col-md-4">
<h6 align="center" id="demo"></h6>  
</div>
</div>
</div>     
<div id="data_soal">

</div>
</div>


</body>
<script type="text/javascript">
function data_soal(){
var <?php echo $this->security->get_csrf_token_name();?>    = "<?php echo $this->security->get_csrf_hash(); ?>";       

$.ajax({
type:"post",
url:"<?php echo base_url('C_soal/data_soal') ?>",
data:"token="+token,
success:function(data){
if(data == 'selesai'){
swal({
title:"Selesai", 
text:'Soal telah di isi semua',
type:"success",
showConfirmButton: true,
}).then(function() {
window.location.href = "<?php echo base_url('C_soal') ?>";
});
}else{
$("#data_soal").html(data);    
}
}
});    
}




</script>
