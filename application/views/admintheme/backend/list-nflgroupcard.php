<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($mlbgamedate); exit;?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">NFL Group Card</h2>
			<?php if (!empty($nflgamedate)) { ?>
		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Organization </th>
				<th>No of Cards </th>
				<th>Group </th>
				<th>Period</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($nflgamedate); $i++)
				{
			?>
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $nflgamedate[$i]['group_org']; ?></td>
				<td class="table_date"><?php echo $nflgamedate[$i]['no_cards']; ?></td>
				<td class="table_date"><?php echo $nflgamedate[$i]['group']; ?></td>
				<td class="table_date"><?php echo $nflgamedate[$i]['group_card_period']; ?></td>
				
				
				<td>
				<a href="<?php echo site_url("admin/groupcard/delete/").'/'.$nflgamedate[$i]['group_card_id'].'/'.$nflgamedate[$i]['group_card_type']; ?>" onclick="return confirm('Are you sure to delete ?');"><img src="<?php echo $this->config->item('admin_theme_url')?>img/cancel.jpg" alt="cancel"/></a>
				
				</td>
			
			</tr>
			<?php } ?>

			</tbody>
		</table>
		<?php  } else { echo "No records found!"; } ?>
			
		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
