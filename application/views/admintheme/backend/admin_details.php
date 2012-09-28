<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<div id="dashboard">
<h2 class="ico_mug">Dashboard</h2>
<div class="clearfix">
<div class="left quickview">
	<h3>Overview</h3>
	<ul>
	<li>Total Posts: <span class="number">15</span></li>
	<li>Total Comments: <span class="number">340</span></li>
	<li>Drafts: <span class="number">3</span></li>
	<li>Things to do: <span class="number">3</span></li>
	<li>Comments waiting for aproval: <span class="number">20</span></li>
	<li>Visits Today: <span class="number">230</span></li>
	</ul>
</div>
<div class="quickview left">
	<h3>Some data</h3>
	<ul>
	<li>Users online: <span class="number">15</span></li>
	<li>Trafic increase: <span class="number">34%</span></li>
	<li>Photos: <span class="number">3</span></li>
	<li>Things to do: <span class="number">3</span></li>
	<li>Photos waiting for aproval: <span class="number">31</span></li>
	<li>Visits Today: <span class="number">230</span></li>
	</ul>
</div>
<div id="chart" class="left">
	<h3>Visits today</h3>
	<div id="placeholder" ></div><!-- CHART -->
	<a href="#" class="ico_chart more">Click to see more</a>
</div>
</div>
</div>




		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
