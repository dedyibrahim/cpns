<body  class="bg_dashboard">

    <div class="container" style="background-color: #fff;">
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
<div class="clearfix"></div><hr>
</div>
<div class="col">
        <h4 align="center">Data Soal <span class=" fa fa-list-alt"></span></h4><hr>
<table id="data_soal" class="table table-striped table-condensed  table-hover table-sm"><thead>
<tr role="row">
<th  align="center"     aria-controls="datatable-fixed-header"   >No</th>
<th  align="center"     aria-controls="datatable-fixed-header"  >Soal</th>
<th  align="center"     aria-controls="datatable-fixed-header"  >Aksi</th>
</thead>
<tbody align="center">
</table>    
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
<script type="text/javascript">
$(document).ready(function() {
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
{
return {
"iStart": oSettings._iDisplayStart,
"iEnd": oSettings.fnDisplayEnd(),
"iLength": oSettings._iDisplayLength,
"iTotal": oSettings.fnRecordsTotal(),
"iFilteredTotal": oSettings.fnRecordsDisplay(),
"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
};
};

var t = $("#data_soal").dataTable({
initComplete: function() {
var api = this.api();
$('#data_soal')
.off('.DT')
.on('keyup.DT', function(e) {
if (e.keyCode == 13) {
api.search(this.value).draw();
}
});
},
oLanguage: {
sProcessing: "loading..."
},
processing: true,
serverSide: true,
ajax: {"url": "<?php echo base_url('C_dashboard/json_soal/') ?> ", 
"type": "POST",
data: function ( d ) {
d.token = '<?php echo $this->security->get_csrf_hash(); ?>';
}
},
columns: [
{
"data": "id_soal",
"orderable": false
},
{"data": "soal"},
{"data": "view"},



],
order: [[1, 'desc']],
rowCallback: function(row, data, iDisplayIndex) {
var info = this.fnPagingInfo();
var page = info.iPage;
var length = info.iLength;
var index = page * length + (iDisplayIndex + 1);
$('td:eq(0)', row).html(index);
}
});
});


</script> 