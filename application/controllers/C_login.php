<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('M_login');
}

public function index(){
$this->load->view('umum/V_header');
$this->load->view('V_login');
}

public function daftar(){
if($this->input->post('nama_lengkap')){
$input = $this->input->post();
$cek = array('email'=>$input['email']);
$cek_email = $this->M_login->cek_email($cek);

if($cek_email->num_rows() > 0){
    echo "sudah_digunakan";
}else{

$daftar =array(
'nama_lengkap'      =>  $input['nama_lengkap'] ,
'nomor_kontak'      =>  $input['nomor_kontak'],
'alamat_lengkap'    =>  $input['alamat_lengkap'],
'email'             =>  $input['email'], 
'password'          =>  md5($input['password']),    
);
$this->M_login->daftar($daftar);

echo "berhasil";  

}

}else{
redirect(404);    
}    
}

public function login(){
if($this->input->post('email')){
$input = $this->input->post();    
$login = array('email'=>$input['email'],'password'=>md5($input['password'])); 
$query = $this->M_login->login($login);    
if($query->num_rows() > 0){
$cs = $query->row_array();
$data= array(
'email_soal'  =>$cs['email'],
'nama_lengkap'=>$cs['nama_lengkap'],
'id_account' =>$cs['id_account'],  
);
$this->session->set_userdata($data);  
echo "berhasil";
}else{
echo "akun_gaada";    
}
}else{
redirect(404);    
}    
}

}
