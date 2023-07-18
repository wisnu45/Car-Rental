<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
class LanguageSwitcher extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 17,March 2017
	**/
    public function __construct() {
        parent::__construct();  
		check_installer();	
    } 
    function switchLang($language = "") {        
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);        
        redirect($_SERVER['HTTP_REFERER']);        
    }
}
?>