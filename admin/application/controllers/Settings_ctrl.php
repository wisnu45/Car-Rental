<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_ctrl extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
	      date_default_timezone_set("Asia/Kolkata");
		  $this->load->model('Settings_model');		  
		  $this->load->library('image_lib');
		  if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		 }
	}
	/* === VIEW SETTINGS=== */
    public function view_settings()
	{
		    $settings_view_page = 'Settings/add-settings';
			$permission = permission($settings_view_page);
		    if($permission == "access") {
				$id = $this->session->userdata('logged_in')['id'];
				if($_POST){
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						unset($data['submit']); 
						if(isset($_FILES['logo'])) 
						{
							$config = set_upload_image('assets/uploads/logo');
							$this->load->library('upload');
							$new_name = time()."_".$_FILES["logo"]['name'];
							$config['file_name'] = $new_name;
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('logo')) {
									unset($data['logo']);
							}
							else {
							$upload_data = $this->upload->data();
							$data['logo'] = $config['upload_path'].$upload_data['file_name'];
							}
						}
						if(isset($_FILES['favicon'])) 
						{
							$config = set_upload_image('assets/uploads/favicons');
							$this->load->library('upload');
							$new_name = time()."_".$_FILES["favicon"]['name'];
							$config['file_name'] = $new_name;
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('favicon')) {
							unset($data['favicon']);
							}
							else {
							$upload_data = $this->upload->data();
							$data['favicon'] = $config['upload_path'].$upload_data['file_name'];
							}
						}
						$result = $this->Settings_model->update_settings($data);
						if($result) {
							 $this->session->set_flashdata('message',array('message' => 'Add Settings Details Updated successfully','class' => 'success'));
						}
						else {
							 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
						}
					}
				}
				$resulttitles = $this->Settings_model->settings_viewing();
				$sessing_arrays = array(
										'title' => $resulttitles->title
										);
				$this->session->set_userdata('title', $sessing_arrays);
				$template['page'] = 'Settings/add-settings';
				$template['page_title'] = 'Add Settings';
				$template['result'] = $this->Settings_model->settings_viewing(); 
				$this->load->view('template',$template);
			}
			else
			{
				$this->load->view('error_trans');
			}
	} 
}
?>
