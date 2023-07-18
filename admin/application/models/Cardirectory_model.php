<?php 
class Cardirectory_model extends CI_Model {
	public function _construct(){
		parent::__construct();
 	}
/* === View Cardirectory === */
	function get_directory()
	{
		$this->db->select('car_listing.*,dealers.first_name,car_showroom.name');		
		$this->db->from('car_listing');
		$this->db->join('dealers', 'dealers.id = car_listing.dealer_id','left');					
	    $this->db->join('car_showroom', 'car_showroom.id   = car_listing.showroom_id','left');	
		$query = $this->db->get();
		$result = $query->result();
		return $result;			
	}
/* === Add Cardirectory=== */	
	function add_directory($data)
	{
		$array = $data['car_features']; 
		$comma_separated = implode(",", $array); 
		$data['car_features']=$comma_separated;
		$result = $this->db->insert('car_listing',$data);
		return $result;
	}
/* === Update Cardirectory status=== */	
	 function update_directory_status($data,$data1){
		$this->db->where('id',$data);
		$result = $this->db->update('car_listing',$data1);
		return $result;
    }
/* === Get Cardirectory=== */	
	public function get_single_directory($id){
		$query = $this->db->where('id',$id);
		$query = $this->db->get('car_listing');
	    $result = $query->row();
	    return $result;
	}
/* === Edit Cardirectory=== */		
	 function directorydetails_edit($id,$data){
		$array = $data['car_features']; 
		$comma_separated = implode(",", $array); 
		$data['car_features']=$comma_separated;
		$this->db->where('id', $id);
	    $result = $this->db->update('car_listing', $data);
	    return $result;
	 }
/* === Delete Cardirectory=== */
	public function deletedirectory($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('car_listing');
		if($result){
			return "success"; 
		}
		else{
			 return "error";
		}
	 }
/* === Add Gallery=== */
	    public function add_gallery($data = array()){
        $insert = $this->db->insert_batch('car_gallery',$data);
        return $insert?true:false;
    }
/* === Get list=== */
	function get_list()
	{
		$query = $this->db->get('car_listing');
		$result = $query->result();
		return $result;	
	}
/* === Get Gallery=== */
	function get_gallery()
	{
		$this->db->select('car_gallery.id,car_listing.id as id1, car_listing.model,car_listing.car_name, count(car_gallery.id) as total_images');
		$this->db->from('car_gallery');
		$this->db->join('car_listing', 'car_listing.id = car_gallery.listing_id','left');
		$this->db->group_by("car_gallery.listing_id");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
/* === Get Gallery By id=== */
	 function get_car_gallery($id)
	 {   
		$this->db->select('car_gallery.id, car_gallery.picture,car_listing.car_name');
		$this->db->from('car_gallery');
	    $this->db->join('car_listing', 'car_listing.id = car_gallery.listing_id','left');
	    $this->db->where('car_gallery.listing_id', $id);		
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	 }
/* ===Delete Car Gallery=== */
	 function cargallery_delete($id)
	 {
		 $this->db->where('id', $id);
		 $result = $this->db->delete('car_gallery'); 
		 if($result) {
		 return "Success";
		 }
		else {
        	 return "Error";
		 }
	 }
 /* ===Get Master Tables=== */
	function get($tblname)
	{
		$query = $this->db->get($tblname);
		$result = $query->result();
		return $result;		
	}
	/* === Get SHOWROOM=== */
	function gets_showroom($id)
	 {
		 $this->db->where('dealer_id',$id);
		 $query = $this->db->get('car_showroom');
		 $result = $query->result();
		 return $result;
	 }
	 /* === Get Car-make-model === */
	 function  get_carmakemodel($make_id){
		 $this->db->where('make_id',$make_id);
		 $query = $this->db->get('car_model');
		 $result = $query->result();
		 return $result;
	 }

}
?>