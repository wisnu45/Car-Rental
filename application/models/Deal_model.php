<?php 
class Deal_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}	
	function bag_significant($table_name){
		$query = $this->db->get($table_name);
		return $query->result();
	}	
	function pull_cars($location_id){
		$this->db->select('deal.id as id,deal.percentage,deal.offer_price_normal,deal.original_price_normal,deal.free_km_normal,
		deal.from_date,deal.from_time,deal.to_date,deal.to_time,deal.time_diff,car_listing.id as car_listing_id,car_listing.category,car_listing.price_km as excess,car_listing.seats,car_model.name as car_lname,car_make.name as car_fname,car_listing.main_image,car_showroom.short_address,deal.offer_price_special,deal.original_price_special,deal.free_km_special,car_showroom.latitude as showroom_latitude,car_showroom.longitude as showroom_longitude,deal.offer_price_super,deal.original_price_super,deal.free_km_super,car_listing.id as car_listing_id
							');
		$this->db->from('deal');
		$this->db->join('car_listing','car_listing.id = deal.listing_id','left');
		$this->db->join('car_make','car_make.id = car_listing.make ','left');
		$this->db->join('car_model','car_model.id = car_listing.model ','left');
		$this->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');
		$this->db->where('car_listing.status',1);	
		$this->db->where('car_showroom.location_id',$location_id);				
		$query = $this->db->get();
		return $result = $query->result();
	}
	function filter_cars($location_id,$data){
		$this->db->select('deal.id as id,deal.percentage,deal.offer_price_normal,deal.original_price_normal,deal.free_km_normal,
		deal.from_date,deal.from_time,deal.to_date,deal.to_time,deal.time_diff,car_listing.id as car_listing_id,car_listing.category,car_listing.price_km as excess,car_listing.seats,car_model.name as car_lname,car_make.name as car_fname,car_listing.main_image,car_showroom.short_address,deal.offer_price_special,deal.original_price_special,deal.free_km_special,car_showroom.latitude as showroom_latitude,car_showroom.longitude as showroom_longitude,deal.offer_price_super,deal.original_price_super,deal.free_km_super,car_listing.id as car_listing_id
							');
		$this->db->from('deal');
		$this->db->join('car_listing','car_listing.id = deal.listing_id','left');		
		$this->db->join('car_model','car_model.id = car_listing.model ','left');
		$this->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');
		$this->db->where('car_listing.status',1);
		$this->db->where('car_showroom.location_id',$location_id);		
		if(isset($data['category-car']) and !empty($data['category-car'])):
			$category = $data['category-car'];	
			$this->db->join('car_category','FIND_IN_SET(car_category.id, car_listing.category) > 0', 'left');
			$this->db->where("car_category.id" ,$category);
		endif;
		if(isset($data['duration-car']) and !empty($data['duration-car'])):
			$duration = $data['duration-car'];	
			$this->db->join('deal_durations','FIND_IN_SET(deal_durations.id, deal.duration_id) > 0', 'left');
			$this->db->where("deal_durations.id" ,$duration);
		endif;
		if(isset($data['zone-car']) and !empty($data['zone-car'])):
			$zone = $data['zone-car'];	
			$this->db->join('general_sub_locations','FIND_IN_SET(general_sub_locations.location_id, car_showroom.location_id) > 0', 'left');
			$this->db->where("general_sub_locations.id" ,$zone);
		endif;
		if(isset($data['makes-car']) and !empty($data['makes-car'])):
			$makes = $data['makes-car'];	
			$this->db->join('car_make','FIND_IN_SET(car_make.id, car_listing.make) > 0', 'left');
			$this->db->where("car_make.id" ,$makes);
		else:
			$this->db->join('car_make','car_make.id = car_listing.make ','left');
		endif;	
		$this->db->group_by('deal.id');
		$query = $this->db->get();
		return $result = $query->result();
	 }
	function Check_Booking_exist($car_id,$from_date,$to_date){ 
		$final_from_date = strtotime($from_date);
		$final_to_date = strtotime($to_date);
		$this->db->where('id',$car_id);
		$this->db->where('from_date <', $final_from_date);
		$this->db->where('from_date <', $final_to_date);
		$this->db->where('to_date <', $final_from_date);					
		$this->db->where('to_date <',$final_to_date);
		$query = $this->db->get('car_listing');
		$result = $query->row();
		return $result;	
	}		
} 
?>