<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //echo '<pre>'.print_r($allTeams, true).'</pre>'; ?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug"><?php echo ($this->uri->segment(3) == 'edit' ? 'Edit' : 'Add'); ?> Content Page</h2>
		<form method="post" name="frmAddPage" >

		<table id="table">
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date">
				<b>Page Title/Name </b>
					<input type="text" name="page_title" id="page_title" value="<?php echo (!empty($editPlayer) ? $editPlayer['player_name'] : ""); ?>" /> </td>
				<!-- <span class="ico_pending">Pending</span> -->
			</tr>

			<tr>
				<td>
				<b>Content </b>
				<textarea rows="6" cols="50" name="content" id="content"><?php echo (!empty($editPlayer) ? $editPlayer['player_group'] : ""); ?></textarea>
				</td>
			</tr>

			<tr>
				<td class="table_title">
				<b>Status</b>
					<select name="is_active" id="is_active">
						<option value="active" selected="selected">Active</option>
						<option value="inactive">Inactive</option>
					</select>
				</td>
			</tr>

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
