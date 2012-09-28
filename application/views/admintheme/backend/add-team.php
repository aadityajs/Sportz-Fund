<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allorg); ?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Add Team</h2>
		<form method="post" name="frmAddTeam" >

		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Team Name </th>
				<th>Status</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><input type="text" name="teamname" id="teamname" /> </td>
				<td class="table_title">
					<select name="teamstatus" id="teamstatus">
						<option value="active" selected="selected">Active</option>
						<option value="inactive">Inactive</option>
					</select>
				</td>
				<td class="table_check"><input type="submit" name="teamsubmit" value="Add Team" class="noborder" /></td>
				<!-- <span class="ico_pending">Pending</span> -->
			</tr>

			</tbody>
		</table>
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
