<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_soal extends CI_Model{

public function index(){

}

function cek_jawaban($id_soal){
$query = $this->db->get_where('soal',array('id_soal'=>$id_soal));
return $query;

}
function data_soal(){
$this->db->limit(1);
$query = $this->db->get('soal');
return $query;
}

function data_soal_lanjut($id_soal){

$this->db->limit(1);
$this->db->or_where_not_in('soal.id_soal',$id_soal);
$query = $this->db->get('soal');
return $query;
    
}


}


