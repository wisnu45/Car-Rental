<?php 
class Login_model extends CI_Model {	
	public function _consruct(){
		parent::_construct();
 	}
	function insert_rentee($data){
		$data['status'] = 1;
		if ($this->db->insert("renter", $data)):
			return true;
		endif;
	}
	function login($email, $password){
		$this->db->select('*');
		$this->db->from('renter');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', 1);		
		$query = $this->db->get();	
		$result = $query->row();	
		return $result;
	}
	function forgetpassword($email){                        
		$this->db->where('email',$email);
		$query=$this->db->get('renter');		
		$query=$query->row();
		$settings = get_settings();
		if($query):             
			$username=$query->rentee;
			$from_email=$settings->admin_email;
			$this->load->helper('string');
			$rand_pwd= random_string('alnum', 8);
			$password=array('password'=>md5($rand_pwd));                 
			$this->db->where('email',$email);
			$query=$this->db->update('renter',$password);
			if($query):            			
				$configs = array(
					'protocol'=>'smtp',
					'smtp_host'=>$settings->smtp_host,
					'smtp_user'=>$settings->smtp_username,
					'smtp_pass'=>$settings->smtp_password,
					'smtp_port'=>'587'
				);             
                $this->load->library('email');
			    $this->email->initialize($configs);
                $this->email->from($from_email, $username);
                $this->email->to($email);
                $this->email->subject('Forget Password');
                $this->email->message('New Password is '.$rand_pwd.' ');
                $this->email->send();        
                  return "EmailSend";
                endif;
          endif;
	}
	function isEmailExist($email){
		$this->db->where('email',$email);
		$query = $this->db->get('renter');
		$result_pre = $query->row();		
		if($result_pre): 
			return true; 		
		endif;	
	}
	function isEmailExistnew($id,$email){ 
		$this->db->where('id <>',$id);
		$this->db->where('email',$email);
		$query = $this->db->get('renter');
		$result_pre = $query->row();		
		if($result_pre): 
			return true; 		
		endif;	
	}
}
?>