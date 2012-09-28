<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allwinnersearch); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Winners</h2>
			<?php 
			
			
			if (!empty($allwinner) ) { ?>
		<table id="table">
			<thead>
			<form name="searchwinner" method="post">
			<tr>
			<td> Date(dd/mm/yyyy)</td>
			<td><input type="text" name="searchwinner"  value=""/></td>
			<td><input type="submit" name="searchwinnersubmit" value="SearchWinner" class="noborder" /></td>
			</tr>
			</form>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Winner Name </th>
				<th>Winner Period </th>
				<th>Winner Day </th>
				<th>Coupon </th>
				<th>Prize ($)</th>
				<th>Status</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
			if (!empty($allwinner))
			{
				for($i=0; $i<count($allwinner); $i++)
				{
			?>
		
			<tr>
				
				<td class="table_date"><?php echo $allwinner[$i]['winner_name']; ?></td>
				<td class="table_date"><?php echo $allwinner[$i]['win_period']; ?></td>
				<td class="table_date"><?php echo $allwinner[$i]['win_day']; ?></td>
				<td class="table_date"><?php echo $allwinner[$i]['winner_coupon']; ?></td>
				<td class="table_date"><?php echo $allwinner[$i]['winner_prize']; ?></td>
				<td class="table_title"><?php echo ucfirst($allwinner[$i]['is_active']); ?></td>
							</tr>
			<?php } }
			/*else if(!empty($allwinnersearch))
			{
				for($j=0; $j<count($allwinnersearch); $j++)
				{
			?>
		
			<tr>
				
				<td class="table_date"><?php echo $allwinnersearch[$j]['winner_name']; ?></td>
				<td class="table_date"><?php echo $allwinnersearch[$j]['win_period']; ?></td>
				<td class="table_date"><?php echo $allwinnersearch[$j]['win_day']; ?></td>
				<td class="table_date"><?php echo $allwinnersearch[$j]['winner_coupon']; ?></td>
				<td class="table_date"><?php echo $allwinnersearch[$j]['winner_prize']; ?></td>
				<td class="table_title"><?php echo ucfirst($allwinnersearch[$j]['is_active']); ?></td>
							</tr>
			<?php }
			}*/
			?>

			</tbody>
		</table>
		<?php  } else { echo "No records found!"; } ?>
		
		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
