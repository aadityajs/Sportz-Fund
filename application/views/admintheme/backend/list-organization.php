<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allorg); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Organizations</h2>
		<?php if (!empty($allorg)) { ?>
		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Name </th>
				<th>Username</th>
				<th>Email</th>
				<th>Actions</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($allorg); $i++)
				{
			?>
			<?php //foreach ($allorg as $key=>$val) { ?>
			<?php  //echo $key."=>".$val.'<br/>'; ?>

			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $allorg[$i]['orgname']; ?></td>
				<td class="table_title"><a href="#"><?php echo $allorg[$i]['orgusername']; ?></a></td>
				<td><a href="#"><?php echo $allorg[$i]['email']; ?></a></td>
				<td>
				<a href="<?php echo site_url("admin/organization/status/").'/'.$allorg[$i]['is_approved'].'/'.$allorg[$i]['user_id']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/accept.jpg" alt="accepted"/></a>
				<!--<a href="#"><img src="<?php echo $this->config->item('admin_theme_url')?>img/folder.jpg" alt="folder"/></a>-->
				<!-- <a href="<?php echo site_url("admin/organization/listOrganization/edit/").'/'.$allorg[$i]['user_id']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/edit.jpg" alt="edit"/></a> -->
				<a href="<?php echo site_url("admin/organization/delete/").'/'.$allorg[$i]['user_id']; ?>" onclick="return confirm('Are you sure to delete <?php echo $allorg[$i]['fname'].' '.$allorg[$i]['lname']; ?>?');"><img src="<?php echo $this->config->item('admin_theme_url')?>img/cancel.jpg" alt="cancel"/></a>
				</td>
				<td><span class="approved"><?php echo $allorg[$i]['is_approved'] == 'Y' ? "Approved" : "Discarded"; ?></span></td>
				<!-- <span class="ico_pending">Pending</span> -->
			</tr>
			<?php } ?>

			</tbody>

		</table>
		<?php  } else { echo "No records found!"; } ?>
			<!-- <div id="table_options" class="clearfix">

				<ul>
					<li><a href="#">Select All</a></li>
					<li><a href="#">Select None</a></li>
					<li><label>	Action:<select id="kategoria" name="kategoria">
									<option value="1">Option 1</option>
									<option value="2">Option 2</option>
									<option value="3">Option 3</option>
									<option value="4">Option 4</option>
								</select>
				</label></li>
				</ul>


			</div>
			<div class="pagination">
				<span class="pages">Page 1 of 3&#8201;</span>
				<span class="current">1</span>
				<a href="#" title="2">2</a>
				<a href="#" title="3">3</a>
				<a href="#" >&raquo;</a>
			</div>-->
		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
