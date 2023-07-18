<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cardirectory extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Cardirectory_model');		
 	}
/* === VIEW CAR DIRECTORY DETAILS === */
	public function view()
	{
		$cardirectory_view_page="Cardirectory/view-cardirectory";
		$permission = permission($cardirectory_view_page);
		if($permission == "access") {
			$template['page'] = "Cardirectory/view-cardirectory";
			$template['page_title'] = "Cardirectory Page";
			$template['data'] = $this->Cardirectory_model->get_directory();
			$this->load->view('template', $template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === ADD CAR DIRECTORY DETAILS === */	
	public function add()
	{
		$cardirectory_add_page="Cardirectory/add-cardirectory";
	    $permission = permission($cardirectory_add_page);
		if($permission == "access") {
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST;
				/* === Profile Picture Upload === */
				if(isset($_FILES["main_image"]) && !empty($_FILES["main_image"])){
					$config = set_upload_image('assets/uploads/');
					$this->load->library('upload');	
					$new_name = time()."_".$_FILES["main_image"]['name'];
					$config['file_name'] = $new_name;
					$this->upload->initialize($config);
					if ( $this->upload->do_upload('main_image')){
							$upload_data = $this->upload->data();
							$data['main_image'] = $config['upload_path'].$upload_data['file_name'];
					}
				}
						$data['from_date']="";
						$data['to_date']="";
						$result = $this->Cardirectory_model->add_directory($data);
						if($result){
								 $this->session->set_flashdata('message',array('message' => 'Car added  successfully','class' => 'success'));
								 redirect(base_url().'Cardirectory/view');
						}
						else{
								 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
								 redirect(base_url().'Cardirectory/view');
						}
				
			}
		}
		$template['dealer']  =  $this->Cardirectory_model->get('dealers');
		$template['model']   =  $this->Cardirectory_model->get('car_model');
		$template['make']    =  $this->Cardirectory_model->get('car_make');
		$template['category']=  $this->Cardirectory_model->get('car_category');
		$template['color']   =  $this->Cardirectory_model->get('car_color');
		$template['features']=  $this->Cardirectory_model->get('car_feature');
		$template['fuel']    =  $this->Cardirectory_model->get('car_fuel');
		$template['insurance']=  $this->Cardirectory_model->get('car_insurance');
		$template['page'] = "Cardirectory/add-cardirectory";
		$template['page_title'] = "Cardirectory Page";
		$this->load->view('template', $template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === DEACTIVE  CAR DIRECTORY DETAILS === */
	 public function disable(){
		$data1 = array(
				  "status" => '0'
				 );
		$id = $this->uri->segment(3);
		$s=$this->Cardirectory_model->update_directory_status($id, $data1);
		$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
		redirect(base_url().'Cardirectory/view');
	}
/* === ACTIVE  CAR DIRECTORY DETAILS === */
	public function active(){
		$data1 = array(
				  "status" => '1'
				 );
		$id = $this->uri->segment(3);
		$s=$this->Cardirectory_model->update_directory_status($id, $data1);
	   $this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
		redirect(base_url().'Cardirectory/view');
	}
/* === EDIT  CAR DIRECTORY DETAILS === */
		public function edit(){
			$cardirectory_edit_page='Cardirectory/edit-cardirectory';
	        $permission = permission($cardirectory_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Cardirectory_model->get_single_directory($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							/* === Profile Picture Upload === */
							if(isset($_FILES["main_image"]) && !empty($_FILES["main_image"])){
								$config = set_upload_image('assets/uploads/');
								$this->load->library('upload');	
								$new_name = time()."_".$_FILES["main_image"]['name'];
								$config['file_name'] = $new_name;
								$this->upload->initialize($config);
								if ( $this->upload->do_upload('main_image')){
									$upload_data = $this->upload->data();
									$data['main_image'] = $config['upload_path'].$upload_data['file_name'];
								}
							}
							$result = $this->Cardirectory_model->directorydetails_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Car Detail Updated Sucessfully','class' => 'success'));
									redirect(base_url().'Cardirectory/view');
							}
							else{
									 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
							}
						}	
					}
				}
				else
				{
				$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				redirect(base_url().'Cardirectory/view');
				}
				$template['dealer']  = $this->Cardirectory_model->get('dealers');
				$template['showroom']= $this->Cardirectory_model->get('car_showroom');
				$template['model']   = $this->Cardirectory_model->get_carmakemodel($template['data']->make);
				$template['make']    = $this->Cardirectory_model->get('car_make');
				$template['category']= $this->Cardirectory_model->get('car_category');
				$template['color']   = $this->Cardirectory_model->get('car_color');
				$template['features']= $this->Cardirectory_model->get('car_feature');
				$template['fuel'] = $this->Cardirectory_model->get('car_fuel');
				$template['insurance']=  $this->Cardirectory_model->get('car_insurance');
				$template['page'] = 'Cardirectory/edit-cardirectory';
				$template['page_title'] = 'Edit Cardirectory';
				$this->load->view('template',$template);
			}
			else{
				$this->load->view('error_trans');
			}
 }
/* ===  CAR DIRECTORY DELETE === */
	public function deletedirectory(){
		$id = $this->uri->segment(3);
		$result= $this->Cardirectory_model->deletedirectory($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Car Deleted Successfully','class' => 'success'));
		redirect(base_url().'Cardirectory/view');
	}
/*****CAR DIRECTORY POP-VIEW****/	
	public function viewpopup()
	{
	    if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$id=$_POST['id'];
				$main_table = 'car_listing';
				$template['data'] = array(
											'car_listing' => get_single_table($id,$main_table),
											'cardetailsfirst' => get_first_limited($id),
											'cardetailssecond' => get_second_limited($id),
								);	
				//var_dump(get_single_table($id,$main_table));exit;						
				$this->load->view('Cardirectory/view-Cardirectorypopup',$template);
			}
		}
	}
/* === ADD CAR GALLERY === */
	public function gallery()
	{
		$cardirectory_gallery_page='Cardirectory/gallery';
	    $permission = permission($cardirectory_gallery_page);
		if($permission == "access") {
		if($_POST){	
		   $listing_id = $_POST['listing_id'];
		   $data = array(); 
		   $filesCount = count($_FILES['picture']['name']);
		   for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['carpicture']['name']     = time() . "_" . $_FILES['picture']['name'][$i];
				$_FILES['carpicture']['type']     = $_FILES['picture']['type'][$i];
				$_FILES['carpicture']['tmp_name'] = $_FILES['picture']['tmp_name'][$i];
				$_FILES['carpicture']['error']    = $_FILES['picture']['error'][$i];
				$_FILES['carpicture']['size']     = $_FILES['picture']['size'][$i];
				$uploadPath              = 'assets/uploads/';
				$config['upload_path']   = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';	
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('carpicture')) {
					$fileData   = $this->upload->data();
					$uploadData[$i]['listing_id']    = $listing_id;
					$uploadData[$i]['picture'] = $uploadPath . $fileData['file_name'];
					$uploadData[$i]['created_on'] = $_POST['created_on'];
					$uploadData[$i]['created_by'] = $_POST['created_by']; 
				}  
		  }
		  if (!empty($uploadData)) {
				$result = $this->Cardirectory_model->add_gallery($uploadData,$listing_id);
				if($result){
						$this->session->set_flashdata('message',array('message' => 'Gallery For Requested Car added  successfully','class' => 'success'));
				}
				else{
						$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				}
			}
		}
		$template['data'] = $this->Cardirectory_model->get_gallery();
		$template['list'] = $this->Cardirectory_model->get_list();
		$template['page'] = 'Cardirectory/gallery';
		$template['page_title'] = 'Car Gallery';
		$this->load->view('template',$template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === CAR GALLERY VIEW === */
		function view_cargallery()
		{
			$cardirectory_viewgallery_page='Cardirectory/view-car-gallery';
	        $permission = permission($cardirectory_viewgallery_page);
			$id = $this->uri->segment(3);
		    if($permission == "access") {
				$template['data'] = $this->Cardirectory_model->get_car_gallery($id);
				if(!empty($template['data'])) {
				   $template['page'] = 'Cardirectory/view-car-gallery';
					$template['page_title'] = 'View gallery';
					$this->load->view('template',$template);
				}	
				else {
					redirect(base_url().'Cardirectory/gallery');
				}
			}
			else{
				$this->load->view('error_trans');
			}
		}
/* === CAR GALLERY DELETE === */
	function delete_cargallery()
	{
		$id = $_POST['id'];
		$result = $this->Cardirectory_model->cargallery_delete($id);
		return  $result;
	}
/* === ID OF DEALER=== */	
	public function getshowroom()
	{
		 $id=$_POST['id'];
	     $showroom = $this->Cardirectory_model->gets_showroom($id);
		 foreach($showroom as $showroom1) {
			 echo "<option value=".$showroom1->id.">".$showroom1->name."</option>";
		 }
	}
/* == CAR MAKE-MODEL == */
	public function get_carmodelfast(){
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST;
				$page['models'] = $this->Cardirectory_model->get_carmakemodel($data['make_id']);						
				$this->load->view('Cardirectory/car_model',$page);
			}
		}
	}
}
?>