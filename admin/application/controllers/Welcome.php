<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Welcome_model');		
 	}
	
	public function index()
	{
		$template['page'] = "Home/Dashboard";
		$template['page_title'] = "Dashboard";
		$template['data'] = "Dashboard page";
		$this->load->view('template', $template);
	}
	
	public function admin()
	{
		$id = $this->session->userdata('logged_in')['id'];		
		if($_POST){
			if(isset($_POST['picturechecker']) && !empty($_POST['picturechecker'])){										
				if(isset($_FILES['profile_picture'])) {					
							$this->load->library('upload');
							$config = set_upload_options_admin();
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('profile_picture')) {		
								$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
								}else {														
									$upload_data = $this->upload->data();									
									$data['profile_picture'] = $config['upload_path']."/".$upload_data['file_name'];																	
									$result = $this->Welcome_model->update_admin($data, $id);
									if($result){
										if($id == $this->session->userdata('logged_in')['id']) {
										$this->session->userdata('profile_picture',$data['profile_picture']);									
										}
									}	
							}																			
					}
				}elseif(isset($_POST['formchecker']) && !empty($_POST['formchecker'])){
					$data = $_POST;
					unset($data['formchecker']);
					if($data['n_password'] == $data['c_password']){
						unset($data['c_password']);
						$result = $this->Welcome_model->update_admin_password($data,$id);
						if($result){
						$this->session->set_flashdata('message', array('message' => 'Password Updated Successfully.','class' => 'success'));
						}else{
						$this->session->set_flashdata('message', array('message' => 'Error Occured.Entered Old Password Is Wrong.','class' => 'danger'));							
					}
					}else{
						$this->session->set_flashdata('message', array('message' => 'Password Mismatch.Entered new password does not match with confirm new password.','class' => 'danger'));
						}
					}					
				}							
		$template['page'] = "Admin/edit_profile";
		$template['page_title'] = "Profile Page";
		$template['data'] = $this->Welcome_model->get_admin($id);
		$this->load->view('template', $template);
	}
	

}