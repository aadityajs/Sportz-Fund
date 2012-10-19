<?php
$url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
$url = empty($url) ? base_url() : $url;
?>
<!--start body-->
<div class="bottom_arrow"></div>
<?php //print_r($winnerBrodcast); ?>

	<div class="containt_left">
	<div><h1>Like SportzFund.com</h1></div>
	<div class="clear"></div>
	<div class="likebg">
	<img src="<?php echo $this->config->item('theme_url'); ?>images/facebook.gif" alt="" width="168" height="42" border="0"/>

		<div style="float: right;margin: 10px 0 0 0; " class="fb-like" data-href="http://www.facebook.com/" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="lucida grande"></div>

	</div>
	<div class="likebg">
	<img src="<?php echo $this->config->item('theme_url'); ?>images/google.gif" alt="" width="192" height="42" border="0"/></div>
	<div class="likebg" style="height: 56px; padding-top:20px;">
    	<img src="<?php echo $this->config->item('theme_url'); ?>images/twitter.gif" alt="" width="107" height="42" border="0" style="float:left; margin:-15px 30px 0 0px;"/>

		<a style="float: left; margin:0 0px 0 0; width: 90px; display:block;" href="https://twitter.com/share" class="twitter-share-button" data-size="small">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

	</div>
	</div>
	<div class="containt_mid">
	<div class="fun_mid">
	<div><h1>Fundraising Made Fun!</h1></div>
	<div class="clear"></div>

	<?php
	$user_id = $this->session->userdata('userid');
	if (isset($user_id) && !empty($user_id)) { ?>
	<div style="float: none; margin: 5px auto 0 auto; width: 309px;">
	Welcome, <span style="font-size: 14px; font-weight: bold;"><a href="<?php echo site_url('organization/account'); ?>"><?php if(isset($userdetail['fname']) )  {echo $userdetail['fname'].' '.$userdetail['lname'] ; }?></a></span>
	| <a href="<?php echo site_url('organization/account'); ?>">My Account</a>
	<div style="float: right; padding-right: 0px;"><a href="<?php echo site_url('organization/logout'); ?>">Logout</a></div>
	</div>
	<?php } else { ?>
	<div style="float: none; margin: 5px auto 0 auto; width: 309px;"><a href="<?php echo site_url('organization/register'); ?>"><img src="<?php echo $this->config->item('theme_url'); ?>images/start_btn.gif" alt="" width="309" height="51" border="0" /></a></div>
	<?php } ?>

	</div>
	</div>
	<!-- <div class="containt_right">
	<div><h1>What Donar says</h1></div>
	<div class="clear"></div>
	<div><p><img src="<?php echo $this->config->item('theme_url'); ?>images/comma.gif" alt="" width="21" height="19" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adipiscing elit, sed diam nonummy nibh.<img src="<?php echo $this->config->item('theme_url'); ?>images/comma1.gif" alt="" width="21" height="19" /></p></div>
	<div class="clear"></div>
	<div style="width: 217px; float:none; margin: 30px auto;"><span style="font-style: italic; float: left;">Andrea Florian<br/><span style="color: #686868; font-size: 12px; font-style: italic;">Royal Lepage</span></span><span style="margin: 0 0 0 10px;"><img src="<?php echo $this->config->item('theme_url'); ?>images/pic4.png" alt="" width="72" height="70" border="0"/></span></div>
	</div>
	</div> -->



<!--end body-->

