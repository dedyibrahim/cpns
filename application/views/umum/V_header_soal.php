<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
if($this->session->userdata('email_soal') == NULL){
    redirect('C_login');    
}
?>

<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="<?php echo base_url('assets/img/ico.jpg'); ?>" type="image/ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Guepedia</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable') ?>/dataTables.bootstrap4.min.css">

<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/custom_guepedia.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/swal/animate.css" rel="stylesheet" type="text/css"/>

<script src="<?php echo base_url(); ?>assets/swal/dist/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatable') ?>/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatable') ?>/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/elevatezoom/jquery.elevatezoom.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/chart/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/chart/dist/Chart.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/daterange/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/daterange/daterangepicker.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/daterange/daterangepicker.css" rel="stylesheet" type="text/css"/>

</head>
<div class="loading" id="loading">
<div style="position:fixed;display:block; z-index:10;">
<div class="sk-circle"  >
  <div class="sk-circle1 sk-child"></div>
  <div class="sk-circle2 sk-child"></div>
  <div class="sk-circle3 sk-child"></div>
  <div class="sk-circle4 sk-child"></div>
  <div class="sk-circle5 sk-child"></div>
  <div class="sk-circle6 sk-child"></div>
  <div class="sk-circle7 sk-child"></div>
  <div class="sk-circle8 sk-child"></div>
  <div class="sk-circle9 sk-child"></div>
  <div class="sk-circle10 sk-child"></div>
  <div class="sk-circle11 sk-child"></div>
  <div class="sk-circle12 sk-child"></div>
</div>

</div></div>
<script type="text/javascript">
function keluar(){
var <?php echo $this->security->get_csrf_token_name();?>    = "<?php echo $this->security->get_csrf_hash(); ?>";       
swal({
title: 'Anda yakin ingin keluar',
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Ya Keluar'
}).then((result) => {
$.ajax({
type:"post",
url:"<?php echo base_url('C_soal/keluar') ?>",
data:"token="+token,
success:function(data){

}
});
swal({
title:"", 
text:'Logout berhasil',
type:"success",
showConfirmButton: true,
}).then(function() {
window.location.href = "<?php echo base_url('C_soal') ?>";
});

})
}
</script>