	<!--start body-->
<div class="bottom_arrow"></div>
	<div class="clear"></div>
	<div class="containt_box">
	<div class="containt_left">
	<div><h1>SportzFund.com</h1></div>
	<div class="clear"></div>
	<div class="likebg">
	<img src="<?php echo $this->config->item('theme_url'); ?>images/facebook.gif" alt="" width="168" height="42" border="0"/><img src="<?php echo $this->config->item('theme_url'); ?>images/like.gif" alt="" width="73" height="42" border="0"/></div>
	<div class="likebg">
	<img src="<?php echo $this->config->item('theme_url'); ?>images/google.gif" alt="" width="192" height="42" border="0"/></div>
	<div class="likebg" style="height: 76px;"><img src="<?php echo $this->config->item('theme_url'); ?>images/twitter.gif" alt="" width="184" height="42" border="0"/><img src="<?php echo $this->config->item('theme_url'); ?>images/tweet.gif" alt="" width="56" height="62" border="0"/></div>
	</div>
	<div class="containt_mid">
	<div class="fun_mid">
	<div><h1>Donation notify succesful</h1>

	<?php
	$custom = $this->paypal_lib->ipn_data['custom'];
	print_r($custom);
	echo $this->paypal_lib->validate_ipn();
	if ($this->paypal_lib->validate_ipn()) {
			print_r($this->paypal_lib->ipn_data['custom']);
			exit;
		}
	?>

	</div>
	<div class="clear"></div>
	<div style="float: none; margin: 5px auto 0 auto; width: 309px;">

	</div>
	</div>
	</div>

	</div>

		<!--end body-->

