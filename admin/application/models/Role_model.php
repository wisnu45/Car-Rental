<?php 
class Role_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Role === */
	function role()
	{
		$user1 = $this->session->userdata('admin');	
		$this->db->select('admin.user_type as rolename,A.role_id,A.page_id as pages');
		$this->db->from('admin');
		$this->db->join('admin_role_permission A', ' admin.id = A.role_id');
		$this->db->where('admin.user_type',$user1);
		$query1 = $this->db->get();
		foreach($query1->result_array() as $row1){
			$this->session->set_userdata('permission',$row1['pages']);
		}
		$user2 = $this->session->userdata('permission');
		//return $row;
		echo $user1;
	}
/* === View Role === */
	function get_role()
	{
		$query = $this->db->get('admin_role');
		$result = $query->result();
		return $result;		
	}
/* === Add Role === */
	function add_role($data)
	{
		$this->db->where('rolename', $data['rolename']);
		$query = $this->db->get('admin_role');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		 $result = $this->db->insert('admin_role', $data);
		 return $result;
		}
    }
/* === Get Role === */
	public function get_single_role($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('admin_role');
		$result = $query->row();
		return $result;
	}
/* === Edit Role === */
	 function role_edit($id,$data){
		$this->db->where('rolename', $data['rolename']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('admin_role');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
	     $this->db->where('id', $id);
		 $result = $this->db->update('admin_role', $data);
		 return $result;
		}
	 }
/* === Delete Role === */
	public function deleterole($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('admin_role');
		if($result){
			return "success"; 
		}
	    else{
			 return "error";
		}
	}
/* === Get Roles === */
	function roledetails(){
		$this->db->select('admin_role.rolename,admin.first_name,admin.id as id1,admin_role_permission.role_id,
							admin_role_permission.created_by as createdby,admin_role_permission.created_on
						  ');						   
		$this->db->from('admin ');
		$this->db->join('admin_role_permission', 'admin_role_permission.role_id = admin.id','left');	
		//$this->db->join('role', 'role.id = admin.id','left');
		$this->db->join('admin_role', 'admin_role.id = admin.user_type','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}
	/* === Get Roles === */
		function rolename(){
		$this->db->select('admin_role.id,admin_role.rolename,admin.first_name,
						  ');						   
		$this->db->from('admin ');
		$this->db->join('admin_role', 'admin_role.id = admin.user_type','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}
	function updaterole($data){
		
	$current_date= date('Y-m-d H:i:s');
	$role =$data['role_id'];
	$role_permission = $data['page_id'];
	$selects =$this->db->query("select * from admin_role_permission where role_id ='$role' "); 
		if($selects->num_rows() == 0) {
			$user_countries = array(
								'role_id' => $role,
								'page_id' => $role_permission,
								'created_on' => $current_date,
								'created_by' =>$data['created_by']
								);
			if( $this->db->insert('admin_role_permission',$user_countries)){
				echo 1;
			}else{
				echo 2;
			}
		}else{
			 foreach($selects->result_array() as $row){
				$r_id= $row['id'];		
				$this->db->where('id', $r_id);
				if($this->db->update('admin_role_permission',$data)){
					echo 3;
				}else{
					echo 4;
				}
			}
		}
	}
}
?>