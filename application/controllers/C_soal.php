<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_soal extends CI_Controller{

public function __construct() {
parent::__construct();
$this->load->model('M_soal');
}

public function index(){

$this->load->view('umum/V_header_soal');    
$this->load->view('V_home_soal');    
}


public function soal(){

$this->load->view('umum/V_header_soal');    
$this->load->view('V_soal');    
}

function data_soal(){
$set_timer =  date("Y/m/d H:i:s", strtotime("+90 minutes"));    

if($this->session->userdata('set_timer') == NULL){
$this->session->set_userdata(array('set_timer'=>$set_timer));   
} 
if(!$this->session->userdata('selesai')){
$query = $this->M_soal->data_soal();  

$hasil =array(
'benar' =>0,    
'salah' =>0, 
);

}else{
$selesai = $this->session->userdata('selesai');
$ht = count($selesai);
$newData=array();
foreach ($selesai as $i=>$ht){
$newData[] =  $selesai[$i]['id_soal'];    
}

$hasil_soal = array();
foreach ($selesai as $i=>$ht){

$hasil_soal [] =  $selesai[$i]['status'];    
}
$hasil = array_count_values($hasil_soal);    


$query = $this->M_soal->data_soal_lanjut($newData);
}
$jumlah_soal  = $this->M_soal->jumlah_soal()->num_rows();  
$selesai_soal = $this->session->userdata('selesai');
$selesai = count($selesai_soal);
$hitung = 1+$selesai;


$data_soal = array(
'selesai' => $hitung,
'soal'    => $jumlah_soal,   
);

if($jumlah_soal == $selesai || $selesai > $jumlah_soal){

$selesai = $this->session->userdata('selesai');
$jumlah_soal  = $this->M_soal->jumlah_soal()->num_rows();  


$ht = count($selesai);
$hasil_soal = array();
foreach ($selesai as $i=>$ht){
$hasil_soal [] =  $selesai[$i]['status'];    
}
if(isset($hasil['benar'])){
$hasil = array_count_values($hasil_soal);    
$nilai = $hasil['benar'] * 100 / $jumlah_soal ;
$this->session->set_userdata(array('total_nilai'=>$nilai));
}else{
$this->session->set_userdata(array('total_nilai'=>'0'));    
}
$input_nilai = array(
'nilai' =>$this->session->userdata('total_nilai'),    
);
$this->M_soal->input_nilai($input_nilai,$this->session->userdata('id_account'));

echo "selesai";


}else{
$this->load->view('V_atas_data_soal',['hasil'=>$hasil]);    
$this->load->view('V_data_soal',['query'=>$query,'data_soal'=>$data_soal]);    
}


}
function simpan_jawaban(){
if($this->input->post('jawaban')){
$input = $this->input->post();
$query = $this->M_soal->cek_jawaban($input['id_soal'])->row_array();

if($input['jawaban'] == $query['jawaban_benar']){

if(!$this->session->userdata('selesai')){
$array1['selesai'][] = array(
'id_soal'  => $query['id_soal'],
'jawaban'  => $input['jawaban'],       
'status'   =>'benar',
);
$this->session->set_userdata($array1);
}else{
$data_lama = $this->session->userdata('selesai');   

$data2 = array(
'id_soal'  => $query['id_soal'],
'jawaban'  => $input['jawaban'],       
'status'   =>'benar', 
);

array_push($data_lama, $data2);
$this->session->set_userdata('selesai',$data_lama);
}   

echo "benar";   


}else{

if(!$this->session->userdata('selesai')){
$array1['selesai'][] = array(
'id_soal'  => $query['id_soal'],
'jawaban'  => $input['jawaban'],       
'status'   =>'salah',
);
$this->session->set_userdata($array1);
}else{
$data_lama = $this->session->userdata('selesai');   

$data2 = array(
'id_soal'  => $query['id_soal'],
'jawaban'  => $input['jawaban'],       
'status'   =>'salah', 
);

array_push($data_lama, $data2);
$this->session->set_userdata('selesai',$data_lama);
}

echo $query['jawaban_benar'];    


}

}else{
redirect(404);  
}
}

function lihat_nilai(){
$selesai = $this->session->userdata('selesai');
$jumlah_soal  = $this->M_soal->jumlah_soal()->num_rows();  

if($selesai != ''){
$ht = count($selesai);
$hasil_soal = array();
foreach ($selesai as $i=>$ht){
$hasil_soal [] =  $selesai[$i]['status'];    
}

$hasil = array_count_values($hasil_soal);    

if(isset($hasil['benar'])){
$nilai = $hasil['benar'] * 100 / $jumlah_soal ;


echo number_format($nilai);
}else{
echo "kosong";    

}

}else{
echo "kosong";    
}
}

function  tes_ulang(){
unset($_SESSION['selesai']);
$set_timer =  date("Y/m/d H:i:s", strtotime("+90 minutes"));    

$this->session->set_userdata(array('set_timer'=>$set_timer));   

redirect('C_soal/soal');    
}
function keluar (){
$this->session->sess_destroy();}

}