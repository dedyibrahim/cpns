<div class="container" style="background-color:#17a2b8;  color: #fff; padding:3%; ">
<button class="btn btn-light" onclick="lihat_nilai();">Lihat Nilai <span class="fa fa-windows"></span></button>
<button class="btn btn-light float-right danger" onclick="keluar()" >Keluar <span class="fa fa-sign-out"></span></button>
<button class="btn btn-light">Jawaban  Benar( <?php echo isset($hasil['benar'])?$hasil['benar'] :'0' ?>  <span class="fa fa-check-circle"></span> )  Salah ( <?php echo isset($hasil['salah'])?$hasil['salah'] :'0' ?> <span class="fa fa-close"></span> ) </button>
</div>

<script type="text/javascript">
function lihat_nilai(){
 var <?php echo $this->security->get_csrf_token_name();?>    = "<?php echo $this->security->get_csrf_hash(); ?>";       
$.ajax({
type:"post",
url:"<?php echo base_url('C_soal/lihat_nilai') ?>",
data:"token="+token,
success:function(data){
if(data != 'kosong'){    
swal({
title: 'Nilai anda adalah <br>' +data,
animation: false,
customClass: 'animated tada'
})   
}else{
swal({
title: 'Nilai belum terdedia',
animation: false,
customClass: 'animated tada'
})    
}   
}
});   
}

</script>    