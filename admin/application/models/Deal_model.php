<?php 
class Deal_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
   /* === View Dealer === */	
	function get_deal()
	{
		$this->db->select('deal.*,deal.id as id,car_listing.car_name');
		$this->db->from('deal');
		$this->db->join('car_listing', 'car_listing.id = deal.listing_id','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
   /* === View Dealer === */	
	function get_car()
	{
		$this->db->select('car_listing.id as id,car_name,car_make.name as make,car_model.name as model');
		$this->db->from('car_listing');
		$this->db->join('car_make', 'car_make.id = car_listing.make','left');
		$this->db->join('car_model', 'car_model.id = car_listing.model','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
	 /* === View Duration === */	
		function get_duration()
	{
		$query = $this->db->get('deal_durations');
		$result = $query->result();
		return $result;		
	}
   /* === Add Deal === */	
	function add($data)
	{  	
		$this->db->where('listing_id', $data['listing_id']);
		$query = $this->db->get('deal');
		if( $query->num_rows() > 0 ){ 
		return "carname";
		}
		else{
		$this->db->where('id',$data['listing_id']);		
		$query = $this->db->get('car_listing');
		$result = $query->row();		
		if($result){
			$from_date=$data['from_date'];		
			$to_date=$data['to_date'];
			$ftime=explode(" ",$from_date);
			$ttime=explode(" ",$to_date);
			$data['from_date']=	$ftime[0];	
			$data['to_date']=	$ttime[0];
			$data['from_time']=	$ftime[1].' '.$ftime[2];	
			$data['to_time']=	$ttime[1].' '.$ttime[2];
			$diff_from_date = new DateTime($from_date);
			$diff_to_date   = new DateTime($to_date);
			$diff = date_diff($diff_from_date,$diff_to_date);
			$data['time_diff'] = $diff->d .':'. $diff->h .':'. $diff->i ;								
			$deal_from_date = strtotime($from_date);
			$deal_to_date = strtotime($to_date);
			$car_from_date = strtotime($result->from_date);
			$car_to_date = strtotime($result->to_date);			
			if($car_from_date < $deal_from_date && $car_to_date < $deal_from_date && $car_from_date < $deal_to_date && $car_to_date < $deal_to_date){
				$resultdeal = $this->db->insert('deal',$data);
				return "sucess";
			}else{
				return "booked";
			}		
		}
		}
		
	}
    /* === Delete  Deal=== */
	public function deletedeal($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('deal');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
	/* === Get Deal === */
	public function get_single_deal($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('deal');
	    $result = $query->row();
	    return $result;
	}
	/* === Edit Deal === */
	function deal_edit($id,$data){ 
		$this->db->where('listing_id', $data['listing_id']);
		$this->db->where('id !=',$id);	
		$query = $this->db->get('deal');
		if( $query->num_rows() > 0 ){ 
		return "car-exist";
		}
		else{		
		$this->db->where('id',$data['listing_id']);		
		$query = $this->db->get('car_listing');
		$result = $query->row();		
		if($result){
			$from_date=$data['from_date'];		
			$to_date=$data['to_date'];
			$ftime=explode(" ",$from_date);
			$ttime=explode(" ",$to_date);
			$data['from_date']=	$ftime[0];	
			$data['to_date']=	$ttime[0];
			$data['from_time']=	$ftime[1].' '.$ftime[2];	
			$data['to_time']=	$ttime[1].' '.$ttime[2];
			$diff_from_date = new DateTime($from_date);
			$diff_to_date   = new DateTime($to_date);
			$diff = date_diff($diff_from_date,$diff_to_date);
			//print_r($data['time_diff'] = $diff->d .':'. $diff->h .':'. $diff->i);	die;								
			$deal_from_date = strtotime($from_date);
			$deal_to_date = strtotime($to_date);
			$car_from_date = strtotime($result->from_date);
			$car_to_date = strtotime($result->to_date);			
			if($car_from_date < $deal_from_date && $car_to_date < $deal_from_date && $car_from_date < $deal_to_date && $car_to_date < $deal_to_date){			
				$this->db->where('id', $id);
				$resultdeal = $this->db->update('deal', $data);
				//return $resultdeal;
				return "sucess";
			}else{
				//return false;
				return "booked";
			}		
		}
		}
	 }
	 /* === Update Deal Status=== */
	 function update_deal_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('deal',$data1);
		return $result;
    }
	/* ===  Deal Pop-up View === */
	function viewpopup($id)
	{
		$this->db->select('deal.*,admin_role.rolename,car_listing.car_name,deal_durations.name');
		$this->db->from('deal' );
		$this->db->join('admin_role', 'admin_role.id = deal.created_by','left');	
		$this->db->join('car_listing', 'car_listing.id = deal.listing_id','left');
		$this->db->join('deal_durations', 'deal_durations.id = deal.duration_id','left');
		$this->db->where('deal.id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;	
	}
}
?>