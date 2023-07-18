<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_model extends CI_Model {
	public function _consruct(){
		parent::__construct();
   }
   /* === View Settings === */
	 function settings_viewing(){
		  $query = $this->db->query(" SELECT * FROM `general_settings` order by id DESC ")->row();
		  return $query ;
	}
	 /* === Get  Settings Details === */
	public function get_single_settings($id){ 
	    $query = $this->db->where('id',$id);
	    $query = $this->db->get('general_settings');
	    $result = $query->row();
	    return $result;  
	}	
	 /* === Update  Settings === */
	public function update_settings($data){
	    $result = $this->db->update('general_settings', $data); 
		return $result;
	}
}
?>