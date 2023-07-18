<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Place extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Place_model');		
 	}
/* === ADD PLACE DETAILS=== */
	public function add()
	{
		$place_add_page = "Place/add-place";
		$permission = permission($place_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					if(isset($_FILES["picture"]) && !empty($_FILES["picture"])){
						$data = $_POST;
						$config = set_upload_image('assets/uploads/');
						$this->load->library('upload');	
						$new_name = time()."_".$_FILES["picture"]['name'];
						$config['file_name'] = $new_name;
						$this->upload->initialize($config);
						if ( $this->upload->do_upload('picture')){
								$upload_data = $this->upload->data();
								$data['picture'] = $config['upload_path'].$upload_data['file_name'];
						}
					}
					$exploded_address = explode(',',$data['address']);
					$data['name'] = $exploded_address[0];
					$exploded_lat =explode('.', $data['latitude']);
					$data['short_lat']= $exploded_lat[0];
					$exploded_lon =explode('.', $data['longitude']);
					$data['short_lon'] = $exploded_lon[0];
					$result = $this->Place_model->add_place($data);
					if($result){
						$this->session->set_flashdata('message',array('message' => 'Location added  successfully','class' => 'success'));
					}
					else{
							 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
						}
				}
			}
			$template['page'] = "Place/add-place";
			$template['page_title'] = "Place Page";
			$template['data'] = $this->Place_model->get_place();
			$this->load->view('template', $template);
		}
		else
			{
				$this->load->view('error_trans');
			}	
	}
/* === EDIT PLACE DETAILS === */
	public function edit(){
		$place_edit_page = 'Place/edit-place';
		$permission = permission($place_edit_page);
		if($permission == "access") {
			$id = $this->uri->segment(3);
			$template['data'] = $this->Place_model->get_single_place($id);
			if(!empty($template['data'])){
				if($_POST){
					if(isset($_POST) && !empty($_POST)){
							if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$config = set_upload_image('assets/uploads/');
							$this->load->library('upload');
							$new_name = time()."_".$_FILES["picture"]['name'];
							$config['file_name'] = $new_name;
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('picture')) {
									$this->session->set_flashdata('message', array('message' => "Image : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
							}
							else { 
								$upload_data = $this->upload->data();
								$data['picture'] = $config['upload_path'].$upload_data['file_name'];	
							}
						}
					 
					$exploded_address = explode(',',$data['address']);
					$data['name'] = $exploded_address[0];
					$exploded_lat =explode('.', $data['latitude']);
					$data['short_lat']= $exploded_lat[0];
					$exploded_lon =explode('.', $data['longitude']);
					$data['short_lon'] = $exploded_lon[0];
						 $result = $this->Place_model->placedetails_edit($id,$data);
						 if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested Location Updated Sucessfully ','class' => 'success'));
								redirect(base_url().'Place/add');
						}
						else{
							$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
							redirect(base_url().'Place/add');
						}
					}
				}
			}
			else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Place/add');
			}
			 $template['page'] = 'Place/edit-place';
			 $template['page_title'] = 'Edit Place';
			 $this->load->view('template',$template);
		}
		else
			{
				$this->load->view('error_trans');
			}			 
    }
/* === DELETE PLACE === */
	public function deleteplace(){
		$id = $this->uri->segment(3);
		$result= $this->Place_model->deleteplace($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Location Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Place/add');
	}	
}
?>