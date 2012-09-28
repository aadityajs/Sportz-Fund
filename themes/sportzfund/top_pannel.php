<div id="header">
<div class="header_bg">
<div class="header_left"><a href="<?php echo site_url(); ?>"><img src="<?php echo $this->config->item('theme_url')?>images/logo.gif" alt="" width="272" height="99" border="0"/></a></div>
<div class="header_right"><img src="<?php echo $this->config->item('theme_url')?>images/top_banner.jpg" alt="" width="480" height="76" border="0"/></div>
<div class="clear"></div>
<div id="navigation">
<ul>
<li>
	<?php $user_id = $this->session->userdata('userid');
		if (isset($user_id) && !empty($user_id)) {
	?>
	<a href="<?php echo site_url('organization/account'); ?>">My Account</a>
	<?php } else { ?>
	<a href="<?php echo site_url('organization/login'); ?>">Start a Campaign</a>
	<?php } ?>
</li>
<li><a href="<?php echo site_url('pages/why_sportzfund'); ?>">Why Sportzfund</a></li>
<li><a href="<?php echo site_url('pages/how_it_works'); ?>">How it Works</a></li>
<li>
<a href="<?php echo site_url('fundraiser/'); ?>">Fundraisers</a>
</li>
<li><a href="<?php echo site_url('pages/program_highlights'); ?>">Program Highlights</a></li>
<li><a href="<?php echo site_url('pages/faq'); ?>">FAQ</a></li>
<li><a href="<?php echo site_url('pages/testimonial'); ?>">Testimonials</a></li>
<li><a href="<?php echo site_url('pages/contact_us'); ?>">Contact Us</a></li>
<li><a href="<?php echo site_url('pages/did_i_win'); ?>">Did I win?</a></li>
</ul>
</div>
</div>
</div>
<div class="clear"></div>