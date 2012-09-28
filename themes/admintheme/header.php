<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control - SportzFund.com</title>
	<meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->item('admin_theme_url')?>css/style.css" />
	<link rel="Stylesheet" type="text/css" href="<?php echo $this->config->item('admin_theme_url')?>css/smoothness/jquery-ui-1.7.1.custom.css"  />
	<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('admin_theme_url')?>markitup/skins/markitup/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('admin_theme_url')?>markitup/sets/default/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('admin_theme_url')?>css/superfish.css" media="screen">
	<!--[if IE]>
		<style type="text/css">
		  .clearfix {
		    zoom: 1;     /* triggers hasLayout */
		    display: block;     /* resets display for IE/Win */
		    }  /* Only IE can see inside the conditional comment
		    and read this CSS rule. Don't ever use a normal HTML
		    comment inside the CC or it will close prematurely. */
		</style>
	<![endif]-->
	<!-- JavaScript -->
    <script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/jquery-ui-1.7.1.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/hoverIntent.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/superfish.js"></script>
	<script type="text/javascript">
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

	</script>
	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/excanvas.pack.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/jquery.flot.pack.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>markitup/jquery.markitup.pack.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>markitup/sets/default/set.js"></script>
  	<script type="text/javascript" src="<?php echo $this->config->item('admin_theme_url')?>js/custom.js"></script>

	 <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
</head>
<body>
<div class="container" id="container">
	<?php if($this->session->userdata('adminid')) {	?>
    <div  id="header">
    	<div id="profile_info">
    		<?php  if($admindetail['admin_image']) { ?>
				<img src="<?php echo site_url()?>uploads/<?=$admindetail['admin_image']?>" alt="" width="40" height="50"  style="vertical-align: top; border:0; margin: 5px 5px;">
			<?php  } else { ?>
				<img src="<?php echo $this->config->item('admin_theme_url')?>img/avatar.jpg" id="avatar" alt="avatar" />
			<?php } ?>

			<p>Welcome <strong><?=$admindetail['admin_fname']?></strong>. <a href="#" onclick="location.href='<?php echo site_url("/admin/index/logout")?>'">Log out?</a></p>
			<p><?=$admindetail['admin_email']?></p>
			<!-- <p>System messages: 3. <a href="#">Read?</a></p>
			<p class="last_login">Last login: 21:03 12.05.2009</p>-->
		</div>
		<div id="logo"><h1><a href="<?php echo site_url("/admin/index/home")?>">Admin Control</a></h1></div>

    </div><!-- end header -->
	    <div id="content" >
	<?php } ?>
