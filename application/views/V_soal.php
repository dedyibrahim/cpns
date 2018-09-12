<body onload="data_soal();" class="bg_login_pns">
      <?php echo print_r($this->session->userdata()) ?>
    
    <div class="col-md-6 offset-5" style="background-color:#fff; "><hr>
        <div class="container" style="background-color:#ffc107;  color: #dc3545; padding:1%; ">
            <h2 align="center">Selamat datang <?php echo $this->session->userdata('nama_lengkap') ?></h2>
        </div>
        <div class="container" style="background-color:#17a2b8;  color: #fff; padding:3%; ">
                     <button class="btn btn-light">Jumlah soal</button>
                     <button class="btn btn-danger" id="demo"></button>
                     <button class="btn btn-light">Selesai</button>
                     <button class="btn btn-light" onclick="keluar()" >Keluar <span class="fa fa-sign-out"></span></button>
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
$("#data_soal").html(data);    
}
});    
}

function keluar(){
var <?php echo $this->security->get_csrf_token_name();?>    = "<?php echo $this->security->get_csrf_hash(); ?>";       

$.ajax({
type:"post",
url:"<?php echo base_url('C_soal/keluar') ?>",
data:"token="+token,
success:function(data){
swal({
title:"", 
text:'Logout berhasil',
type:"success",
showConfirmButton: true,
}).then(function() {
window.location.href = "<?php echo base_url('C_soal') ?>";
});
}
});
}

</script>
