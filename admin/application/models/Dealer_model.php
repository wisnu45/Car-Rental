<?php 
class Dealer_model extends CI_Model {
	public function __construct(){
		parent::__construct();
 	}
/* === View Dealer === */	
	function get_dealer()
	{
		$query = $this->db->get('dealers');
		$result = $query->result();
		return $result;		
	}
/* === Add Dealer === */	
	function add_dealer($data,$password)
	{  	
		$this->db->where('email',$data['email']);
		$query = $this->db->get('dealers'); 
		$result=$query->row();
		if($result){
			return false;
		}
		 else{			 
		    $this->db->where('email',$data['email']);			 
		    $query = $this->db->get('renter'); 		 
			$result = $query->result();
			if($result){
				return false;
			}
			else{
				$addr=explode(',',$data['address']);
				$data['short_address'] = $addr[0];
				$data['password'] = md5($password);
				$result = $this->db->insert('dealers',$data);
				return $result;
			}
		}
	}
/* === Update Dealer === */
	 function update_dealer_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('dealers',$data1);
		return $result;
    }
/* === Get Dealer === */
	public function get_single_dealer($id){
	    $query = $this->db->where('id',$id);
	    $query = $this->db->get('dealers');
		$result = $query->row();
		return $result;
	}
/* === Edit Dealer === */
	 function dealer_edit($id,$data){
		if($data['email'])
		{
			$this->db->where('email',$data['email']);
			$query = $this->db->get('dealers'); 
			$result=$query->row();
			if($result){
				return false;
			}
			 else{			 
					$this->db->where('email',$data['email']);			 
					$query = $this->db->get('renter'); 		 
					$result = $query->result();
					if($result){
						return false;
					}
					else{
						$data['password'] = md5($password);
						$this->db->where('id', $id);
						$result = $this->db->update('dealers',$data);
						return $result;
					}
				}
		}
		 else{
				$addr=explode(',',$data['address']);
				$data['short_address'] = $addr[0];
				$this->db->where('id', $id);
				$result = $this->db->update('dealers', $data);
				return $result;
		 }
	 }
/* ===  Dealer Pop-up View=== */
	function viewpopup($id)
	{ 
	    $this->db->select('dealers.*,dealers.id as id,admin_role.rolename');
		$this->db->join('admin_role','dealers.created_by = admin_role.id','left');
		$this->db->where('dealers.id',$id);
		$query = $this->db->get('dealers');
		$result = $query->row();
		return $result;	
	}
/* === Delete  Dealer=== */
	public function deletedealer($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('dealers');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	}
}
?>