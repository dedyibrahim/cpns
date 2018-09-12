  <div  style="background-color:#fff; "><hr>
    <?php
    
   foreach ($query->result_array() as $soal ){
    ?>
        <h5><?php echo $soal['soal'] ?></h5>
        <h6>A. <input name="<?php echo $soal['id_soal'] ?>" id="jawaban" type="radio" value="<?php echo $soal['jawaban_a'] ?>"> <?php echo $soal['jawaban_a'] ?></h6>
        <h6>B. <input name="<?php echo $soal['id_soal'] ?>" id="jawaban" type="radio" value="<?php echo $soal['jawaban_b'] ?>"> <?php echo $soal['jawaban_b'] ?></h6>
        <h6>C. <input name="<?php echo $soal['id_soal'] ?>" id="jawaban" type="radio" value="<?php echo $soal['jawaban_d'] ?>"> <?php echo $soal['jawaban_c'] ?></h6>
        <h6>D. <input name="<?php echo $soal['id_soal'] ?>" id="jawaban" type="radio" value="<?php echo $soal['jawaban_d'] ?>"> <?php echo $soal['jawaban_d'] ?></h6>
        <h6>E. <input name="<?php echo $soal['id_soal'] ?>" id="jawaban" type="radio" value="<?php echo $soal['jawaban_e'] ?>"> <?php echo $soal['jawaban_e'] ?></h6>
        <button class="btn btn-success float-right" onclick="simpan_jawaban('<?php echo $soal['id_soal'] ?>')">Simpan dan lanjutkan <span class="fa fa-angle-right"></span></button>
        <div class="clearfix"></div><hr>
   <?php } ?>
 
    </div>

<script type="text/javascript">

function simpan_jawaban(id){
var <?php echo $this->security->get_csrf_token_name();?>    = "<?php echo $this->security->get_csrf_hash(); ?>";       
var jawaban =  $("input[name='<?php echo $soal['id_soal'] ?>']:checked").val();
if(jawaban !=undefined){
$.ajax({
type:"post",
url:"<?php echo base_url('C_soal/simpan_jawaban') ?>",
data:"token="+token+"&jawaban="+jawaban+"&id_soal="+id,
success:function(data){
if(data == 'benar'){
swal({
title:"", 
text:'Jawaban anda benar',
type:"success",
showConfirmButton: true,
});
data_soal();
}else{
swal({
title:"", 
html:'Jawaban anda salah seharusnya <br> ' +data,
type:"error",
showConfirmButton: true,
});    
data_soal();
}
}
});

}else{
    
swal({
title:"", 
text:'Anda Belum memilih jawaban',
type:"error",
showConfirmButton: true,
});   

}


}

var countDownDate = new Date("<?php echo $this->session->userdata('set_timer') ?>").getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("demo").innerHTML =   hours + " Jam "
    + minutes + " Menit " + seconds + " Detik ";
    if (distance < 0) {
    swal({
        type:"warning",
        text:"Waktu Mengerjakan soal telah habis",
    })
     }
}, 1000);
</script>