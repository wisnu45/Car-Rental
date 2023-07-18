<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Staff_model');	
		$this->load->model('Cardirectory_model');			
 	}
/* === VIEW STAFF DETAILS=== */
	public function view()
	{
		$staff_view_page = "Staff/view-staff";
		$permission = permission($staff_view_page);
		if($permission == "access") {
			$template['page'] = "Staff/view-staff";
			$template['page_title'] = "Staff Page";
			$template['data'] = $this->Staff_model->get_staff();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
		}
	}
/* === ADD  STAFF === */
	public function add()
	{
		$id = $this->session->userdata('admin');	
		if($_POST)
		{
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST;
				$config = set_upload_image('assets/uploads/');
				$this->load->library('upload');
				$new_name = time()."_".$_FILES["profile_picture"]['name'];
				$config['file_name'] = $new_name;
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('profile_picture')) {
					$this->session->set_flashdata('message', array('message' => "Logo : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				}
				else 
				{
					$upload_data = $this->upload->data();
					$data['profile_picture'] = $config['upload_path'].$upload_data['file_name'];
					$result = $this->Staff_model->add_staff($data);
					if($result=="email"){
						$this->session->set_flashdata('message', array('message' => 'Email Already Exist','class' => 'danger'));
						redirect(base_url().'Staff/view');
					}
					elseif($result=="username"){
						$this->session->set_flashdata('message', array('message' => 'Username Already Exist','class' => 'danger'));
						redirect(base_url().'Staff/view');
					}
					elseif($result=="success"){
						$this->session->set_flashdata('message',array('message' => 'Staff added  successfully','class' => 'success'));
						redirect(base_url().'Staff/view');
					}
				} 
			}
		}
		$template['role_details']  =  $this->Cardirectory_model->get('admin_role');
		$staff_add_page  = "Staff/add-staff";
		$permission = permission($staff_add_page);
		if($permission == "access") {
			$template['page'] = "Staff/add-staff";
			$template['page_title'] = "Staff Page";
			$this->load->view('template', $template);   
		}
		else{
			$this->load->view('error_trans');
		}	
	}	
/* === DEACTIVE  STAFF DETAILS=== */		
	public function disable(){
		$data1 = array(
			"status" => '0'
		);
		$id = $this->uri->segment(3);
		$result=$this->Staff_model->update_staff_status($id, $data1);
		if($result){
			$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
			redirect(base_url().'Staff/view');
		}	
	}
/* === ACTIVE  STAFF DETAILS === */
	public function active(){
		$data1 = array(
			"status" => '1'
		);
		$id = $this->uri->segment(3);
		$result=$this->Staff_model->update_staff_status($id, $data1);
		if($result){
			$this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
			redirect(base_url().'Staff/view');
		}	
	}
/* === EDIT  STAFF DETAILS === */
	public function edit(){

		$id = $this->uri->segment(3);
	    $template['data'] = $this->Staff_model->get_single_staff($id);
		if(!empty($template['data']))
		{
			if($_POST){
				    /* ===Update Staff Email === */
						if(isset($_POST['acknowledgement2']) && !empty($_POST['acknowledgement2']))
						{
							$data = $_POST;
							$data1['email']=$data['email'];
							$result = $this->Staff_model->staff_updateusername($id,$data1);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Change Email for requested staff updated Sucessfully','class' => 'success'));
									redirect(base_url().'Staff/view');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Email Already Exist','class' => 'danger'));
									redirect(base_url().'Staff/view');
							}
						}
						/* ===Update Staff password === */
						if(isset($_POST['acknowledgement3']) && !empty($_POST['acknowledgement3']))
						{
							$data = $_POST;
							$p = md5($data['password']);
							$data1['password']=$p;
							$result = $this->Staff_model->staff_updatepassword($id,$data1);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Change Password for requested staff updated Sucessfully','class' => 'success'));
									redirect(base_url().'Staff/view');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Error','class' => 'danger'));
								    redirect(base_url().'Staff/view');
							}
						}
						/* ===Update Staff Details === */
			    	else if(isset($_POST['staff_general']) && !empty($_POST['staff_general'])){
					$data = $_POST;
					if(isset($_FILES["profile_picture"]) && !empty($_FILES["profile_picture"])){					
						$config = set_upload_image('assets/uploads/');
						$this->load->library('upload');
						$new_name = time()."_".$_FILES["profile_picture"]['name'];
						$config['file_name'] = $new_name;
						$this->upload->initialize($config);
						if ($this->upload->do_upload('profile_picture')){
							$upload_data = $this->upload->data();
							$data['profile_picture'] = $config['upload_path'].$upload_data['file_name'];
						}
					}					
					$result = $this->Staff_model->staff_update($id,$data);
				    if($result){
						$this->session->set_flashdata('message',array('message' => 'Requested Staff Details Updated Sucessfully','class' => 'success'));
						redirect(base_url().'Staff/view');
					}
					else{
						$this->session->set_flashdata('message', array('message' => 'Error','class' => 'danger'));
						redirect(base_url().'Staff/view');
					}
				}
			}
		}
		else{
			$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
			redirect(base_url().'Staff/view');
		}
		$staff_edit_page = 'Staff/edit-staff';
		$permission = permission($staff_edit_page);
		if($permission == "access") {
			$template['page'] = 'Staff/edit-staff';
			$template['page_title'] = 'Edit Staff';
			$template['role_details']  =  $this->Cardirectory_model->get('admin_role');
			$this->load->view('template',$template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === DELETE STAFF DETAILS === */
    public function deletestaff(){
		$id = $this->uri->segment(3);
	    $result= $this->Staff_model->deletestaff($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Staff Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Staff/view');
	}	
}
?>