<?php 
class Feature_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Feature === */
	function get_feature()
	{
		$query = $this->db->get('car_feature');
		$result = $query->result();
		return $result;		
	}
/* === Add Feature === */
	function add_feature($data)
	{
		$this->db->where('name', $data['name']);
		$query = $this->db->get('car_feature');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$result = $this->db->insert('car_feature',$data);
		return $result;
		}
	}
/* === Get Feature === */
	public function get_single_feature($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('car_feature');
	    $result = $query->row();
		return $result;
	}
/* === Edit Feature === */
	 function feature_edit($id,$data){
		$this->db->where('name', $data['name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('car_feature');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
	    $this->db->where('id', $id);
	    $result = $this->db->update('car_feature', $data);
	    return $result;
		}
	}
/* === Delete Feature === */
	public function deletefeature($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_feature');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
}
?>