<?php 
class Renter_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Renter === */
	function get_renter()
	{
		$query = $this->db->get('renter');
		$result = $query->result();
		return $result;		
	}
/* === Add Renter === */
	function add_renter($data)
	{
		$this->db->where('email', $data['email']);
		$query = $this->db->get('renter');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$addr=explode(',',$data['address']);
			$data['short_address'] = $addr[0];
			$data['password'] = md5($data['password']);
			$result = $this->db->insert('renter',$data);
			return $result;
		}
	}
/* === Update Renter === */
	 function update_renter_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('renter',$data1);
		return $result;
    }
/* === Get Single Renter === */
	public function get_single_renter($id){
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('renter');
		 $result = $query->row();
	     return $result;
	}
/* === Edit Renter === */
	 function renterdetails_edit($id,$data){
		 if($data['email']){
			$this->db->where('email', $data['email']);
			$query = $this->db->get('renter');
			if( $query->num_rows() > 0 ){ 
				return false;
			} 
			else{
				$data['password'] = md5($password);
				$this->db->where('id', $id);
				$result = $this->db->update('renter',$data);
				return $result;
			}
		 }
		 else{
				$addr=explode(',',$data['address']);
				$data['short_address'] = $addr[0];
				$this->db->where('id', $id);
				$result = $this->db->update('renter',$data);
				return $result;
		 }
	 }
/* === Renter Pop-up View=== */
	function viewpopup($id)
	{
		$this->db->select('renter.*,admin_role.rolename');
		$this->db->from('renter' );
		$this->db->join('admin_role', 'admin_role.id = renter.created_by','left');	
		$this->db->where('renter.id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
/* === Delete Renter === */
	public function deleterenter($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('renter');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
/* === Add Renter License=== */
	function add_license($data)
	{	
		$result = $this->db->insert('renter_license',$data);
		return $result;
	}	
/* === Get AllRenter License=== */
	function get_license()
	{
		$this->db->select('renter_license.license,renter_license.id as id,renter.rentee');	
		$this->db->from('renter_license');	
		$this->db->join('renter', 'renter.id = renter_license.renter_id','left');		
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}
/* === Delete Renter License=== */
	public function deletelicense($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('renter_license');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
/* === Edit Renter License=== */ 
	 function license_edit($id,$data){	
		$this->db->where('id', $id);
	    $result = $this->db->update('renter_license', $data);
		return $result;
	 }
/* === Get Single Renter License=== */ 
	  function get_renterlicense($id){
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('renter_license');
		 $result = $query->row();
	     return $result;
	 }
/* === Add Renter Co-jockeys=== */ 
	 function add_cojockeys($data)
	{
		$renterid= $data['renter_id'];
		$email   = $data['email'];			 
		$this->db->where('id',$renterid);	
		$this->db->where('email',$email);
		$query = $this->db->get('renter'); 
		$result=$query->row();
		if($result){
			return false;
		}
		 else
		{			 
			$this->db->where('renter_id',$renterid);	
		    $this->db->where('email',$email);			 
		    $query = $this->db->get('renter_co_jockeys'); 		 
			$result = $query->result();
			if($result){
				return false;
			}
			else{
				$result = $this->db->insert('renter_co_jockeys',$data);
				return $result;
			}
		}
	}	
/* === Get Renter Co-jockeys=== */ 
	 function get_jockeys(){
		$this->db->select('renter_co_jockeys.*,renter.rentee');	
		$this->db->from('renter_co_jockeys');	
		$this->db->join('renter', 'renter.id = renter_co_jockeys.renter_id','left');		
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	 }
 /* === Edit Renter Co-jockeys and check existence of Email=== */ 
	 function jockeys_edit($id,$data){
	    $sess=$id;
		$renterid= $data['renter_id'];
		$email   = $data['email'];			 
		$this->db->where('id',$renterid);	
		$this->db->where('email',$email);
		$query = $this->db->get('renter'); 
		$result=$query->row();
		if($result){
			return false;
		}
		 else{			 
			$this->db->where('id',$renterid);	
		    $this->db->where('email',$email);			 
		    $query = $this->db->get('renter_co_jockeys'); 		 
			$result = $query->row();
			if($result){
				return false;
			}
			else{
				$this->db->where('id', $id);
				$result = $this->db->update('renter_co_jockeys', $data);
				return $result;
			}
		 }
	 }
/* === Edit Renter Co-jockeys=== */ 
	 function get_single_jockeys($id){
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('renter_co_jockeys');
		 $result = $query->row();
	     return $result;
		}
/* === Delete Renter Co-jockeys=== */ 
	public function deletejockeys($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('renter_co_jockeys');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
}
?>