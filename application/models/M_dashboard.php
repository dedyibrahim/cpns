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
function json_soal(){
$this->datatables->select('id_soal,'
. 'soal.soal as soal,'
);

$this->datatables->from('soal');
$this->datatables->add_column('view','<a class="btn btn-sm btn-danger fa fa-close " href="'.base_url().'C_dashboard/hapus_soal/$1"></a>', 'base64_encode(id_soal)');
return $this->datatables->generate();

}
}


