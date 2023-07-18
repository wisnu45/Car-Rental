<?php 
class Rentertranslation_model extends CI_Model {	
	public function _consruct(){
		parent::__construct();
 	}	
	function inserthome($data){	
		/* additional page wamp ==start== */
		$homedata["lang['language']"] = $data["lang['language']"];
		$homedata["lang['home_lang']"] = $data["lang['home_lang']"];unset($data["lang['home_lang']"]);
		$commutedata["lang['language']"] = $data["lang['language']"];
		$commutedata["lang['commute_lang']"] = $data["lang['commute_lang']"];unset($data["lang['commute_lang']"]);
		$logindata["lang['language']"] = $data["lang['language']"];
		$logindata["lang['login_lang']"] = $data["lang['login_lang']"];unset($data["lang['login_lang']"]);
		$tariffdata["lang['language']"] = $data["lang['language']"];
		$tariffdata["lang['tariff_lang']"] = $data["lang['tariff_lang']"];unset($data["lang['tariff_lang']"]);
		$dealdata["lang['language']"] = $data["lang['language']"];
		$dealdata["lang['deal_lang']"] = $data["lang['deal_lang']"];unset($data["lang['deal_lang']"]);
		$offersdata["lang['language']"] = $data["lang['language']"];
		$offersdata["lang['offers_lang']"] = $data["lang['offers_lang']"];unset($data["lang['offers_lang']"]);
		$chronologypopupdata["lang['language']"] = $data["lang['language']"];
		$chronologypopupdata["lang['chronologypopup_lang']"] = $data["lang['chronologypopup_lang']"];unset($data["lang['chronologypopup_lang']"]);
		$coupebookingdata["lang['language']"] = $data["lang['language']"];
		$coupebookingdata["lang['coupebooking_lang']"] = $data["lang['coupebooking_lang']"];unset($data["lang['coupebooking_lang']"]);
		/* ==end== additional page wamp */
		$date =  $data['created_date'];
		unset($data['created_date']);
		$createdby =  $data['created_by'];
	    unset($data['created_by']);
		unset($data['q']);		
		if(isset($data["lang['language']"]) && !empty($data["lang['language']"])){
			$this->db->where('name',$data["lang['language']"]);
			$query = $this->db->get('general_languages');
			$result = $query->row();
			if($result){
				$updated_id =  $data["lang['language']"];
				unset($data['id']);	
			}		
		  }			
		$page_name = $data["lang['page_name']"];			
		$textFile= $data["lang['language']"];
		$extension = ".php";
		$location = '../application/language/'.'';
		$folderName = $textFile;
		$folderName = str_replace(" ", "_", $folderName); 
        $folderName = strtolower($folderName);
		if(!file_exists($location.$folderName) && !is_dir($location.$folderName)){   
			mkdir($location.$folderName, 0777, TRUE);				
		}
		$filename=$location.$folderName.'/'.$page_name.$extension;
		$myfile = fopen($filename, "wb") or die("Unable to open file!");
		$txt = '<?php ';
		foreach($data as $key=>$value){
			$txt .='$'.$key.' = "'.$value.'";'."\r\n";
		}
		$txt .=' ?>';
		fwrite($myfile, $txt);
		fclose($myfile);
				$final_data = array( 
							'name' => $textFile,
							'created_date' =>  $date,
							'created_by' => $createdby
				);
		if(isset($updated_id)){
			$this->db->where('name', $updated_id);
			$query = $this->db->get('general_languages');
			if( $query->num_rows() == 1 ){ 
				$final_data2 = array( 
								'updated_on' =>  $date,
								'updated_by' => $createdby
					);
					$this->db->where("name",$updated_id);
					$this->db->update('general_languages',$final_data2);
					return 2;
			}
		}else{			 
			/*  for page wamp ===start===*/
			//home
			$home_lang=$location.$folderName.'/'.'home_lang'.$extension;
			$home_file = fopen($home_lang, "wb") or die("Unable to open file!");				
			$home_txt = '<?php ';
			foreach($homedata as $key=>$value){
				$home_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$home_txt .=' ?>';
			fwrite($home_file, $home_txt);
			fclose($home_file);
			
			//commute
			$commute_lang=$location.$folderName.'/'.'commute_lang'.$extension;
			$commute_file = fopen($commute_lang, "wb") or die("Unable to open file!");				
			$commute_txt = '<?php ';
			foreach($commutedata as $key=>$value){
				$commute_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$commute_txt .=' ?>';
			fwrite($commute_file, $commute_txt);
			fclose($commute_file);
			//login	
			$login_lang=$location.$folderName.'/'.'login_lang'.$extension;
			$login_file = fopen($login_lang, "wb") or die("Unable to open file!");
			$login_txt = '<?php ';
			foreach($logindata as $key=>$value){
				$login_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$login_txt .=' ?>';
			fwrite($login_file, $login_txt);
			fclose($login_file);
			
			//tariff
			$tariff_lang=$location.$folderName.'/'.'tariff_lang'.$extension;
			$tariff_file = fopen($tariff_lang, "wb") or die("Unable to open file!");
			$tariff_txt = '<?php ';
			foreach($tariffdata as $key=>$value){
				$tariff_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$tariff_txt .=' ?>';
			fwrite($tariff_file, $tariff_txt);
			fclose($tariff_file);
			
			//deal
			$deal_lang=$location.$folderName.'/'.'deal_lang'.$extension;
			$deal_file = fopen($deal_lang, "wb") or die("Unable to open file!");
			$deal_txt = '<?php ';
			foreach($dealdata as $key=>$value){
				$deal_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$deal_txt .=' ?>';
			fwrite($deal_file, $deal_txt);
			fclose($deal_file);
			
			//offers
			$offer_lang=$location.$folderName.'/'.'offers_lang'.$extension;
			$offer_file = fopen($offer_lang, "wb") or die("Unable to open file!");
			$offer_txt = '<?php ';
			foreach($offersdata as $key=>$value){
				$offer_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$offer_txt .=' ?>';
			fwrite($offer_file, $offer_txt);
			fclose($offer_file);
			
			// chronology popup
			$chronology_lang=$location.$folderName.'/'.'chronologypopup_lang'.$extension;
			$chronology_file = fopen($chronology_lang, "wb") or die("Unable to open file!");
			$chronology_txt = '<?php ';
			foreach($chronologypopupdata as $key=>$value){
				$chronology_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$chronology_txt .=' ?>';
			fwrite($chronology_file, $chronology_txt);
			fclose($chronology_file);
			
			// coupe booking
			$coupebooking_lang=$location.$folderName.'/'.'coupebooking_lang'.$extension;
			$coupebooking_file = fopen($coupebooking_lang, "wb") or die("Unable to open file!");
			$chronology_txt = '<?php ';
			foreach($coupebookingdata as $key=>$value){
				$chronology_txt .='$'.$key.' = "'.$value.'";'."\r\n";
			}
			$chronology_txt .=' ?>';
			fwrite($coupebooking_file, $chronology_txt);
			fclose($coupebooking_file);
			
			
			/* ===end=== for page wamp */
			$result = $this->db->insert('general_languages',$final_data);
			if($result){
				return 1;
			}else{
				return 0;
			}
		}	
	}
	public function get_languages(){
		$this->db->select('general_languages.*,role.rolename');
		$this->db->from('general_languages' );
		$this->db->join('role', 'role.id = general_languages.created_by','left');
		$this->db->group_by("general_languages.id");			
		$query = $this->db->get();
		return $query->result();
	}
	public function get_single_language($id){
		$this->db->where("id",$id);
		$query = $this->db->get("general_languages");
		return $query->row();
	}
	public function delete_language($language_name){
		$this->db->where('name',$language_name);
		$result = $this->db->delete('general_languages');
		if($result){
			return true; 
		}
		else{
			 return false;
		}
	}
}
?>