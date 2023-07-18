<?php 
class Make_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Make === */
	function get_make()
	{
		$query = $this->db->get('car_make');
		$result = $query->result();
		return $result;		
	}
/* === Add Make === */
	function add_make($data)
	{
		$this->db->where('name', $data['name']);
		$query = $this->db->get('car_make');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$result = $this->db->insert('car_make',$data);
			return $result;
		}
	}
/* === Get Make === */
	public function get_single_make($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('car_make');
		$result = $query->row();
		 return $result;
	}
/* === Edit Make === */
	 function make_edit($id,$data){
		$this->db->where('name', $data['name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('car_make');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$this->db->where('id', $id);
			$result = $this->db->update('car_make', $data);
			return $result;
		}
	 }
 /* === Delete Make === */
	public function deletemake($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_make');
		if($result){
			return "success"; 
		}
	    else{
			 return "error";
		}
	 }
}
?>