<?php 
class Category_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Category === */	
	function get_category()
	{
		$query = $this->db->get('car_category');
		$result = $query->result();
		return $result;		
	}
/* === View Category === */	
	function add_category($data)
	{
		$this->db->where('name', $data['name']);
		$query = $this->db->get('car_category');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$result = $this->db->insert('car_category',$data);
		return $result;
		}
	}
/* === Get Category === */	
	public function get_single_category($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('car_category');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Category === */	
	 function category_edit($id,$data){
		$this->db->where('name', $data['name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('car_category');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$this->db->where('id', $id);
	    $result = $this->db->update('car_category', $data);
		return $result;
		}
	 }
 /* === Delete Category === */	
	public function deletecategory($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_category');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}	
}
?>