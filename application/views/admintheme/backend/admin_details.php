<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<div id="dashboard">
<h2 class="ico_mug">Dashboard</h2>
<div class="clearfix">
<div class="left quickview">
	<h3>Overview</h3>
	<ul>
	<li>Total Organizatiosns: <span class="number"><?php if($allorg){echo count($allorg);}?></span></li>
	<li>Total Donations: <span class="number"><?php if($alldonation){echo count($alldonation);}?></span></li>
	<li>Total Donations By Cash: <span class="number"><?php if($alldonationcash){echo count($alldonationcash);}?></span></li>
	
	
	</ul>
</div>
<div class="quickview left">
	<h3>Some data</h3>
	<ul>
	<li>Total Teams: <span class="number"><?php if($allteam){echo count($allteam);}?></span></li>
	<li>Total Players: <span class="number"><?php if($allplayer){echo count($allplayer);}?></span></li>
	<li>Total Winners: <span class="number"><?php if($allwinner){echo count($allwinner);}?></span></li>
	
	</ul>
</div>

<!--<div id="chart" class="left">
	<h3>Visits today</h3>
	<div id="placeholder" ></div>
	<a href="#" class="ico_chart more">Click to see more</a>
</div>-->
</div>
</div>




		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
