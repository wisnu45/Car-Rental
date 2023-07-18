<?php 
class Fuel_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Fuel === */
	function get_fuel()
	{
		$query = $this->db->get('car_fuel');
		$result = $query->result();
		return $result;		
	}
/* === Add Fuel === */
	function add_fuel($data)
	{
		$this->db->where('name', $data['name']);
		$query = $this->db->get('car_fuel');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$result = $this->db->insert('car_fuel',$data);
		return $result;
		}
	}
/* === Get Fuel === */
	public function get_single_fuel($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('car_fuel');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Fuel === */
	 function fuel_edit($id,$data){
		$this->db->where('name', $data['name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('car_fuel');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$this->db->where('id', $id);
	    $result = $this->db->update('car_fuel', $data);
	    return $result;
		}
	 }
/* === Delete Fuel === */
	public function deletefuel($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_fuel');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	 }
}
?>