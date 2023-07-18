<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dealtranslation extends CI_Controller {
	public function __construct() {
	parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Dealtranslation_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}
    }
	public function add_deal()
	{
		$dealtranslation_add_page = "Translation/Deal/add_deal";
		$permission = permission($dealtranslation_add_page);
		if($permission == "access") {
		$template['page'] = "Translation/Deal/add_deal";
		$template['page_title'] = "Add Language Translation";
		$this->load->view('template',$template);
		}		
		else{
				$this->load->view('error_trans');
			}		
	}
	public function insert_deal()
	{
		$data= json_decode(file_get_contents("php://input"));
		$data =(array) $data;
        $role=$this->Dealtranslation_model->inserthome($data);
        echo $role;
	}
	public function view_deal()
	{		
		$textFile ='deal_lang.php';
		$textFile = str_replace(" ", "_", $textFile); 
        $textFile = strtolower($textFile);
		$trimmed_lang = array();
		$location = '../application/language/'.'';
		$lang_directory = directory_map($location, TRUE);		
		foreach($lang_directory as $key => $value):
			$trimmed_lang[] = trim($value , " \."); 				
		endforeach;
		$avoid_final_lang=array(); $template['final_lang']=array();
		foreach($trimmed_lang as $single_lang):		
			$locationfiles = '../application/language/'.$single_lang.'/'.'';		
			if(!file_exists($locationfiles.$textFile) && !is_dir($locationfiles.$textFile)): 
				$avoid_final_lang[] = $single_lang;				
			else:
				$template['final_lang'][] = $single_lang;
			endif;
		endforeach;
		$template['final_lang'];
		$dealtranslation_view_page = "Translation/Deal/view_deal";
		$template['page'] = "Translation/Deal/view_deal";
		$permission = permission($dealtranslation_view_page);
		if($permission == "access") {
		$template['page_title'] = "View Language Translation";		
		$this->load->view('template',$template);
		}
		else{
				$this->load->view('error_trans');
			}		
	}
	public function edit_deal()
	{
		$template['language_name'] = $this->uri->segment(3);
		$dealtranslation_edit_page = "Translation/Deal/edit_deal";
		$permission = permission($dealtranslation_edit_page);
		if($permission == "access") {
		$template['page'] = "Translation/Deal/edit_deal";
		$template['page_title'] = "edit Language Translation";
		$this->load->view('template',$template);
		}
		else{
				$this->load->view('error_trans');
			}
	}
	public function deal_delete()
	{
		$textFile ='deal_lang.php';
		$language_name = $this->uri->segment(3);	
		$locationfiles = '../application/language/'.$language_name.'/'.$textFile;
		$language_location = '../application/language/'.$language_name.'';
		if(unlink($locationfiles)):
			$lang_directory = directory_map($language_location, TRUE);
			if(is_bool($lang_directory ) === false):
				rmdir($language_location);
				$result = $this->Dealtranslation_model->delete_language($language_name);
				if($result):
					$this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
					redirect(base_url().'Dealtranslation/view_deal');
				endif;		
			else:
				$this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
				redirect(base_url().'Dealtranslation/view_deal');	
			endif;
		else:			
			$this->session->set_flashdata('message', array('message' => 'Request went wrong.Contact Administrator.','class' => 'danger'));
			redirect(base_url().'Dealtranslation/view_deal');
		endif;
	}	
} 
?>