<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($balancecom); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Balances</h2>
				<?php if (!empty($balancedue) || !empty($balancecom)) { ?>
				
				<?php //print_r($invoice); ?>
		<table id="table">
		<thead>
		
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Period </th>
				<th>Organization </th>
				
				<th>Payment Type</th>
				<th>Balance Due</th>
				<th>Balance Complete</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($balancedue); $i++)
				{
			?>
		
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $balancedue[$i]['invoice_from']; echo ' to'; echo '<br>'; echo $balancedue[$i]['invoice_to'];?></td>
				<td class="table_date"><?php echo $balancedue[$i]['org']; ?></td>
				
				
				
				<td class="table_title"><?php if($balancedue[$i]['pay_type']=='paypalPayment'){ echo 'Paypal'; } ?></td>
				<td class="table_date"><?php echo $balancedue[$i]['due']; ?></td>
				
			
			<?php } ?>
			<?php
				for($j=0; $j<count($balancecom); $j++)
				{
				$val=$balancecom[$j]['com'];
				?>
				<td class="table_date"><?php echo $balancecom[$j]['com']; ?></td>
				<?php
				}
				
				?>
			</tr>
			</tbody><?php  } else { ?> 
			<tr><td>No records found! </td></tr>
			<?php } ?>
		</table>
		
			
		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
