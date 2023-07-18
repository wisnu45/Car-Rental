<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FAQ extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('FAQ_model');		
 	}
/* === VIEW FAQ DETAILS=== */
	public function view()
	{
		$duration_view_page = "FAQ/view-faq";
		$permission = permission($duration_view_page);
		if($permission == "access") {
			$template['page'] = "FAQ/view-faq";
			$template['page_title'] = "FAQ Page";
			$template['data'] = $this->FAQ_model->get_faq();
			$this->load->view('template', $template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === ADD MASTER TABLE  FAQ=== */
	function add()
	{
		$duration_add_page = "FAQ/add-faq";
		$permission = permission($duration_add_page);
		if($permission == "access") {
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST;
				$result = $this->FAQ_model->add_faq($data);
				if($result){
							$this->session->set_flashdata('message',array('message' => 'FAQ added  successfully','class' => 'success'));
							redirect(base_url().'FAQ/view');
				}
				else{
						$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				}
			}
		}
		$template['page'] = "FAQ/add-faq";
		$template['page_title'] = "FAQ Page";
		$this->load->view('template', $template);
		}		
		else
		{
			$this->load->view('error_trans');
		}		
    }		
/* === EDIT  FAQ DETAILS=== */
		public function edit()
		{
			$duration_edit_page = 'FAQ/edit-faq';
			$permission = permission($duration_edit_page);
		    if($permission == "access") {
		    $id = $this->uri->segment(3);
		    $template['data'] = $this->FAQ_model->get_single_faq($id);
			if(!empty($template['data'])){
			    if($_POST){
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$result = $this->FAQ_model->faq_edit($id,$data);
						if($result){
							$this->session->set_flashdata('message',array('message' => 'Requested FAQ Updated  successfully','class' => 'success'));
							redirect(base_url().'FAQ/view');
						}
						else{
							$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
							redirect(base_url().'FAQ/view');
						}
					}
				}
			}
			else{
			    $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				redirect(base_url().'FAQ/view');
				}
			$template['page'] = 'FAQ/edit-faq';
		    $template['page_title'] = 'Edit FAQ';
    	    $this->load->view('template',$template);
			}			
			else
			{
				$this->load->view('error_trans');
			}				
	    }
/* === DELETE FAQ=== */	
	public function deletefaq(){
		$id = $this->uri->segment(3);
		$result= $this->FAQ_model->deletefaq($id);
		$this->session->set_flashdata('message', array('message' => 'Requested FAQ Deleted Successfully','class' => 'success'));
	    redirect(base_url().'FAQ/view');
	}	
}
?>