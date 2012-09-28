<?php
$url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
$url = empty($url) ? base_url() : $url;
preg_match('/^[a-zA-Z].*/', $this->uri->segment(2), $match);
preg_match('/^[a-zA-Z].*/', $this->uri->segment(3), $orgControllerMatch);
if (!empty($match))
$orgControllerPages = $match[0];
if (!empty($orgControllerMatch))
$orgControllerDonatePages = $orgControllerMatch[0];
if (
	//site_url($url) != site_url('organization/register') &&
	//site_url($url) != site_url('organization/login') &&
	//site_url($url) != site_url('organization/account') &&
	//site_url($url) != site_url('organization/ordercard') &&
	//site_url($url) != site_url('organization/ordersuccess')&&
	site_url($url) != site_url('fundraiser')&&
	site_url($url) != site_url('pages/why_sportzfund')&&
	site_url($url) != site_url('pages/how_it_works')&&
	site_url($url) != site_url('pages/program_highlights')&&
	site_url($url) != site_url('pages/did_i_win')&&
	site_url($url) != site_url('pages/contact_us')&&
	site_url($url) != site_url('pages/testimonial')&&
	site_url($url) != site_url('pages/faq')&&
	site_url($url) != site_url('pages/tips_tricks')&&
	site_url($url) != site_url('pages/about_us')&&
	site_url($url) != site_url('pages/privacy_policy')&&
	site_url($url) != site_url('pages/help')&&
	site_url($url) != site_url('pages/site_rules')&&
	site_url($url) != site_url('pages/terms_conditions')&&
	site_url($url) != site_url('pages/customer_support') &&
	site_url($url) != site_url('organization/'.(!empty($orgControllerPages) ? $orgControllerPages : '')) &&
	site_url($url) != site_url('organization/donate/'.(!empty($orgControllerDonatePages) ? $orgControllerDonatePages : ''))
	) {
?>

<div id="bannerbg">
<div class="banner">
<div class="price_quote">
<p id="totalDonation">$87,114</p>
</div>
<div class="clear"></div>
<div class="price_bg"><p>Amount of money raised for organizations</p></div>
<div class="clear"></div>


<div class="stepbg">
<div class="getaquote">
<div><img src="<?php echo $this->config->item('theme_url')?>images/pic.png" alt="" width="93" height="92" border="0"/></div>
<div><span>Step-1</span></div>
<div><h1>REGISTRATION</h1></div>
<div style="width: 150px; float: none; margin: 17px auto;"><p>Register for a Campaign and let us do the work!</p></div>
</div>
<div class="getaquote">
<div><img src="<?php echo $this->config->item('theme_url')?>images/pic1.png" alt="" width="115" height="90" border="0"/></div>
<div><span>Step-2</span></div>
<div><h1>Share</h1></div>
<div style="width: 150px; float: none; margin: 17px auto;"><p>Simply share the fundraiser with  your organization</p></div>
</div>
<div class="getaquote">
<div><img src="<?php echo $this->config->item('theme_url')?>images/pic2.png" alt="" width="96" height="92" border="0"/></div>
<div><span>Step-3</span></div>
<div><h1>thank donors</h1></div>
<div style="width: 150px; float: none; margin: 17px auto;"><p>We thank your donators</p></div>
</div>
<div class="getaquote" style="margin-right:0;">
<div><img src="<?php echo $this->config->item('theme_url')?>images/pic3.png" alt="" width="103" height="105" border="0"/></div>
<div><span>Step-4</span></div>
<div><h1>Collect Profits</h1></div>
<div style="width: 150px; float: none; margin: 17px auto;"><p>Track your campaign results live with Sportzfund </p></div>
</div>
</div>


</div>
</div>
<?php } ?>
<div class="clear"></div>
<div id="maincontainer">


	<div class="clear"></div>
	<div class="containt_box">