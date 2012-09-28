<?php
$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}
?>

<?php //print_r($allOrgList); ?>
<div class="containt_box">
<div class="leftcol">
<div><h1>Find campaigns</h1></div>
<div class="clear"></div>
<div class="find_base_box">

<?php foreach ($allOrgList as $key=>$val) { ?>
<!-- user_id 	orgname 	 	 	 	ein 	 	namecont 	 	phemail 	contactaddress 	phone 	contcitystatezip 	orgusername 	password 	how_did_u_hear 	how_did_u_find_out 	game 	account_type 	activation_code 	temp_password 	is_approved 	is_active 	sex 	mid_initial 	userimage 	about_me 	return_agrmnt 	date 	is_submitted -->
<div class="find_box">
	<div class="img_box"><img src="<?php echo base_url()?>uploads/<?php echo $val['userimage']; ?>" border="0" /><h2><?php echo $val['orgusername']; ?></h2></div>
	<div class="find_user">
		<ul>
			<li><?php echo ucwords($val['fname'].' '.$val['lname']); ?></li>
		    <li><?php echo $val['email']; ?></li>
		</ul>
	</div>
	<div class="clear"></div>
	<div class="find_user_details">
	<div class="by_img"><img src="<?php echo $this->config->item('theme_url')?>images/by_img1.jpg" border="0" /></div>
	<div class="by_txt">
		<ul>
			<li><?php echo $val['address']; ?>,<?php echo $val['citystatezip']; ?></li>
			<li><span>Call: <?php echo $val['phone']; ?></span></li>
		</ul>
	</div>
	</div>
	<div class="clear"></div>
	<div class="progress_bar_box">
		<div class="label_raised">219.4k raised</div>
		<div class="label_goal">250k goal</div>
	<div class="clear"></div>
	</div>
	<div class="button_box1">
		<a href="<?php echo site_url('organization/donate/').'/'.$val['orgname']; ?>">
			<input name="" type="button" value="Donate" class="give_btn"  style="cursor: pointer;" />
		</a>
	</div>
</div>
<?php } ?>


</div>
</div>














