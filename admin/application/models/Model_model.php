<?php 
class Model_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Model === */
	function get_model()
	{
		$this->db->select('car_model.id as id,car_model.name,car_make.name as make');
		$this->db->from('car_model');
		$this->db->join('car_make','car_make.id = car_model.make_id','left');		
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
/* === Add Model === */
	function add_model($data)
	{
		$this->db->where('name', $data['name']);
		$query = $this->db->get('car_model');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$result = $this->db->insert('car_model',$data);
			return $result;
		}
	}
/* === Get Model === */
	public function get_single_model($id){
	    $query = $this->db->where('id',$id);
	    $query = $this->db->get('car_model');
		$result = $query->row();
	    return $result;
	}
/* === Edit Model === */
	 function model_edit($id,$data){
	    $this->db->where('id', $id);
		$result = $this->db->update('car_model', $data);
	    return $result;
	
	 }
/* === Delete Model === */
	public function deletemodel($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_model');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	 }
/* === Car make === */
		function get_car_make(){
		$query = $this->db->get('car_make');
		$result = $query->result();
	    return $result;
		}
}
?>