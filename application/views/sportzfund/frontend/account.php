<?php
$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}
?>
<script type="text/javascript">


$(document).ready(function() {
	$("div#regStep2").hide();
	$("div#regStep3").hide();

	$("#moveNextPage").click(function(){
		$("div#regStep1").slideUp();
		$("div#regStep2").slideDown();
		$("a#bredRegStep1").removeClass('here');
		$("a#bredRegStep2").addClass('here');

		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

	$("#regCont").click(function(){
		$("div#regStep2").slideUp();
		$("div#regStep3").slideDown();
		$("a#bredRegStep2").removeClass('here');
		$("a#bredRegStep3").addClass('here');
		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

});





</script>

<div class="containt_box">

<div class="leftcol">
<?php //print_r($userdetail); ?>
<h4 style="float: right; padding-right: 30px;"><a href="<?php echo site_url('organization/logout'); ?>">Logout</a></h4>
<div>
	<h1>Welcome, <span style="font-size: 14px; font-weight: bold;"><a href="<?php echo site_url('organization/account'); ?>"><?php echo $userdetail['fname'].' '.$userdetail['lname'] ; ?></a></span></h1>

	</div>
<div class="clear"></div>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>What would you like to do?</h1></td>
    </tr>

	<tr>
      <td>
	  <div class="like_to_bg">
	  <div class="like_to1">
	  <div class="like_to">
	  <ul>
	  	<li><div class="img"><a href="<?php echo site_url('organization/ordercard'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img1.png" border="0" /></a></div><div><p><a href="<?php echo site_url('organization/ordercard'); ?>">Order hard copy fundraising cards </a></p></div>
	  	</li>
		<li><div class="img"><a href="<?php echo site_url('organization/editProfile'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img2.png" border="0" /></a></div><div><p><a href="<?php echo site_url('organization/editProfile'); ?>">Change address,POC, email, etc. </a></p></div>
		</li>
		<li><div class="img"><a href="<?php echo site_url('organization/hardcopy'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img3.png" border="0" /></a></div><div><p><a href="<?php echo site_url('organization/hardcopy'); ?>">Activate hard copy cards. </a></p></div>
		</li>
		<li><div class="img"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img4.png" border="0" /></a></div><div><p><a href="<?php echo site_url('pages/tips_tricks'); ?>">Tips, Forms and guidance to make your fundraiser a huge success </a></p></div>
		</li>
		<li><div class="img"><a href="<?php echo site_url('organization/finance'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img5.png" border="0" /></a></div><div><p><a href="<?php echo site_url('organization/finance'); ?>">Check revenue generated, pending invoices, etc. </a></p></div>
		</li>
		<li><div class="img"><a href="<?php echo site_url('pages/contact_us'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img6.png" border="0" /></a></div><div><p><a href="<?php echo site_url('pages/contact_us'); ?>">Contact us with any questions, problems, issues, or concerns.  We are always here for you! </a></p></div>
		</li>
		<li><div class="img"><a href="<?php echo site_url('organization/testimonial'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img7.png" border="0" /></a></div><div><p><a href="<?php echo site_url('organization/testimonial'); ?>">Please leave us a testimonial for your successful fundraiser! </a></p></div>
		</li>
		<li><div class="img"><a href="<?php echo site_url('organization/cashpaying'); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/like_to_img8.png" border="0" /></a></div><div><p><a href="<?php echo site_url('organization/cashpaying'); ?>">Activate and register a cash paying customer </a></p></div>
		</li>
		</ul>
		<div class="clear"></div>
	  </div>
	  <div class="clear"></div>
	  </div>
	  <div class="clear"></div>
	  </div>
	 </td>
    </tr>
    </tr>
    <tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>

    <tr>
    <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</div>


</div>














