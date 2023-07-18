<?php 
class User_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}
	function bag_rentee_details($id){
		$this->db->where('id',$id);
		$this->db->where('status',1);
		$query = $this->db->get('renter');
		$result = $query->row();
		return $result;
	}
	function live_bookings($user_id,$books){		
		$this->db->select('car_booking.id as id,car_booking.from_time,car_booking.to_time,car_booking.amount as price,car_booking.from_date,car_booking.to_date,car_booking.status,car_listing.seats,car_listing.main_image as car_image,car_make.name as car_make,car_model.name as car_model,general_locations.name as main_location,general_sub_locations.short_address as sub_location,car_booking.total_date');
		$this->db->from('car_booking');
		$this->db->join('car_listing','car_listing.id = car_booking.listing_id','left');
		$this->db->join('general_locations','general_locations.id = car_booking.location_id','left');
		$this->db->join('general_sub_locations','general_sub_locations.id = car_booking.sub_location_id','left');
		$this->db->join('car_make','car_make.id = car_listing.make','left');
		$this->db->join('car_model','car_model.id = car_listing.model','left');
		$this->db->where('car_booking.renter_id',$user_id);
		if($books == 'pending_book'):
			$this->db->where('car_booking.status',1);
		elseif($books == 'completed_book'):
			$this->db->where('car_booking.status',2);
		elseif($books == 'cancelled_book'):
			$this->db->where('car_booking.status',3);
		endif;			
		$this->db->order_by('car_booking.id','dsc');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	} 
	function update_rentee($data,$id){
		if(empty($data['password'])):
			unset($data['password']);
		else:		
			$data['password'] = md5($data['password']);
		endif;
		
		$this->db->where('id',$id);
		$result = $this->db->update('renter',$data);
		if($result):					
			return true;		
		endif;
	}	
}	
?>	