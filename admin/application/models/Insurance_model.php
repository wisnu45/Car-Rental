<?php 
class Insurance_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Insurences === */	
	function get_insurance()
	{
		$query = $this->db->get('car_insurance');
		$result = $query->result();
		return $result;		
	}
/* === Add Insurences === */
	function add_insurance($data)
	{
		$this->db->where('name', $data['name']);
		$query = $this->db->get('car_insurance');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$result = $this->db->insert('car_insurance',$data);
			return $result;	
		}
	}
/* === Get Insurences === */
	public function get_single_insurance($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('car_insurance');
		$result = $query->row();
		 return $result;
	}
/* === Edit Insurences === */
	 function insurance_edit($id,$data){
		$this->db->where('name', $data['name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('car_insurance');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$this->db->where('id', $id);
			$result = $this->db->update('car_insurance', $data);
			return $result;
		}
	 }
/* === Delete Insurences === */
	public function deleteinsurance($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_insurance');
		if($result){
			return "success"; 
		}
	    else{
			 return "error";
		}
	 }
}
?>