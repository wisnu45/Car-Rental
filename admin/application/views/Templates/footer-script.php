	<?php $api_key = get_homesettings()->apikey;?>
	<script> base_url = "<?php echo base_url(); ?>"; </script>
<!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>	
<!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.js"></script>
<!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/script.js"></script>     
    <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom-script.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/charisma.js"></script>	
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>         		    			 
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.extensions.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=<?php echo $api_key; ?>&libraries=places"></script>	
	<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/parsley.min.js"></script>
    <script>
    $(function () {
        //Initialize Select2 Elements
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
        });
	  }); 	  	 
	function doconfirm()
	{
		job=confirm("Are you sure to delete permanently?");
		 if(job!=true)
		{
			return false;
		}
	}
</script>