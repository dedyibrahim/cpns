<div class="container">
<div class="row">
<div class="col-md-6">
<hr>
<h4 align="center"><span class="fa fa-pencil fa-color fa-2x"> </span> <br>Input Soal</h4> 
<hr>
<label>Input soal</label>
<textarea type="text" class="form-control" id="soal" placeholder="Input soal . . . "></textarea>

<label>Input jawaban A</label>
<input type="text" class="form-control" id="jawab_a" placeholder="Jawaban A . . .">

<label>Input jawaban B </label>
<input type="text" class="form-control" id="jawab_b" placeholder="Jawaban B . . .">

<label>Input jawaban C</label>
<input type="text" class="form-control" id="jawab_c" placeholder="Jawaban C . . .">

<label>Input jawaban D</label>
<input type="text" class="form-control" id="jawab_d" placeholder="Jawaban D . . .">

<label>Input jawaban D</label>
<input type="text" class="form-control" id="jawab_e" placeholder="Jawaban E . . .">


<label>Input jawaban yang Benar</label>
<input type="text" class="form-control" id="jawab_benar" placeholder="Jawaban yang benar . . .">

<hr>
<button class="btn btn-success float-right form-control" id="simpan_soal">Simpan Soal <span class="fa fa-save"></span></button>

</div>
</div>  
</div>
<script type="text/javascript">
$(document).ready(function(){
$("#simpan_soal").click(function(){
var <?php echo $this->security->get_csrf_token_name();?>    = "<?php echo $this->security->get_csrf_hash(); ?>";       
var soal        =   $("#soal").val();
var jawab_a     =   $("#jawab_a").val();
var jawab_b     =   $("#jawab_b").val();
var jawab_c     =   $("#jawab_c").val();
var jawab_d     =   $("#jawab_d").val();
var jawab_e     =   $("#jawab_e").val();
var jawab_benar =   $("#jawab_benar").val();

if (soal !=''&& jawab_e != '' && jawab_a !='' && jawab_b !='' && jawab_c !='' && jawab_d !='' && jawab_benar != ''){
$.ajax({
 type:"post",
 url:"<?php echo base_url('C_dashboard/simpan_soal') ?>",
 data:"token="+token+"&jawab_e="+jawab_e+"&soal="+soal+"&jawab_a="+jawab_a+"&jawab_b="+jawab_b+"&jawab_c="+jawab_c+"&jawab_d="+jawab_d+"&jawab_benar="+jawab_benar,
success:function(data){
if(data == "berhasil"){
swal({
text:"Input berhasil",
type:"success",        
});    
}

}
});    
}else{
swal({
text:"Masih ada data yang harus di isi",
type:"error",        
});    
}


});   
});
</script>
