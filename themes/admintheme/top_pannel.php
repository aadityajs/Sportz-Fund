<?php if($this->session->userdata('adminid')) {	?>
<div id="top_menu" class="clearfix">
	    	<ul class="sf-menu"> <!-- DROPDOWN MENU -->
			<li>
				<a href="<?php echo site_url("admin")?>">Dashboard</a>
			</li>

			<li class="current">
				<a href="#a">Donation</a><!-- First level MENU -->
				<ul>
					<li><a href="<?php echo site_url("admin/donation/show")?>">List</a></li>
					<li><a href="<?php echo site_url("admin/donation/showCashPaying")?>">Cash Paying List</a></li>
				</ul>
			</li>

			<li>
				<a href="#a">Load Assign & Activate Players</a><!-- First level MENU -->
				<ul>
					<li><a href="<?php echo site_url("admin/player/show")?>">Active and Assign Players</a></li>
					<li><a href="<?php echo site_url("admin/player/listbygroup")?>">List Active Players by Group</a>
					</li>
					<li><a href="<?php echo site_url("admin/player/add")?>">Add Players</a></li>
				</ul>
			</li>

			<li>
				<a href="#a">Teams</a><!-- First level MENU -->
				<ul>
					<li><a href="<?php echo site_url("admin/team/show")?>">Manage Team</a></li>
					<li><a href="<?php echo site_url("admin/team/add")?>">Add Team</a></li>
				</ul>
			</li>

			<li class="current">
				<a href="#a">Define Winners</a><!-- First level MENU -->
				<ul>
					<li><a href="<?php echo site_url("admin/winner/show")?>">Winners</a></li>
					<li><a href="<?php echo site_url("admin/winner/add")?>">Add winner</a></li>
				</ul>
			</li>

			<li class="current">
				<a href="#a">Assign periods</a><!-- First level MENU -->
				<ul>
					<li><a href="<?php echo site_url("admin/scoringperiod/showmlb")?>">MLB</a></li>
					<li><a href="<?php echo site_url("admin/scoringperiod/shownfl")?>">NFL</a></li>
					<li><a href="<?php echo site_url("admin/scoringperiod/add")?>">Add scoring period</a></li>
				</ul>
			</li>


			<!-- <li>
				<a href="#a">Administration</a>
				<ul>
					<li><a href="">Manage Admins</a></li>
					<li><a href="">Add Admin</a></li>
				</ul>
			</li> -->

<?php /* <li class="current">
				<a href="#a">Settings</a><!-- First level MENU -->
				<ul>
					<li>
						<a href="#aa">Database options</a>
					</li>
					<li class="current">
						<a href="#ab">Blog settings</a> <!-- Second level MENU -->
						<ul>
							<li class="current"><a href="#">Settings</a></li>
							<li><a href="#aba">menu item</a></li>
							<li><a href="#abb">menu item</a></li>
							<li><a href="#abc">menu item</a></li>
							<li><a href="#abd">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Menu Options</a> <!-- Third level MENU -->
						<ul>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Editor</a>
						<ul>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li>
				<a href="#">Some option</a>
			</li>

			<li>
				<a href="#">Post edit</a>
				<ul>
					<li>
						<a href="#">menu item</a>
						<ul>
							<li><a href="#">short</a></li>
							<li><a href="#">short</a></li>
							<li><a href="#">short</a></li>
							<li><a href="#">short</a></li>
							<li><a href="#">short</a></li>
						</ul>
					</li>
					<li>
						<a href="#">menu item</a>
						<ul>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="#">menu item</a>
						<ul>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="#">menu item</a>
						<ul>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="#">menu item</a>
						<ul>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
							<li><a href="#">menu item</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Some option</a>
			</li> */ ?>


		</ul>
			<a href="<?php echo site_url("/")?>" id="visit" class="right"><?php echo $this->config->item('site_title'); ?></a>
	    </div>

	    <div id="content_main" class="clearfix">
			<div id="main_panel_container" class="left">
<?php } ?>

