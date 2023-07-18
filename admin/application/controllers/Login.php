<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		if($this->session->userdata('logged_in')) { 
			redirect(base_url().'welcome');
		}		
		$this->load->helper(array('form'));		
		$this->load->model('Login_model');	
		$this->load->model('Role_model');
 	}
	public function index(){		
		$template['page_title'] = "Login";
		if($_POST){
			if(isset($_POST) && !empty($_POST)) {
				$this->load->library('form_validation');			
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');			               
					if($this->form_validation->run() == TRUE) {
						redirect(base_url().'welcome');
						}						
			}
		}		
		$this->load->view('Admin/Login-form');		
	}
		function check_database($password) {
		$username = $this->input->post('username');
		$result = $this->Login_model->login($username, md5($password));		
		if($result) {				
			$sess_array = array();
			$sess_array = array(
					'id' => $result->id,
					'username' => $result->username,
					'user_type' => $result->user_type,
			        'created_date' =>$result->created_date,
					'profile_picture' =>$result->profile_picture					
			        );        
			$this->session->set_userdata('logged_in',$sess_array);			
			$this->session->set_userdata('admin',$result->user_type);
			$this->session->set_userdata('username',$result->username);
			$this->session->set_userdata('id',$result->id);
			$this->session->set_userdata('profile_picture',$result->profile_picture);	
			$role = $this->Role_model->role();
				if($role)
				{
					 return TRUE;
				}	
		}
		else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}				
	}
}
