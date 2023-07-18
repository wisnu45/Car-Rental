<?php 
class Place_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Place === */	
	function get_place()
	{
		$query = $this->db->get('general_locations');
		$result = $query->result();
		return $result;		
	}
/* === Add Place === */	
	function add_place($data)
	{
		$result = $this->db->insert('general_locations',$data);
	    return $result;	
	}
/* === Update Place === */
	 function update_place_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('general_locations',$data1);
		return $result;
    }
/* === Get Place === */
	public function get_single_place($id){
	    $query = $this->db->where('id',$id);
	    $query = $this->db->get('general_locations');
		$result = $query->row();
	    return $result;
	}
/* === Edit Place === */
	 function placedetails_edit($id,$data){
	    $this->db->where('id', $id);
	    $result = $this->db->update('general_locations', $data);
	    return $result;
	
	 }
/* === Delete Place === */
	public function deleteplace($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('general_locations');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}	
}
?>