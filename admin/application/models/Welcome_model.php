<?php 

class Welcome_model extends CI_Model {
	
	public function _construct(){
		parent::__construct();
 	}	
	function update_admin($data,$id){		
		$this->db->where('id',$id);
		$result = $this->db->update('admin',$data);
		if($result){
				return true;	  
			  }			 
		}
		function get_admin($id){
			$query = $this->db->get('admin',array('id'=>$id));
			$result = $query->row();
			return $result;
		}
		function update_admin_password($data,$id){			
			$data_update =array('password' => md5($data['n_password']));
			$query = $this->db->get_where('admin',array('id' => $id,'password' => md5($data['password'])));
			$result1 = $query->row();
				if($result1){
					$this->db->where('id',$id);	
					$result2 = $this->db->update('admin',$data_update);
					if($result2){
						return true;
					}	
				}
		}
}
?>