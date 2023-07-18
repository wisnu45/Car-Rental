<?php 
class Duration_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Package === */
	function get_duration()
	{
		$query = $this->db->get('deal_durations');
		$result = $query->result();
		return $result;			
	}
/* === Add Package === */
	function add_duration($data)
	{
		//print_r($data);die;
		$result = $this->db->insert('deal_durations',$data);
		return $result;
	}
/* === Update Package === */
	 function update_duration_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('deal_durations',$data1);
		return $result;
    }
/* === Get Package === */
	public function get_single_duration($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('deal_durations');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Package === */
	 function duration_edit($id,$data){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('deal_durations', $data);
		 return $result;
	 }	
/* === Delete  Package === */
	public function deleteduration($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('deal_durations');
		if($result){
		 return "success"; 
		}
		else{
			 return "error";
		}
   }	
}
?>