<?php 
class Package_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Package === */
	function get_package()
	{
		$query = $this->db->get('dealers_packages');
		$result = $query->result();
		return $result;			
	}
/* === Add Package === */
	function add_package($data)
	{
		$result = $this->db->insert('dealers_packages',$data);
		return $result;
	}
/* === Update Package === */
	 function update_package_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('dealers_packages',$data1);
		return $result;
    }
/* === Get Package === */
	public function get_single_package($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('dealers_packages');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Package === */
	 function package_edit($id,$data){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('dealers_packages', $data);
		 return $result;
	 }	
/* ===  Package Pop-up View === */
	function viewpopup($id)
	{
		$this->db->select('dealers_packages.*,dealers_packages.id as id,role.rolename');
		$this->db->where('dealers_packages.id',$id);
		$this->db->join('role','dealers_packages.created_by = role.id','left');
		$query = $this->db->get('dealers_packages');
		$result = $query->row();
		return $result;	
	}
/* === Delete  Package === */
	public function deletepackage($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('dealers_packages');
		if($result){
		 return "success"; 
		}
		else{
			 return "error";
		}
   }
/* === Get Package === */
	public function get_singlepackage($id){
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('dealers_packages');
		 $result = $query->row();
	     return $result;
	}	   
}
?>