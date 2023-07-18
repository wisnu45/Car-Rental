<?php 
class Color_model extends CI_Model {	
	public function _construct(){
		parent::__construct();
 	}
/* === View Color === */
	function get_color()
	{
		$query = $this->db->get('car_color');
		$result = $query->result();
		return $result;		
	}
/* === Add Color === */
	function add_color($data)
	{
		$this->db->where('color_name', $data['color_name']);
		$query = $this->db->get('car_color');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$result = $this->db->insert('car_color',$data);
		return $result;
		}		
	}
/* === Get Color === */
	public function get_single_color($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('car_color');
		$result = $query->row();
		return $result;
	}
/* === Edit Color === */
	 function color_edit($id,$data){
		$this->db->where('color_name', $data['color_name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('car_color');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
	     $this->db->where('id', $id);
		 $result = $this->db->update('car_color', $data);
		 return $result;
		}
	 }
/* === Delete Color === */
	public function deletecolor($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_color');
		if($result){
			return "success"; 
		}
	    else{
			 return "error";
		}
	}
}
?>