<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_dashboard extends CI_Model{

public function index(){        
}
    
public function login($data){
$query = $this->db->get_where('user',$data);
return $query;
    
}

public function simpan_soal($data){
 $this->db->insert('soal',$data);   
}
}


