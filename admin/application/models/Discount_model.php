<?php 
class Discount_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Discount === */	
	function get_discount()
	{
		$this->db->select('offers.*,offers.id as id,car_category.name');
		$this->db->from('offers');
		$this->db->join('car_category', 'car_category.id = offers.category_id','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
/* === Add Discount === */
	function add_discount($data)
	{
		$this->db->where('coupon_for', $data['coupon_for']);
		$query = $this->db->get('offers');
		if( $query->num_rows() > 0 ){ 
			return "name";
		}
		else{
			$this->db->where('coupon_code', $data['coupon_code']);
			$query1 = $this->db->get('offers');
			if( $query1->num_rows() > 0 ){ 
				return "code";
			}
			else{			
				$result = $this->db->insert('offers',$data);
				return "sucess";
			}
		}
	}
/* === Get Discount === */
	public function get_single_discount($id){
		$query = $this->db->where('id',$id);
	    $query = $this->db->get('offers');
		$result = $query->row();
		return $result;
	}
/* === Edit Discount === */
	 function discount_edit($id,$data){ 
		$this->db->where('coupon_for', $data['coupon_for']);
		$this->db->where('id!=', $id);	
		$query = $this->db->get('offers');
		$result = $query->row(); 
		if($result){ 
			return "name";
		}
		else{ 				
			$this->db->where('coupon_code', $data['coupon_code']);
			$this->db->where('id!=', $id);
			$query1 = $this->db->get('offers');
			$result1 = $query1->row(); 
			if($result1){ 
				return "code";
			}
			else{ 
				$this->db->where('id', $id);
				$resultnew = $this->db->update('offers', $data);
				return 'success';
		 	}
		}
	 }
/* === Delete Discount === */
	public function deletediscount($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('offers');
		if($result){
			return "success"; 
		}
	    else{
			 return "error";
		}
	 }
/* === Enable Discount === */
	function update_discount_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('offers',$data1);
		return $result;
    }
}
?>