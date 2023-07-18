<?php 
class Commute_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Package === */
	function get_commute()
	{
		$query = $this->db->get('commute');
		$result = $query->result();
		return $result;			
	}
/* === Add Package === */
	function add_commute($data)
	{
		$query1 = $this->db->get('commute');
		if( $query1->num_rows() == 3 ){ 
		return "overload";
		}
		else{
		$from_date=$data['from_date'];		
		$to_date=$data['to_date'];
		$fromtime=explode(" ",$from_date);
		$totime=explode(" ",$to_date);
		$data['from_date']=$fromtime[0];
		$data['to_date']=$totime[0];
		$data['from_time']=$fromtime[1].' '.$fromtime[2];
		$data['to_time']=$totime[1].' '.$totime[2];
		$result = $this->db->insert('commute',$data);
		return "sucess";
		}
	}
/* === Update Package === */
	 function update_commute_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('commute_package',$data1);
		return $result;
    }
/* === Get Commute === */
	public function get_single_commute($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('commute');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Package === */
	 function commute_edit($id,$data){ 

		$this->db->where('name', $data['name']);
		$this->db->where('id <>', $id);
		$query = $this->db->get('commute');
		$result = $query->row();
		if($result){ 
		  return "exist";
		   }
		   else{
			$from_date=$data['from_date'];		
			$to_date=$data['to_date'];
			$fromtime=explode(" ",$from_date);
			$totime=explode(" ",$to_date);
			$data['from_date']=$fromtime[0];
			$data['to_date']=$totime[0];
			$data['from_time']=$fromtime[1].' '.$fromtime[2];
			$data['to_time']=$totime[1].' '.$totime[2]; 
			$this->db->where('id', $id);
			$result = $this->db->update('commute', $data);
			return 'success';
		 }
	 
	 }	
/* === Delete  Package === */
	public function deletecommute($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('commute');
		if($result){
		 return "success"; 
		}
		else{
			 return "error";
		}
   }
/* === Add  Tariff Package === */
	function add_package($data)
	{
		$this->db->where('commute_id',$data['commute_id']);	
		$this->db->where('listing_id',$data['listing_id']);		
		$query = $this->db->get('commute_package');
		$result = $query->row();		
		if(!$result){
		$this->db->where('id',$data['listing_id']);		
		$query = $this->db->get('car_listing');
		$result = $query->row();		
			if($result){
				$from_date=$result->from_date;		
				$to_date=$result->to_date;	
				$car_from_date = strtotime($from_date);
				$car_to_date = strtotime($to_date);
				$this->db->where('id',$data['commute_id']);		
				$query1 = $this->db->get('commute');
				$result1 = $query1->row();	
				if($result1){
					$commute_from_date=strtotime($result1->from_date.' '.$result1->from_time);		
					$commute_to_date=strtotime($result1->to_date.' '.$result1->to_time);	
					if($car_from_date < $commute_from_date && $car_to_date < $commute_from_date && $car_from_date < $commute_to_date && $car_to_date < $commute_to_date){
						$result = $this->db->insert('commute_package',$data);
						return $result;
					}else{
						return false;
					}
				}	
			}
		}else{
			return false;
		}	
	}  
/* === View Tariff Package === */
	function get_cpackage()
	{
		$this->db->select('commute_package.*,car_listing.car_name,commute.name');		
		$this->db->from('commute_package');
		$this->db->join('car_listing', 'car_listing.id = commute_package.listing_id','left');					
	    $this->db->join('commute', 'commute.id = commute_package.commute_id','left');	
		$this->db->group_by("commute_package.id");
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	} 
/* === Get Commute Package === */
	public function get_single_package($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('commute_package');
	    $result = $query->row();
	    return $result;
	} 
/* === Edit Commute Package === */
	 function package_edit($id,$data){
		$this->db->where('commute_id',$data['commute_id']);	
		$this->db->where('listing_id',$data['listing_id']);	
		$this->db->where('id<>', $id);		
		$query = $this->db->get('commute_package');
		$result = $query->row();
		if(!$result){
			if(isset($data['listing_id']) && isset($data['commute_id'])){
				$this->db->where('id',$data['listing_id']);		
				$query = $this->db->get('car_listing');
				$result = $query->row();
				$this->db->where('id',$data['commute_id']);		
				$query = $this->db->get('commute');
				$result1 = $query->row();									
				$from_date =$result->from_date;		
				$to_date =$result->to_date; 	
				$car_from_date = strtotime($from_date);
				$car_to_date = strtotime($to_date);				
				$commute_from_date=strtotime($result1->from_date.' '.$result1->from_time);		
				$commute_to_date=strtotime($result1->to_date.' '.$result1->to_time);
				if($car_from_date < $commute_from_date && $car_to_date < $commute_from_date && $car_from_date < $commute_to_date && $car_to_date < $commute_to_date){
					$this->db->where('id', $id);
					$result = $this->db->update('commute_package', $data);
					return $result;
				}else{
					return false;
				}
			}
		}else{
				return false;
		}
	}				
/* === Delete Commute Package === */
	public function deletepackage($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('commute_package');
		if($result){
		 return "success"; 
		}
		else{
			 return "error";
		}
   }	 
}
?>