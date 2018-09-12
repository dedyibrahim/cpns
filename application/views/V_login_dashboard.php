<body class="bg_login_pns">    

<div class="offset-7 col-md-4" style="margin-top:3%;" id="login">
<div style="background-color:#fff; padding:5%; border:1px solid #eee; color:#555;  ">
<h1><span class="fa fa-sign-in fa-2x float-right"></span></h1>
<h2>Sign in</h2>
<h5>To Dashboard Page </h5>
</div>
<div style="background-color:#eee; padding:5%; ">    
<label>Email :</label>
<input type="text" class="form-control" value="" id="email_login" placeholder="Masukan Email . . ." data-toggle="tooltip" title="Email yang didaftarkan">
<label>Password :</label>
<input type="password" class="form-control" value="" id="password_login" placeholder="Masukan Password . . ." data-toggle="tooltip" title="Password yang di buat">

<hr>
<button class="btn btn-success float-right" id="btn_login" >Sign in <span class="fa fa-sign-in"></span></button>
<div class="clearfix"></div><br>
</div>
</div>
 
<script type="text/javascript">
$(document).ready(function(){
$("#btn_login").click(function(){
var <?php echo $this->security->get_csrf_token_name();?>  = "<?php echo $this->security->get_csrf_hash(); ?>" ;  

var email_login    = $("#email_login").val();
var password_login = $("#password_login").val();

if(email_login !='' && password_login !=''){

$.ajax({
type:"POST",
url:"<?php echo base_url('C_dashboard/login') ?>",
data:"token="+token+"&email="+email_login+"&password="+password_login,
success:function(data){
if(data == "berhasil"){
swal({
title:"", 
text:"Login berhasil",
type:"success",
showConfirmButton: true,
}).then(function() {
window.location.href = '<?php echo base_url('C_dashboard/input_soal') ?>';
});    
    
}else{
swal({
title:"", 
text:"Email atau password salah",
type:"error",
showConfirmButton: true,
}).then(function() {
window.location.href = '<?php echo base_url('C_dashboard') ?>';
});
}   
}
    
    
});

    
}else{
swal({
title:"", 
text:"Harap isi email dan password anda",
type:"error",
showConfirmButton: true,
});    
    
}


});
});
</script>


</body>