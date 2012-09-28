<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //echo '<pre>'.print_r($allTeams, true).'</pre>'; ?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Add Player</h2>
		<form method="post" name="frmAddPlayer" >

		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Player Name </th>
				<th>Group Name </th>
				<th>Team </th>
				<th>Status</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><input type="text" name="player_name" id="player_name" value="<?php echo (!empty($editPlayer) ? $editPlayer['player_name'] : ""); ?>" /> </td>
				<td class="table_date"><input type="text" name="player_group" id="player_group" value="<?php echo (!empty($editPlayer) ? $editPlayer['player_group'] : ""); ?>"/> </td>
				<td class="table_date">
					<select name="player_team" id="player_team">
						<?php for($i=0; $i<count($allTeams); $i++) {
							echo '<option value="'.$allTeams[$i]['team_name'].'">'.$allTeams[$i]['team_name'].'</option>';
						}
						?>
					</select>
				</td>
				<td class="table_title">
					<select name="player_status" id="player_status">
						<option value="active" selected="selected">Active</option>
						<option value="inactive">Inactive</option>
					</select>
				</td>
				<td class="table_check"></td>
				<!-- <span class="ico_pending">Pending</span> -->
			</tr>

			</tbody>
		</table>

		<input type="submit" name="playerubmit" value="<?php echo ($this->uri->segment(3) == 'edit' ? 'Save' : 'Add'); ?> Player" class="noborder" />
		</form>
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
