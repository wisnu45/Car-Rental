<?php $settings = get_homesettings(); ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $settings->title; ?> - <?php echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/<?php echo $this->config->item("theme_color"); ?>.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pace.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/charisma-app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skin-blue.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skin-green-light.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css">	 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/parsley.css"> 	  
  </head>