<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_dashboard extends CI_Controller{   
public function __construct() {
parent::__construct();
$this->load->model('M_dashboard');
$this->load->library('datatables');
}

public function index(){
    
$this->load->view('umum/V_header');
$this->load->view('V_login_dashboard');
 
}

public function json_soal(){
echo $this->M_dashboard->json_soal();       
}

public function login(){
if($this->input->post('email')){
$input = $this->input->post();    
$login = array('email'=>$input['email'],'password'=>md5($input['password'])); 
$query = $this->M_dashboard->login($login);    
if($query->num_rows() > 0){

$data = $query->row_array();

$sess = array(
'email_dashboard' => $data['email'],
);
$this->session->set_userdata($sess);
 echo "berhasil";   
}else{
echo "akun_gaada";    
}
}else{
redirect(404);    
}    
}

function input_soal(){
$this->load->view('umum/V_header_dashboard');
$this->load->view('dashboard/V_input_soal');   
}

function simpan_soal(){
if($this->input->post('jawab_benar')){
$input = $this->input->post();

$data = array(
'soal'          => $input['soal'],   
'jawaban_a'     => $input['jawab_a'],    
'jawaban_b'     => $input['jawab_b'],   
'jawaban_c'     => $input['jawab_c'],  
'jawaban_d'     => $input['jawab_d'],
'jawaban_e'     => $input['jawab_e'],
'jawaban_benar' => $input['jawab_benar'],  
);
$this->M_dashboard->simpan_soal($data);

echo "berhasil";
}else{
redirect(404);    
}    


}
function hapus_soal(){
$id_soal  = base64_decode($this->uri->segment(3));

$this->db->delete('soal',array('id_soal'=>$id_soal));

redirect('C_dashboard/input_soal');
}
    
}