<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 03-April 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();
		$this->load->model('User_model');
		$this->load->model('Humdrum_model');
		$this->load->model('Login_model');	
 	}	
	public function index(){
		$session_loc_id = $this->session->userdata('location');
		if($this->session->userdata('frontend_logged_in')):
			$id=$this->session->userdata['frontend_logged_in']['id'];
			if($_FILES): 
				if (isset($_FILES['profile_picture'])&& !empty($_FILES['profile_picture'])):						
					$config['upload_path'] = './admin/uploads/rentee/';
					$config['overwrite'] = TRUE;
					$config['allowed_types'] = '*';
					$config['max_size'] = '800';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('profile_picture')):
						$file_data = $this->upload->data();
						$fname = $file_data['file_name'];
						$config['upload_path'] = 'uploads/rentee/';
						$data['profile_picture']=$config['upload_path'].$fname;							
					endif; 
					$result = $this->User_model->update_rentee($data,$id);
					if($this->lang->line('home_slide_alert1')):
						$success_alert = $this->lang->line('home_slide_alert1');
					else:
						$success_alert = 'Updated successfully';
					endif;
					if($this->lang->line('home_slide_alert2')):
						$error_alert = $this->lang->line('home_slide_alert2');
					else:
						$error_alert = 'Error';
					endif;
					if($result):
						$this->session->set_flashdata('message',array('message' => $success_alert,'class' => 'success'));
					else:
						$this->session->set_flashdata('message',array('message' => $error_alert,'class' => 'success'));
					endif;
				endif;
			endif;	
			if($_POST): 
				if(isset($_POST) && !empty($_POST)):
					$data = $_POST;
					if(isset($data['personel_settings']) && !empty($data['personel_settings'])):
						unset($data['personel_settings']);
						$data['dob'] = $data['dob_date'] .'-'. $data['dob_month'] .'-'. $data['dob_year'];
						unset($data['dob_date'],$data['dob_month'],$data['dob_year']);
						$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExistnew');
						if ($this->form_validation->run() == TRUE):	
							$result = $this->User_model->update_rentee($data,$id);
							if($this->lang->line('home_slide_alert1')):
								$success_alert = $this->lang->line('home_slide_alert1');
							else:
								$success_alert = 'Updated successfully';
							endif;
							if($this->lang->line('home_slide_alert2')):
								$error_alert = $this->lang->line('home_slide_alert2');
							else:
								$error_alert = 'Error';
							endif;
							if($result):
								$this->session->set_flashdata('message',array('message' => $success_alert,'class' => 'success'));
							else:
								$this->session->set_flashdata('message',array('message' => $error_alert,'class' => 'danger'));
							endif;	
						else:
							if($this->lang->line('home_slide_alert2')):
								$error_alert = $this->lang->line('home_slide_alert2');
							else:
								$error_alert = 'Error';
							endif;
							$this->session->set_flashdata('message',array('message' => $error_alert,'class' => 'warning'));
						endif;	
					else:
						$data['session-location'] = check_raw_location($data,$session_loc_id);				
						if(!isset($data['session-location'])){
							$data['session-location'] = $session_loc_id;
						}else{
							$this->session->unset_userdata('location');	
						}					
						$this->session->set_userdata('location', $data['session-location']);
						return choosedrive($data);
					endif;	
				endif;
			endif;
			$genial['current_month_true'] = date('M');
			$genial['current_day'] = date('d');		
			$genial['location_id']= $this->session->userdata('location');			
			$genial['selectlocations'] = $this->Humdrum_model->bag_locations();
			$genial['pending_bookings'] = $this->User_model->live_bookings($id,'pending_book');
			$genial['completed_bookings'] = $this->User_model->live_bookings($id,'completed_book');
			$genial['cancelled_bookings'] = $this->User_model->live_bookings($id,'cancelled_book');				
			$genial['page'] = "User/rentee";
			$genial['page_title'] = "User Page";
			$genial['data'] = $this->User_model->bag_rentee_details($id);			
			if(isset($genial['data']->dob) && !empty($genial['data']->dob)):
				$exploded_dob = explode('-',$genial['data']->dob);
				$genial['dob_date'] = $exploded_dob[0];
				$genial['dob_month'] = $exploded_dob[1];
				$genial['dob_year'] = $exploded_dob[2];			
			endif;
			$this->load->view('genial', $genial);
		endif;		
	}
	public function isEmailExistnew($email) { 
		$id=$this->session->userdata['frontend_logged_in']['id']; 
		$is_exist = $this->Login_model->isEmailExistnew($id,$email); 	
		if ($is_exist):			
			return false;
		else:
			return true;
		endif;	
	}
}
?>