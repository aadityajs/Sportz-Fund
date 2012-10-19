<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($alldonation); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">All Donations by Cash</h2>
			<?php if (!empty($alldonation)) { ?>
		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Org Name </th>
				<th>By </th>
				<th>Email </th>
				<th>Support to</th>
				<th>Amt.($)</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($alldonation); $i++)
				{
			?>
			<?php //foreach ($allorg as $key=>$val) { ?>
			<?php  //echo $key."=>".$val.'<br/>'; ?>

			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $alldonation[$i]['orgname']; ?></td>
				<td class="table_date"><?php echo $alldonation[$i]['fname'].' '.$alldonation[$i]['lname']; ?></td>
				<td class="table_date"><?php echo $alldonation[$i]['email']; ?></td>
				<td class="table_title"><?php echo ucfirst($alldonation[$i]['supportedname']); ?></td>
				<td class="table_title"><?php echo ucfirst($alldonation[$i]['donation']); ?></td>
				<td class="table_title"><?php echo ucfirst($alldonation[$i]['is_active']); ?></td>
				<td>
				<a href="<?php echo site_url("admin/donation/status/").'/'.$alldonation[$i]['is_active'].'/'.$alldonation[$i]['don_id'].'/cash'; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/accept.jpg" alt="accepted"/></a>
				<!-- --><a href="<?php echo site_url("admin/donation/delete/").'/'.$alldonation[$i]['don_id'].'/cash'; ?>" onclick="return confirm('Are you sure to delete <?php echo $alldonation[$i]['orgname']; ?>?');"><img src="<?php echo $this->config->item('admin_theme_url')?>img/cancel.jpg" alt="cancel"/></a>
				<!-- <a href="#"><img src="<?php echo $this->config->item('admin_theme_url')?>img/folder.jpg" alt="folder"/></a>
				<a href="<?php echo site_url("admin/donation/edit/").'/'.$alldonation[$i]['player_id']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/edit.jpg" alt="edit"/></a>-->
				</td>
				<!--<td><span class="approved">Approved</span></td>
				 <span class="ico_pending">Pending</span> -->
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
