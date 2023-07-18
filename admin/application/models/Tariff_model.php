<?php 
class Tariff_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Package === */
	function get_tariff()
	{
		$query = $this->db->get('tariff');
		$result = $query->result();
		return $result;			
	}
/* === Add Package === */
	function add_tariff($data)
	{
		$query1 = $this->db->get('tariff');
		if( $query1->num_rows() == 3 ){ 
		return false;
		}
		else{
		$result = $this->db->insert('tariff',$data);
		return $result;
		}
	}
/* === Update Package === */
	 function update_tariffpack_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('tariff_package',$data1);
		return $result;
    }
/* === Get Package === */
	public function get_single_tariff($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('tariff');
	    $result = $query->row();
	    return $result;
	}
	/* === Get Package === */
	public function get_single_package($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('tariff_package');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Package === */
	 function tariff_edit($id,$data){
		 $this->db->where('id', $id);
		 $result = $this->db->update('tariff', $data);
		 return $result;
	 }	
	 /* === Edit Package === */
	 function package_edit($id,$data){
			$this->db->where('tariff_id',$data['tariff_id']);	
			$this->db->where('listing_id<>',$data['listing_id']);	
			$this->db->where('id<>', $id);		
			$query = $this->db->get('tariff_package');
			$result = $query->row();
			if(!$result){
				
					$this->db->where('id', $id);
					$result = $this->db->update('tariff_package', $data);
					return $result;
				
			}else 
				return false;
	 }	

/* === Delete  Package === */
	public function deletetariff($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('tariff');
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
		$this->db->where('tariff_id',$data['tariff_id']);	
		$this->db->where('listing_id',$data['listing_id']);			
		$query = $this->db->get('tariff_package');
		$result = $query->row();		
		if(!$result){
					$result = $this->db->insert('tariff_package',$data);
					return $result;
		}
		else{
			return false;
		}

	}  
/* === View Tariff Package === */
	function get_tpackage()
	{
		$this->db->select('tariff_package.*,car_listing.car_name,tariff.name');		
		$this->db->from('tariff_package');
		$this->db->join('car_listing', 'car_listing.id = tariff_package.listing_id','left');					
	    $this->db->join('tariff', 'tariff.id = tariff_package.tariff_id','left');	
		$this->db->group_by("tariff_package.id");
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}  	
		public function deletepackage($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('tariff_package');
		if($result){
		 return "success"; 
		}
		else{
			 return "error";
		}
   }
}
?>