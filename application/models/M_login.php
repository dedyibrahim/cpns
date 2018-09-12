<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model{



public function index(){
}

function daftar($daftar){
$this->db->insert('akun',$daftar);    
}

public function cek_email($data){
$query = $this->db->get_where('akun',$data);

return $query;
}

public function login($data){
$query = $this->db->get_where('akun',$data);

return $query;
    
}

}
