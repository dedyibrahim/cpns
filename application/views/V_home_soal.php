
<body onload="data_soal();" class="bg_login_pns">
<div class="col-md-6 offset-5" style="background-color:#fff; ">
<hr><h4 align="center"> <img src="<?php echo base_url() ?>assets/img/logo-toko.png" alt=""/>
<br>Bocoran soal CPNS 2018 <hr></h4>
<button onclick="keluar();"  class="btn btn-sm btn-success float-right">Keluar <span class="fa fa-sign-out"></span></button>
<h5><?php echo $this->session->userdata('nama_lengkap'); ?> Nilai terakhir anda adalah  <?php $query = $this->db->get_where('akun',array('id_account'=>$this->session->userdata('id_account')))->row_array(); echo number_format($query['nilai']); ?></h5>
<div class="clearfix"></div><hr>
<h4 align="center">Tentang CPNS</h4>
<h6 align="center">
Pegawai Negeri Sipil (PNS) merupakan pegawai yang telah memenuhi syarat
yang ditentukan, diangkat oleh pejabat yang berwenang dan diberikan tugas
dalam suatu jabatan negeri, atau tugas negara lainnya, dan digaji berdasarkan
peraturan
perundang-undangan
yang
berlaku.</h6>

<hr>
<div class="row">
<div class="col">
<img style="width:100%; " id="zoom_01" data-zoom-image="<?php echo base_url() ?>assets/img/cpns.jpg" src="<?php echo base_url() ?>assets/img/cpns.jpg" alt=""/>

</div>
<div class=" col">

<h6 align="center">Soal di ambil dari kisi-kisi soal cpns 2018<hr> <br> Buku yang akan membimbing Anda lulus CPNS
dengan mudah dan murah. Jangan Cari Buku lain
Cukup Buku ini saja !, semua pertanyaan Anda akan 
terjawab dibuku ini
</h6>        
<h6>Waktu : 90 menit</h6>
<h6>Jumlah soal : <?php echo $this->db->get('soal')->num_rows(); ?></h6>

</div>
</div>
<hr>
<?php if (!$this->session->userdata('selesai')){ ?>
<a href="<?php echo base_url('C_soal/soal') ?>"><button class="btn form-control btn-success">Mulai mengerjakan soal <span class="fa fa-pencil"></span></button></a>
<?php }else{ ?>
<a href="<?php echo base_url('C_soal/tes_ulang') ?>"><button class="btn form-control btn-warning">Tes Ulang <span class="fa fa-pencil"></span></button></a>    
<?php } ?> 
<hr>
</div>
<script type="text/javascript">
$("#zoom_01").elevateZoom({
zoomType				: "inner",
cursor: "crosshair"
});
</script>