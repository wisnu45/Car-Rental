<?php 
class Showroom_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
 /* === View Showroom === */	
	function get_showroom()
	{
		$this->db->select('car_showroom.*,dealers.first_name');
	    $this->db->from('car_showroom' );
		$this->db->join('dealers', 'dealers.id = car_showroom.dealer_id','left');	
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
	/* === Add Showroom === */
	function add_showroom($data)
	{
		$this->db->where('name ', $data['name']);
		$query = $this->db->get('car_showroom');
		if( $query->num_rows() > 0 ){ 
			return false;
		}
		else{	
		$addr=explode(',',$data['address']);
		$data['short_address'] = $addr[0];
        $result = $this->db->insert('car_showroom',$data);
		return $result;
		}
		
	}
	/* === Update Showroom Status=== */
	 function update_showroom_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('car_showroom',$data1);
		return $result;
    }
	/* === Get Single Showroom === */
	public function get_single_showroom($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('car_showroom');
		$result = $query->row();
	    return $result;
	}
  /* === Edit Showroom === */
	 function showroom_edit($id,$data){
		$addr=explode(',',$data['address']);
		$data['short_address'] = $addr[0];
		$this->db->where('id', $id);
		$result = $this->db->update('car_showroom', $data);
		return $result;
	 }
  /* ===  Showroom Pop-up View === */
	function viewpopup($id)
	{
		$this->db->select('car_showroom.*,dealers.first_name,general_locations.name as locationname');
		$this->db->from('car_showroom' );
		$this->db->join('dealers', 'dealers.id = car_showroom.dealer_id','left');
		$this->db->join('general_locations', 'general_locations.id = car_showroom.location_id','left');	
		$this->db->join('general_sub_locations', 'general_sub_locations.id = car_showroom.sub_location_id','left');	
		$this->db->where('car_showroom.id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;	
	}
  /* === Delete Showroom === */
	public function deleteshowroom($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_showroom');
		if($result) {
			return "success"; 
		}
		else {
			 return "error";
		}
	}
	/* === Get Place=== */
		 function gets_place($id)
	 {
		 $this->db->where('location_id',$id);
		 $query = $this->db->get('general_sub_locations');
		 $result = $query->result();
		 return $result;
	 }
}
?>