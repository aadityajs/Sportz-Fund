<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allwinner); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">MLB Score</h2>
			<?php if (!empty($mlbgamedate)) { ?>
		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Year </th>
				<th>Month </th>
				<th>Day </th>
				<th>Status</th>
				<!--<th>Actions</th>-->
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($mlbgamedate); $i++)
				{
			?>
			<?php //foreach ($allorg as $key=>$val) { ?>
			<?php  //echo $key."=>".$val.'<br/>'; ?>

			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $mlbgamedate[$i]['game_year']; ?></td>
				<td class="table_date"><?php echo $mlbgamedate[$i]['game_month']; ?></td>
				<td class="table_date"><?php echo $mlbgamedate[$i]['game_day']; ?></td>
				
				<td class="table_title"><?php if($mlbgamedate[$i]['is_active']=='active'){ echo 'Completed';}else{ ?> <a href="<?php echo site_url("admin/score/edit/").'/'.$mlbgamedate[$i]['game_id'].'/'.$mlbgamedate[$i]['type']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/ico_chart_bar.png" alt="accepted"/></a><?php }?></td>
				<td><?php //if($mlbgamedate[$i]['is_active']=='active'){ echo 'Completed';}else{ ?> 
				<!--<a href="<?php echo site_url("admin/score/status/").'/'.$mlbgamedate[$i]['is_active'].'/'.$mlbgamedate[$i]['game_id'].'/'.$mlbgamedate[$i]['type']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/accept.jpg" alt="accepted"/></a>--> <?php //} ?>
				<!--<a href="<?php echo site_url("admin/gamedate/delete/").'/'.$mlbgamedate[$i]['game_id'].'/'.$mlbgamedate[$i]['type']; ?>" onclick="return confirm('Are you sure to delete <?php echo $mlbgamedate[$i]['type']; ?>?');"><img src="<?php echo $this->config->item('admin_theme_url')?>img/cancel.jpg" alt="cancel"/></a>
				<a href="<?php echo site_url("admin/gamedate/edit/").'/'.$mlbgamedate[$i]['game_id'].'/'.$mlbgamedate[$i]['type']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/edit.jpg" alt="edit"/></a>-->
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
