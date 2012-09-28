<?php
$url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
$url = empty($url) ? base_url() : $url;
?>
</div></div>
<?php
if (site_url($url) == site_url()) {
?>

<div class="clear"></div>
	<div class="center_align" style="margin: 10px auto 0 auto;"><img src="<?php echo $this->config->item('theme_url'); ?>images/winner.gif" alt="" width="440" height="29" /></div>
	<div class="clear"></div>
	<div class="bottom_bg"><p>Mike L from Pittsburg, PA - $25, Mike L from Pittsburg, PA - $25, Mike L from Pittsburg, PA - $25, Mike L from Pittsburg, PA - $25, Mike L from Pittsburg</p></div>
<?php } ?>


</div>	<!-- main container ends -->
<div class="clear"></div>
<div id="footerbg">
<div class="footer">
<div class="footer_link" style="width: 220px;">
          <h1>Quick Links</h1>
          <ul>
            <li><a href="<?php echo site_url('organization/login'); ?>">Start a Campaign</a></li>
			<li><a href="<?php if ($this->session->userdata('userid') == '') { echo site_url('organization/login'); } else { site_url('organization/account'); } ?>">Fundraisers</a></li>
			<li><a href="<?php echo site_url('pages/program_highlights'); ?>">Program Highlights</a></li>
			<li><a href="<?php echo site_url('pages/contact_us'); ?>">Contact Us</a></li>
			<li><a href="<?php echo site_url('pages/did_i_win'); ?>">Did I win?</a></li>
          </ul>
       </div>
	   	<div class="footer_link" style="width: 250px;">
          <h1>About Company</h1>
          <ul>
            <li><a href="<?php echo site_url('pages/about_us'); ?>">About Us</a></li>
			<li><a href="<?php echo site_url('pages/why_sportzfund'); ?>">Why Sportzfund</a></li>
			<li><a href="<?php echo site_url('pages/testimonial'); ?>">Testimonials</a></li>
			<li><a href="<?php echo site_url('pages/faq'); ?>">FAQ</a></li>
			<li><a href="<?php echo site_url('pages/privacy_policy'); ?>">Privacy Policy</a></li>
          </ul>
       </div>
	   <div class="footer_link" style="width: 230px;">
          <h1>Support</h1>
          <ul>
            <li><a href="<?php echo site_url('pages/help'); ?>">Help</a></li>
			<li><a href="<?php echo site_url('pages/how_it_works'); ?>">How It Works</a></li>
			<li><a href="<?php echo site_url('pages/customer_support'); ?>">Customer Support</a></li>
			<li><a href="<?php echo site_url('pages/site_rules'); ?>">Site Rules</a></li>
			<li><a href="<?php echo site_url('pages/terms_conditions'); ?>">Terms & Conditions</a></li>
          </ul>
       </div>
		<div class="footer_link2">
          <h1>Join Us</h1>
          <ul>
           <li><img src="<?php echo $this->config->item('theme_url')?>images/facebook.png" alt="" width="31" height="32" align="absmiddle" /><span>Connect with Facebook</span></li>
           <li><img src="<?php echo $this->config->item('theme_url')?>images/you_tube.png" alt="" width="31" height="32" align="absmiddle" /><span>Watch us on Youtube</span></li>
           <li><img src="<?php echo $this->config->item('theme_url')?>images/twitter.png" alt="" width="31" height="32" align="absmiddle" /><span>Follow us on Youtube</span></li>
	       <li><img src="<?php echo $this->config->item('theme_url')?>images/google.png" alt="" width="31" height="32" align="absmiddle" /><span>Find us on Pinterest</span></li>
		  </ul>
			</div>
			<div class="clear"></div>
			<div style="float: none; width: 370px; margin: 36px auto 0 auto;"><span>&copy; Copyright 2012 SportxFund.com. all right reserved</span></div>
</div>
</div>
</body>
</html>
