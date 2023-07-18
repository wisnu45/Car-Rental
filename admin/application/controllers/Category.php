<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Category_model');		
 	}
/* === ADD MASTER TABLE CATEGORY === */
		function add()
		{
			$Category_view_page = "Category/view-category";
			$permission = permission($Category_view_page);
		    if($permission == "access") {
				if($_POST){
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$config = set_upload_image('assets/uploads/category');
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
								$result = $this->Category_model->add_category($data);
								if($result){
										$this->session->set_flashdata('message',array('message' => 'Category added  successfully','class' => 'success'));
										redirect(base_url().'Category/add');
								}
								else{
										$this->session->set_flashdata('message', array('message' => 'Category Name Already Exist','class' => 'error'));
								}
						} 
					} 
				}
				$template['data'] = $this->Category_model->get_category();
				$template['page'] = "Category/view-category";
				$template['page_title'] = "Category Page";
				$this->load->view('template', $template);
			}
			else{
				$this->load->view('error_trans');
			}	
	    }	
/* === EDIT  CATEGORY DETAILS === */		
		public function edit(){
			$Category_edit_page = 'Category/edit-category';
			$permission = permission($Category_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Category_model->get_single_category($id);
				if(!empty($template['data'])){
					if($_POST){
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
						   $result = $this->Category_model->category_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Category Updated  successfully','class' => 'success'));
									redirect(base_url().'Category/add');
							}
							 else{
									$this->session->set_flashdata('message',array('message' => 'Category Already Exist','class' => 'danger'));
									redirect(base_url().'Category/add');
							}
						}
						

					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Category/add');
				}
				$template['page'] = 'Category/edit-category';
				$template['page_title'] = 'Edit Category';
				$this->load->view('template',$template);	
			}
			else{
				$this->load->view('error_trans');
			}	
	    }
/* === DELETE CATEGORY DETAILS === */	
	public function deletecategory(){
		$id = $this->uri->segment(3);
		$result= $this->Category_model->deletecategory($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Category Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Category/add');
	}	
}
?>