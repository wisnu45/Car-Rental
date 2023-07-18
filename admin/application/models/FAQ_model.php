<?php 
class FAQ_model extends CI_Model {	
	public function _construct(){
		parent::__construct();
 	}
/* === View FAQ === */
	function get_faq()
	{
		$query = $this->db->get('general_faq');
		$result = $query->result();
		return $result;		
	}
/* === Add FAQ === */
	function add_faq($data)
	{
		$result = $this->db->insert('general_faq',$data);
		return $result;
	}
/* === Get FAQ === */
	public function get_single_faq($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('general_faq');
		$result = $query->row();
		return $result;
	}
/* === Edit FAQ === */
	function faq_edit($id,$data){
	    $this->db->where('id', $id);
		$result = $this->db->update('general_faq', $data);
		return $result;
	 }
/* === Delete FAQ === */
	public function deletefaq($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('general_faq');
		if($result){
			return "success"; 
		}
	    else{
			 return "error";
		}
	 }
}
?>