<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*---------Naviagation Menu-----------*/

class Login extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 02,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Login_model');		
 	}	
	public function signup(){
		if ($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;						
				$data['password'] = md5($this->input->post('password'));
				$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExist'); 
				if ($this->form_validation->run() == TRUE):		
					$result = $this->Login_model->insert_rentee($data);
					if($result):
						echo "signup";
					else: 
						echo "error";
					endif;										
				else:
					echo "exist";	
				endif;
			endif;	
		endif;			
	}								
    public function signin(){		
		if (isset($_POST)):					
			$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');
			if ($this->form_validation->run() == TRUE):							
				echo "signin";
			else:
				echo "notexist";								
			endif; 
		endif;     		
	}
	public function check_database($password){
		$email = $this->input->post('email');
		$result = $this->Login_model->login($email, md5($password)); 
			if ($result):
				$sess_array = array();
				$sess_array = array(
									'id' => $result->id,
									'email' => $result->email,
									'profile_picture' => $result->profile_picture,
									'rentee' => $result->rentee	
								);			
				$this->session->set_userdata('frontend_logged_in', $sess_array);
				return TRUE;
			else:				
				return false;
			endif; 
	}		
	public function forget_password(){
		$template['page_title'] ="Forgot Password"; 
		$template['page'] ='Homepage';
		$request = file_get_contents("php://input");
		$data = json_decode($request);
		if (isset($_POST)):
			$data = $_POST;				
			$email = $this->input->post('email');		  
			$result=$this->Login_model->forgetpassword($email);                      
			if($result=="EmailSend"):
				echo "loggedIn";			   
			elseif($result=="EmailNotExist"):              
				echo "No";
			endif;  
		else:
			$this->load->view('template',$template);
		endif; 		
	}		
	public function isEmailExist($email) {		
		$is_exist = $this->Login_model->isEmailExist($email);	
		if ($is_exist):			
			return false;
		else:
			return true;
		endif;	
	}	
		
		
}
?>