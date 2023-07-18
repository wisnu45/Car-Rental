<?php 
class Humdrum_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}
	function bag_locations() {	
		$query = $this->db->get('general_locations');
		return $result = $query->result();
	}
	function get_popularlocations($id){
		$this->db->limit("4");		
		$this->db->select('*');
		$this->db->from('general_sub_locations');
		$this->db->where('location_id',$id);
		$query = $this->db->get();
		return $result = $query->result();		
	}
	function get_popularlocations_cars($location_id){		
		$this->db->select('*');
		$this->db->from('general_sub_locations');		
		$this->db->where('location_id',$location_id);
		$query = $this->db->get();
		return $result = $query->result();
	}
	function bag_showroom_cars($city,$from_date,$to_date,$totalhours,$tariff_id){
		$car_from_date = strtotime($from_date);
		$car_to_date = strtotime($to_date);
		$this->db->select('car_listing.id as id,car_make.name as car_fname,car_model.name as car_lname,car_listing.showroom_id,car_listing.main_image,car_listing.seats,car_listing.transmission,car_listing.top_speed,car_fuel.name as fuel_type,car_listing.price_km,(tariff_package.price_normal * '.$totalhours.') as final_price,car_showroom.name,car_showroom.short_address as showroom_address,tariff.free_km,car_showroom.latitude,car_showroom.longitude,car_listing.category,tariff.id as tariff_id');
		$this->db->from('tariff_package');
		$this->db->join('car_listing','car_listing.id = tariff_package.listing_id ','left');
		$this->db->join('car_make','car_make.id = car_listing.make ','left');
		$this->db->join('car_model','car_model.id = car_listing.model ','left');
		$this->db->join('car_fuel','car_fuel.id = car_listing.fuel_type','left');
		$this->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');
		$this->db->join('tariff','tariff.id = tariff_package.tariff_id','left');
		$this->db->where('tariff_package.tariff_id',$tariff_id);
		$this->db->where('car_showroom.location_id',$city);
		$this->db->where('car_listing.status',1);	
		$this->db->where('car_listing.from_date <', $car_from_date);
		$this->db->where('car_listing.from_date <', $car_to_date);
		$this->db->where('car_listing.to_date <', $car_from_date);					
		$this->db->where('car_listing.to_date <',$car_to_date);			
		$query = $this->db->get();	
		return  $result= $query->result();						
	}
	function pull_margin($table_name){
		$query = $this->db->get($table_name);
		return $result = $query->result();
	}
	function bag_tariff(){
		$query = $this->db->get('tariff');
		$result = $query->result();
		return $result;
	}
	function bag_category(){
		$this->db->limit(2);
		$this->db->order_by('id','asc');
		$query = $this->db->get('car_category');
		$result = $query->result();
		return $result;
	}
	function bag_coupon_cars($coupon,$current_date,$category_id){ 
		$this->db->select('offers.percentage');
		$this->db->from('offers');				
		$this->db->where('offers.coupon_code',$coupon);
		$this->db->where('offers.expiry_date >=', $current_date);				
		$this->db->where('offers.category_id',$category_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function Reservation($data){
		$car_id = $data['listing_id'];
		$car_data['from_date'] = strtotime($data['from_date']);
		$car_data['to_date'] = strtotime($data['to_date']);
		$result = $this->db->insert('car_booking',$data);
		if($result):	
			$this->db->where('id',$car_id);
			$result = $this->db->update('car_listing',$car_data);
			if($result):
				return 'success';
			endif;
		endif;
	}
}
?>