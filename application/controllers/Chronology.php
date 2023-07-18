<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chronology extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 13,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
 	}			
	public function getFmonthagenda(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;
				$cordial['target_month'] = explode('-',$data['lastmsg']);
				$current_day = date('d');
				$current_month_true = date('M');
				if($cordial['target_month'][1] == $current_month_true):
					$cordial['current_day']=$current_day;	
				else:
					$cordial['current_day']=01;	
				endif;				
				$this->load->view('Pipeline/frommonthagenda',$cordial);
			endif;
		endif;
	}
	public function getFdateagenda(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;
				$cordial['target_date'] = explode('-',$data['lastmsg']);
				$cordial['current_day'] = date('d');				
				$this->load->view('Pipeline/fromdateagenda',$cordial);
			endif;
		endif;
	}
	public function getprevagenda(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;
				$cordial['current_month_true'] = explode('-',$data['month']);					
				$cordial['current_day'] = explode('-',$data['date']);
				$time_divider = explode(':',$data['time']);
				$cordial['next_hour'] = $time_divider[1]; 
				$cordial['next_minutes'] = $time_divider[2];
				$cordial['calculated_next_time'] = $data['timeasst'] + 60;	
				$this->load->view('Pipeline/nextdateagenda',$cordial);
			endif;
		endif;
	}
	public function getTmonthagenda(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;				
				$cordial['current_month_true'] = explode('-',$data['month']);					
				$cordial['target_month'] = explode('-',$data['lastmsg']);								
				if($cordial['target_month'][1] == $cordial['current_month_true'][0]):
					$cordial['current_day'] = explode('-',$data['date']);
					$time_divider = explode(':',$data['time']);
					$cordial['next_hour'] = $time_divider[1]; 
					$cordial['next_minutes'] = $time_divider[2];
					$cordial['calculated_next_time'] = $data['timeasst'] + 60;	
				else:
					$cordial['current_day'][0]=01;	
					$cordial['current_day'][1]=01;	
					$cordial['current_day'][2]=01;	
					$cordial['current_day'][3]=01;
					$cordial['next_hour'] ="default";
					$cordial['next_minutes'] ="default";
					$cordial['calculated_next_time'] = 0;
				endif;				
				$this->load->view('Pipeline/tomonthagenda',$cordial);
			endif;
		endif;
	}
	public function getTdateagenda(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;
				$cordial['target_date'] = explode('-',$data['lastmsg']);				
				$cordial['current_month_true'] = explode('-',$data['month']);
				if($cordial['target_date'][1] == $cordial['current_month_true'][0]):
					$cordial['current_day'] = explode('-',$data['date']);
					$time_divider = explode(':',$data['time']);
					if(strtotime($cordial['current_day'][2].'-'.$cordial['current_day'][3].'-'.$cordial['current_day'][0]) == strtotime($cordial['target_date'][4].'-'.$cordial['target_date'][5].'-'.$cordial['target_date'][2])):
						$cordial['next_hour'] = $time_divider[1]; 
						$cordial['next_minutes'] = $time_divider[2];
						$cordial['calculated_next_time'] = $data['timeasst'] + 60;
					else:
						$cordial['next_hour'] ="default";
						$cordial['next_minutes'] ="default";
						$cordial['calculated_next_time'] = 0;
					endif;
				else:
					$cordial['current_day'][0]=01;	
					$cordial['current_day'][1]=01;	
					$cordial['current_day'][2]=01;	
					$cordial['current_day'][3]=01;
					$cordial['next_hour'] ="default";
					$cordial['next_minutes'] ="default";
					$cordial['calculated_next_time'] = 0;	
				endif;					
				$this->load->view('Pipeline/todateagenda',$cordial);
			endif;
		endif;
	}
}
?>