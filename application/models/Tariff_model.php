<?php 
class Tariff_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}
	function pull_margin($table_name){
		$query = $this->db->get($table_name);
		return $result = $query->result();
	}	
	function pull_car_categories($tariff_id,$location_id){
		$query = $this->db->get('car_category');
		$return = array();
		foreach ($query->result() as $category):
			$return[$category->id] = $category;
			$return[$category->id]->subs = $this->get_special_cars($category->id,$tariff_id,$location_id);
		endforeach;
		return $return;
	}
	function get_special_cars($category_id,$id,$location_id){
		$this->db->select('tariff_package.id as id,tariff_package.*,car_make.name as car_fname,car_model.name as car_lname,car_listing.seats,car_listing.main_image,car_listing.price_km');
		$this->db->from('tariff_package');
		$this->db->join('car_listing','car_listing.id = tariff_package.listing_id','left');
		$this->db->join('car_make','car_make.id = car_listing.make','left');
		$this->db->join('car_model','car_model.id = car_listing.model','left');
		$this->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');
		$this->db->where('car_showroom.location_id',$location_id);
		$this->db->where('tariff_package.tariff_id',$id);
		$this->db->where('car_listing.category',$category_id);
		$this->db->where('car_listing.status',1);
		$query = $this->db->get();		
		return $result = $query->result();
	}
	function pull_tariff_car_categories($location_id){
		$this->db->select('car_listing.id as id,car_listing.listing_title,car_make.name as car_fname,car_model.name as car_lname');
		$this->db->from('car_listing');		
		$this->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');
		$this->db->join('car_make','car_make.id = car_listing.make','left');
		$this->db->join('car_model','car_model.id = car_listing.model','left');
		$this->db->where('car_showroom.location_id',$location_id);			
		$this->db->where('car_listing.status',1);
		$query = $this->db->get();		
		return $result = $query->result();
	}
	function pull_unique_tariff($car_id,$totalhours){
		$this->db->select('tariff.id as id,tariff.name,tariff.free_km,(tariff_package.price_normal * '.$totalhours.') as price_normal');
		$this->db->from('tariff_package');		
		$this->db->join('tariff','tariff.id = tariff_package.tariff_id','left');		
		$this->db->where('tariff_package.listing_id',$car_id);		
		$query = $this->db->get();		
		return $result = $query->result();
	}
	function bag_cars_chronology($car_id){
		$this->db->where('id',$car_id);
		$query = $this->db->get('car_listing');
		return $result = $query->row();
	}	
} 
?>