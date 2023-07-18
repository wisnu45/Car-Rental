<?php 
class Carpayment_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
	/* === View Payment === */
	function get_cpayment()
	{
		$this->db->select('car_booking.*,renter.rentee,car_booking.id as id,car_listing.id as car_id,car_listing.car_name,
						   general_locations.name as location,tariff.name as tariff');
		$this->db->from('car_booking');
		$this->db->join('car_listing', 'car_listing.id = car_booking.listing_id','left');
		$this->db->join('renter', 'renter.id = car_booking.renter_id','left');
		$this->db->join('general_locations', 'general_locations.id = car_booking.location_id','left');
		$this->db->join('tariff', 'tariff.id = car_booking.tariff_id','left');
		$this->db->group_by("car_booking.id"); 
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}
	/* === View Payment === */
	function get()
	{
		$query = $this->db->get('car_booking');
		$result = $query->result();
		return $result;	
	}
	/* ===Add Payment === */
	function add_cpayment($data)
	{
		$date1=$data['from_date'];
		$date2=$data['to_date'];
		$fdate=explode(" ",$date1);
		$tdate=explode(" ",$date2);
		$data['from_date'] =$date1;
		$data['to_date'] =$date2;
		$data['from_time']=	$fdate[1].' '.$fdate[2];	
		$data['to_time']=	$tdate[1].' '.$tdate[2];
		$data['from_full_date']=$date1;
		$data['to_full_date']=$date2;
		if($this->db->insert('car_booking',$data))
		{
			$this->db->where('id', $data['listing_id']);
		    $this->db->set('from_date',strtotime($date1));
			$this->db->set('to_date',strtotime($date2));
		    $result =  $this->db->update('car_listing');
		    return $result;
		}
		else
			return false;
	}
	/* === Update Payment === */
	 function update_cpayment_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('car_booking',$data1);
		return true;
    }
	 function update_cpayment_status_new($id,$data1,$car_id,$data){
		$this->db->where('id',$id);
		$result = $this->db->update('car_booking',$data1);
		if($result){
			$this->db->where('id',$car_id);
			$result1 = $this->db->update('car_listing',$data);
			if($result1){
				return true;
			}
		}		
    }
	/* === Get Payment === */
	public function get_single_cpayment($id)
	{
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('car_booking');
		 $result = $query->row();
	     return $result;
	}
	/* === Edit Payment === */
	 function cpayment_edit($id,$data){
		$date1=$data['from_date'];
		$date2=$data['to_date'];
		$fdate=explode(" ",$date1);
		$tdate=explode(" ",$date2);
		$data['from_date'] =$date1;
		$data['to_date'] =$date2;
		$data['from_time']=	$fdate[1].' '.$fdate[2];	
		$data['to_time']=	$tdate[1].' '.$tdate[2];
		$data['from_full_date']=$date1;
		$data['to_full_date']=$date2;
	    $this->db->where('id', $id);
		if($this->db->update('car_booking', $data))
		  { 
			$this->db->where('id', $data['listing_id']);
		    $this->db->set('from_date',strtotime($date1));
			$this->db->set('to_date',strtotime($date2));
		    $result =  $this->db->update('car_listing');
		    return $result;
		}
		else
			return false;  
	 }
	/* === Delete Payment === */
	public function deletecpayment($id,$car_id,$data){		 
		 $this->db->where('id',$id);
		 $result = $this->db->delete('car_booking');
		 if($result) {			
			$this->db->where('id',$car_id);
			$result1 = $this->db->update('car_listing',$data);
			if($result1) {
				return "success"; 
			}
			else{
			 return "error";
			}
		 }
		 else{
			 return "error";
		 }
	}
	/* === Get Car By Location=== */
	 function getcar($id)
	 {
		$this->db->select('car_listing.id as id,car_listing.car_name');
		$this->db->from('car_listing');
		$this->db->join('car_showroom', 'car_showroom.id = car_listing.showroom_id','left');
		$this->db->where('car_showroom.location_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	 }	
	 function getcars($id1)
	 {
		$this->db->select('car_listing.id as id,car_listing.car_name');
		$this->db->from('car_listing');
		$this->db->join('car_showroom', 'car_showroom.id = car_listing.showroom_id','left');
		$this->db->where('car_showroom.location_id', $id1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	 }	
	 function gettariff($id1)
	 {
		$this->db->select('tariff_package.id as id,tariff.name,tariff.free_km,tariff_package.price_normal ');
		$this->db->from('tariff_package');
		$this->db->join('tariff', 'tariff.id = tariff_package.tariff_id','left');
		$this->db->where('tariff_package.listing_id', $id1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	 }	
	 	 function singletariff($id1)
	 {
		$this->db->select('tariff_package.id as id,tariff.name,tariff.free_km,tariff_package.price_normal ');
		$this->db->from('tariff_package');
		$this->db->join('tariff', 'tariff.id = tariff_package.tariff_id','left');
		$this->db->where('tariff_package.tariff_id', $id1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	 }	
	 function getprice($tariffid)
	 {
		 $this->db->select('tariff_package.price_normal');
		 $this->db->from('tariff_package');
		 $this->db->where('tariff_package.tariff_id',$tariffid);
		 $query = $this->db->get();
		 $result = $query->row();
	     return $result;
	 }
	
	 function get_single_sub_location($location_id){
		$this->db->where('location_id',$location_id);
		 $query = $this->db->get('general_sub_locations');
		 $result = $query->result();
	     return $result; 
	 }
}
?>