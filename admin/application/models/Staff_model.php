<?php 
class Staff_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Staff === */	
	function get_staff()
	{
		$admin_id =get_role_id('Admin')->id;
		$manager_id = get_role_id('Manager')->id;
		$id = $this->session->userdata('admin');
		if($id== $admin_id){
		$this->db->select('admin.*,admin_role.rolename');
		$this->db->join('admin_role', 'admin_role.id = admin.user_type','left');
		$this->db->where('admin.user_type <>',$admin_id );
		}
		else if($id==$manager_id){
			$this->db->select('admin.*,admin_role.rolename');
			$this->db->join('admin_role', 'admin_role.id = admin.user_type','left');
			$this->db->where('admin.user_type <>',$manager_id);
			$this->db->where('admin.user_type <>',$admin_id );
		}
		$this->db->order_by("admin.id", "asc");
		$query = $this->db->get('admin');
		$result = $query->result();
		return $result;			
	}
/* === Add Staff === */	
	function add_staff($data)
	{
		$this->db->where('email', $data['email']);
		$query = $this->db->get('admin');
		$result = $query->row();
		if($result){
			return "email";
		}
		else{
			$this->db->where('username', $data['username']);
			$query1 = $this->db->get('admin');
			$result1 = $query1->row();
			if($result1){
				return "username";
			}
			else{
				$data['password']=md5($data['password']);
				$result = $this->db->insert('admin',$data);
				return "success";
			}
		}
		
	}
/* === Update Staff status=== */	
	function update_staff_status($data,$data1){
			$this->db->where('id',$data);
			$result = $this->db->update('admin',$data1);
			return $result;
    }
/* === Get Staff === */
	public function get_single_staff($id){
			   $query = $this->db->where('id',$id);
			   $query = $this->db->get('admin');
			   $result = $query->row();
			   return $result;
	}
	/* === Update Staff Username=== */
	function staff_updateusername($id,$data)
	{
			unset($data['acknowledgement2']);
			$this->db->where('email',$data['email']);
			$query = $this->db->get('admin');
			$result = $query->row();
			if($result){
				$this->db->where('email',$data['email']);
				$this->db->where('id',$id);
				$query = $this->db->get('admin');
				$result = $query->row();
				if($result){
					$this->db->where('id',$id);
					$result = $this->db->update('admin',$data);
					if($result){
						return true;
					}else{			
						return false;
					}
				}
			}else{
				$this->db->where('id',$id);
					$result = $this->db->update('admin',$data);
					if($result){
						return true;
					}else{								
						return false;
					}
			}	
	}
	/* === Update Staff Password=== */
	 function staff_updatepassword($id,$data){
			unset($data['acknowledgement3']);			
			$this->db->where('id',$id);
			$result = $this->db->update('admin',$data);
			return true;
	}
	/* === Update Staff Details=== */
      function staff_update($id,$data){
           if($data['staff_general']){
			unset($data['staff_general']);
			$this->db->where('email',$data['email']);
			$query = $this->db->get('admin');
			$result = $query->row();
			if($result){
				$this->db->where('email',$data['email']);
				$this->db->where('id',$id);
				$query = $this->db->get('admin');
				$result = $query->row();
				if($result){
					$data['password']=md5($data['password']);
					$this->db->where('id',$id);
					$result = $this->db->update('admin',$data);
					if($result){
						return true;
					}else{
						return false;
					}
				}
			}else{
				$data['password']=md5($data['password']);
				$this->db->where('id',$id);
				$result = $this->db->update('admin',$data);
				if($result){
					return true;
				}else{
					return false;
				}
			}
		} 
	}
/* === Delete Staff === */
	public function deletestaff($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('admin');
		if($result){
			return "success"; 
		}
		else {
			 return "error";
		 }
	}
}
?>