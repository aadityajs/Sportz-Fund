<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allwinner); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Invoice PeriodWise</h2>
				<?php if (!empty($invoice)) { ?>
				
				<?php //print_r($invoice); ?>
		<table id="table">
		<thead>
		
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>Period </th>
				<th>Organization </th>
				<th>Gross Sales</th>
				<th>Payment Type</th>
				<th>Status</th>
				<th>Actions</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($invoice); $i++)
				{
			?>
			<?php //foreach ($allorg as $key=>$val) { ?>
			<?php  //echo $key."=>".$val.'<br/>'; ?>

			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $invoice[$i]['invoice_from']; echo ' to'; echo '<br>'; echo $invoice[$i]['invoice_to'];?></td>
				<td class="table_date"><?php echo $invoice[$i]['org']; ?></td>
				
				<td class="table_date"><?php echo $invoice[$i]['dn']; ?></td>
				
				<td class="table_title"><?php if($invoice[$i]['pay_type']=='paypalPayment'){ echo 'Paypal'; } ?></td>
				<td class="table_date"><?php echo $invoice[$i]['status']; ?></td>
				<td class="table_date"><a href="<?php echo site_url("admin/report/status/").'/'.$invoice[$i]['status'].'/'.$invoice[$i]['invoice_date']; ?>"><img src="<?php echo $this->config->item('admin_theme_url')?>img/accept.jpg" alt="accepted"/></a></td>
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
