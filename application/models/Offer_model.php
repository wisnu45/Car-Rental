<?php 
class Offer_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}	
	function pull_all_offers($location_id){		
		$this->db->select('offers.id as id,offers.coupon_for,offers.percentage,offers.image');
		$this->db->from('offers');		
		$this->db->where('offers.location_id',$location_id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function bag_offer($id){
		$this->db->where('id',$id);
		$query = $this->db->get('offers');
		$result = $query->row();
		return $result;
	}	
}
?>