<?php 
class Commute_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}
	function pull_margin($table_name){
		$query = $this->db->get($table_name);
		return $result = $query->result();
	}
	function get_special_cars($commute_id,$location_id,$commute_from_date,$commute_to_date){ 	
		$final_from_date = strtotime($commute_from_date);
		$final_to_date = strtotime($commute_to_date);		
			$this->db->select('commute_package.id as id,commute.from_date,commute.from_time,commute.to_date,commute.to_time,commute_package.limit_start_km,commute_package.limit_start_price,commute_package.limit_end_km,car_make.name as car_fname,car_model.name as car_lname,commute_package.limit_end_price,car_listing.price_km as excess,car_listing.main_image,car_listing.seats,GROUP_CONCAT(DISTINCT general_sub_locations.short_address ORDER BY general_sub_locations.id) as short_address,car_showroom.short_address as showroom_address,car_showroom.latitude as showroom_latitude,car_showroom.longitude as showroom_longitude,car_listing.category,car_listing.id as car_listing_id');
			$this->db->from('commute_package');		
			$this->db->join('commute','commute.id = commute_package.commute_id','left');
			$this->db->join('car_listing','car_listing.id = commute_package.listing_id','left');
			$this->db->join('car_make','car_make.id = car_listing.make','left');
			$this->db->join('car_model','car_model.id = car_listing.model','left');
			$this->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');				
			$this->db->join('general_sub_locations','general_sub_locations.location_id = car_showroom.location_id','left');
			$this->db->where('car_listing.status',1);									
			$this->db->where('car_listing.from_date <', $final_from_date);
			$this->db->where('car_listing.from_date <', $final_to_date);
			$this->db->where('car_listing.to_date <', $final_from_date);					
			$this->db->where('car_listing.to_date <',$final_to_date);
			$this->db->where('commute_package.commute_id',$commute_id);
			$this->db->where('car_showroom.location_id',$location_id);
			$this->db->group_by('commute_package.id');	
			$query = $this->db->get();
			$result = $query->result(); 
			return $result; 
				
	}			
}	
?>	