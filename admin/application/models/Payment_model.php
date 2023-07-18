<?php 
class Payment_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Payment === */
	function get_payment()
	{
		$this->db->select('dealers.first_name,dealers_payments.package_name,dealers_payments.package_period as period,dealers_payments.*');
		$this->db->from('dealers_payments');
		$this->db->join('dealers', 'dealers.id = dealers_payments.dealer_id','left');					
	    $this->db->join('dealers_packages', 'dealers_packages.id   = dealers_payments.package_id','left');	
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
/* === Add Payment === */
	function add_payment($data)
	{
		if($this->db->insert('dealers_payments',$data))
		{								
			$this->db->where('id',$data['dealer_id']);
			$this->db->set('package_enddate',$data['expiry_date']);
		    $result = $this->db->update('dealers');
			return $result;
		}
		else
			return false;

	}
/* === Update Payment === */
	 function update_payment_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('dealers_payments',$data1);
		return $result;
    }
/* === Get Payment === */
	public function get_single_payment($id){
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('dealers_payments');
		 $result = $query->row();
	     return $result;
	}
/* === Edit Payment === */
	 function payment_edit($id,$data){//print_r($data);die;
		 $this->db->where('id', $id);
		 $result = $this->db->update('dealers_payments', $data);
		 return $result;
	 } 
/* === Delete Payment === */
	public function deletepayment($id){
		 $this->db->where('id',$id);
		 $result = $this->db->delete('dealers_payments');
		 if($result) {
			return "success"; 
		 }
		 else{
			 return "error";
		 }
	}
/* === View Package === */
	function get_package()
	{
		$this->db->where('status',1);
		$query = $this->db->get('dealers_packages');
		
		$result = $query->result();
		return $result;			
	}	
}
?>