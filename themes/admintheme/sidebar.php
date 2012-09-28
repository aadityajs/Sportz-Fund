<?php if($this->session->userdata('adminid')) {	?>
</div>
<div id="sidebar" class="right">
				<h2 class="ico_mug">Quick Nav</h2>
			<ul id="menu">
				<li>
					<!-- <a href="#" class="ico_posts">Posts</a>
					<ul>
						<li><a href="#">Edit posts</a></li>
						<li><a href="#">Add post</a></li>
						<li><a href="#">Manage posts</a></li>
					</ul> -->
					<a href="#" class="ico_page">Pages</a>
					<ul>
						<li><a href="<?php echo site_url('admin/cms/show'); ?>">Manage pages</a></li>
						<li><a href="<?php echo site_url('admin/cms/add'); ?>">Add page</a></li>
					</ul>
					<a href="#" class="ico_user">Organization</a>
					<ul>
						<li><a href="<?php echo site_url("admin/organization/listOrganization")?>">List</a></li>
					</ul>

					<a href="#" class="ico_page">Game Date</a>
					<ul>
						<li><a href="<?php echo site_url('admin/gamedate/showmlb'); ?>">MLB</a></li>
						<li><a href="<?php echo site_url('admin/gamedate/shownfl'); ?>">NFL</a></li>
						<li><a href="<?php echo site_url('admin/gamedate/add'); ?>">Set Game Date</a></li>
					</ul>
					
					
					<a href="#" class="ico_page">Statistics</a>
					<ul>
						<li><a href="<?php echo site_url('admin/stat/showmlb'); ?>">MLB</a></li>
						<li><a href="<?php echo site_url('admin/stat/shownfl'); ?>">NFL</a></li>
						<!--<li><a href="<?php //echo site_url('admin/stat/shownpts'); ?>">Show Player Points</a></li>-->
						
					</ul>
					
					<a href="#" class="ico_page">Score</a>
					<ul>
						<li><a href="<?php echo site_url('admin/score/showmlb'); ?>">MLB</a></li>
						<li><a href="<?php echo site_url('admin/score/shownfl'); ?>">NFL</a></li>
						
						
					</ul>
					<a href="#" class="ico_page">Group Card</a>
					<ul>
						<li><a href="<?php echo site_url('admin/groupcard/showmlb'); ?>">MLB</a></li>
						<li><a href="<?php echo site_url('admin/groupcard/shownfl'); ?>">NFL</a></li>
						<li><a href="<?php echo site_url('admin/groupcard/add'); ?>">Set Group Card</a></li>
					</ul>
					<a href="#" class="ico_page">Report</a>
					<ul>
						<li><a href="<?php echo site_url('admin/report/showdailysales'); ?>">Daily Sales</a></li>
						<li><a href="<?php echo site_url('admin/report/showwinner'); ?>">Winner</a></li>
						<li><a href="<?php echo site_url('admin/report/showcustomer'); ?>">Customers</a></li>
						<li><a href="<?php echo site_url('admin/report/showinvoice'); ?>">Invoice</a></li>
						<li><a href="<?php echo site_url('admin/report/showbalance'); ?>">Account Balance</a></li>
						<li><a href="<?php echo site_url('admin/report/showemail'); ?>">Email</a></li>
					</ul>


					<a href="#" class="ico_settings">Settings</a>
					<ul>
						<li><a href="#">Site</a></li>
						<li><a href="#">Options</a></li>
					</ul>
				</li>


			</ul>

			</div><!-- end #sidebar -->
		</div><!-- end #content_main -->
<?php } ?>