<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allwinner); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Daily Sales</h2>
			
		<table id="table">
		<thead>
			<form name="searchsale" method="post">
			<tr>
			<td>Enter Date(yyyy-mm-dd)</td>
			<td><input type="text" name="searchsale"  value=""/></td>
			<td><input type="submit" name="searchsalesubmit" value="SearchTotalSale" class="noborder" /></td>
			</tr>
			</form>
			
			<?php if (!empty($dailysales)) { ?>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Organization </th>
				<th>Dates </th>
				
				<th>Total Sales </th>
				<th>Payment Card Type</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($dailysales); $i++)
				{
			?>
			<?php //foreach ($allorg as $key=>$val) { ?>
			<?php  //echo $key."=>".$val.'<br/>'; ?>

			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $dailysales[$i]['orgname']; ?></td>
				<td class="table_date"><?php echo $dailysales[$i]['fdate']; ?></td>
				
				<td class="table_date"><?php echo $dailysales[$i]['dn']; ?></td>
				<td class="table_title"><?php echo $dailysales[$i]['card_type']; ?></td>
				
			</tr>
			<?php } ?>

			</tbody><?php  } else { ?> 
			<tr><td>No records found! </td></tr>
			<?php } ?>
		</table>
		
			
		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
