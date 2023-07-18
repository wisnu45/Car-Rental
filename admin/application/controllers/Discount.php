<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Discount extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Discount_model');	
		$this->load->model('Cardirectory_model');			
 	}
/* === VIEW DISCOUNT DETAILS=== */
	public function view()
	{
		$discount_view_page = "Discount/view-discount";
		$permission = permission($discount_view_page);
		if($permission == "access") {
			$template['page'] = "Discount/view-discount";
			$template['page_title'] = "Discount Page";
			$template['data'] = $this->Discount_model->get_discount();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
			}	
	}
/* === ADD DISCOUNT=== */
	function add()
	{
		$discount_add_page = "Discount/add-discount";
		$permission = permission($discount_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$config = set_upload_image('assets/uploads/');
					$this->load->library('upload');
					$new_name = time()."_".$_FILES["image"]['name'];
					$config['file_name'] = $new_name;
					$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('image')) {
						$this->session->set_flashdata('message', array('message' => "Main Image : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
					}
					else{
						$upload_data = $this->upload->data();
						$data['image'] = $config['upload_path'].$upload_data['file_name'];
						$result = $this->Discount_model->add_discount($data);
						if($result=="name"){
								$this->session->set_flashdata('message',array('message' => 'Coupon Name Already Exist','class' => 'error'));
						}
						elseif($result=="code"){
							 $this->session->set_flashdata('message', array('message' => 'Coupon Code Already Exist','class' => 'error'));
						}
						elseif($result=="sucess")
						{
							$this->session->set_flashdata('message', array('message' => 'Offer Added Sucessfully','class' => 'success'));
							redirect(base_url().'Discount/view');
						}
					}
				}
			}
			$template['page'] = "Discount/add-discount";
			$template['page_title'] = "Disount Page";
			$template['category']=  $this->Cardirectory_model->get('car_category');
			$template['location']=  $this->Cardirectory_model->get('general_locations');
			$this->load->view('template', $template); 
		}
		else{
				$this->load->view('error_trans');
			}		
	}		
/* === EDIT  DISCOUNT DETAILS=== */
		public function edit()
		{
			$discount_edit_page = 'Discount/edit-discount';
			$permission = permission($discount_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Discount_model->get_single_discount($id);
				if(!empty($template['data'])){
					if($_POST){
						$data = $_POST;
							if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$config = set_upload_image('assets/uploads/');
							$this->load->library('upload');
							$new_name = time()."_".$_FILES["image"]['name'];
							$config['file_name'] = $new_name;
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('image')) {
									$this->session->set_flashdata('message', array('message' => "Image : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
							}
							else {
								$upload_data = $this->upload->data();
								$data['image'] = $config['upload_path'].$upload_data['file_name'];	
							}
						}
						$result = $this->Discount_model->discount_edit($id,$data);
						if($result=="name"){
								$this->session->set_flashdata('message',array('message' => 'Coupon Name Already Exist','class' => 'error'));
						}
						elseif($result=="code"){
							 $this->session->set_flashdata('message', array('message' => 'Coupon Code Already Exist','class' => 'error'));
						}
						elseif($result=="success"){
							$this->session->set_flashdata('message', array('message' => 'Requested Offer  Updated Sucessfully','class' => 'success'));
							redirect(base_url().'Discount/view');
						}
						
					}
					
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Caroffer/add');
				}	
				$template['page'] = 'Discount/edit-discount';
				$template['page_title'] = 'Edit Discount';
				$template['category']=  $this->Cardirectory_model->get('car_category');
				$template['location']=  $this->Cardirectory_model->get('general_locations');
				$this->load->view('template',$template);
			   }			
			else{
					$this->load->view('error_trans');
				}
	    }
/* === DELETE  DISCOUNT=== */
	 public function deletediscount(){
			$id = $this->uri->segment(3);
			$result= $this->Discount_model->deletediscount($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Offer Deleted Successfully','class' => 'success'));
			redirect(base_url().'Discount/view');
	    }
/* === DEACTIVE  DISCOUNT DETAILS=== */
	public function disable(){
		$data1 = array(
				  "status" => '0'
				 );
		$id = $this->uri->segment(3);
		$s=$this->Discount_model->update_discount_status($id, $data1);
	    $this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
		redirect(base_url().'Discount/view');
	}
/* === ACTIVE  DISCOUNT DETAILS=== */
	public function active(){
		$data1 = array(
				  "status" => '1'
				 );
		$id = $this->uri->segment(3);
	    $s=$this->Discount_model->update_discount_status($id, $data1);
		$this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
		redirect(base_url().'Discount/view');
	}		
}
?>