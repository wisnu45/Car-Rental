<?php 
class Location_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Location === */
	function get()
	{
		$this->db->select('general_sub_locations.*,general_sub_locations.id as id,general_locations.name');
		$this->db->from('general_sub_locations');
		$this->db->join('general_locations', 'general_locations.id = general_sub_locations.location_id','left');
		//$this->db->join('car_listing', 'car_listing.id = general_sub_locations.listing_id','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}
	function get_city()
	{
		$query = $this->db->get('general_locations');
		$result = $query->result();
		return $result;	
	}
/* === Add Location=== */	
	function add($data)
	{
	    $this->db->where('location_id', $data['location_id']);
		$this->db->where('address', $data['address']);
		$query = $this->db->get('general_sub_locations');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$addr=explode(',',$data['address']);
		$data['short_address'] = $addr[0];
		$lat=explode('.',$data['latitude']);
		$data['short_lat'] = $lat[0];
		$lat=explode('.',$data['longitude']);
		$data['short_lon'] = $lat[0];
		$result = $this->db->insert('general_sub_locations',$data);
		return $result;
		}
	}
/* === Get Location === */
	public function get_single_location($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('general_sub_locations');
		$result = $query->row();
		return $result;
	}
/* === Edit Location === */
	 function location_edit($id,$data){
	    $this->db->where('location_id', $data['location_id']);
		$this->db->where('address', $data['address']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('general_sub_locations');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$addr=explode(',',$data['address']);
		$data['short_address'] = $addr[0];
		$lat=explode('.',$data['latitude']);
		$data['short_lat'] = $lat[0];
		$lat=explode('.',$data['longitude']);
		$data['short_lon'] = $lat[0];
	    $this->db->where('id', $id);
	    $result = $this->db->update('general_sub_locations', $data);
	    return $result;
		}
	 }
/* === Delete location === */
	public function deletelocation($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('general_sub_locations');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
}
?>