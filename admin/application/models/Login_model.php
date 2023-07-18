<?php 
class Login_model extends CI_Model {
	public function __construct(){
		parent::__construct();
 	}	
	/* ===LOGIN === */	
	  function login($username, $password) 
	{	
	    $this->db->from('admin');
		$where = "(admin.username='$username' or admin.email = '$username')";
        $this->db->where($where);		
		$this->db->where('admin.password',$password);
		$this->db->where('admin.status',1);
		$query=$this->db->get();
		$query_value=$query->row();
		return $query_value;
	}	
}
?>