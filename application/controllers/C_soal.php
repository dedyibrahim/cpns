<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_soal extends CI_Controller{

public function __construct() {
parent::__construct();
$this->load->model('M_soal');
}


public function index(){
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
   
}else{
$selesai = $this->session->userdata('selesai');
$ht = count($selesai);
$newData=array();
foreach ($selesai as $i=>$ht){
$newData[] =  $selesai[$i]['id_soal'];    
}
$query = $this->M_soal->data_soal_lanjut($newData);

}

$this->load->view('V_data_soal',['query'=>$query]);    


}
function simpan_jawaban(){
if($this->input->post('jawaban')){
$input = $this->input->post();
$query = $this->M_soal->cek_jawaban($input['id_soal'])->row_array();

if(!$this->session->userdata('selesai')){
$array1['selesai'][] = array(
'id_soal'  => $query['id_soal'],
'jawaban'  => $input['jawaban'],       
);
$this->session->set_userdata($array1);
}else{
 $data_lama = $this->session->userdata('selesai');   

 $data2 = array(
'id_soal'  => $query['id_soal'],
'jawaban'  => $input['jawaban'],       
  );

array_push($data_lama, $data2);
$this->session->set_userdata('selesai',$data_lama);
echo print_r($this->session->userdata());
}



/*if($input['jawaban'] == $query['jawaban_benar']){

 echo "benar";   


}else{

echo $query['jawaban_benar'];    


}*/

}else{
redirect(404);  
}
}

function keluar (){
$this->session->sess_destroy();}

}