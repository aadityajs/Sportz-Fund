<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($allwinner); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Customer</h2>
				<?php if (!empty($cust)) { ?>
		<table id="table">
		<thead>
			<form name="searchsale" method="post">
			<tr><td>FirstName: </td><td><input type="text" name="searchfname"  value=""/></td>
			
			
			<td>LastName: </td><td><input type="text" name="searchlname"  value=""/></td>
			</tr>
			<tr>
			<td><input type="submit" name="searchnamesubmit" value="SearchName" class="noborder" /></td>
			</tr>
			</form>
			
		
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<th>First Name </th>
				<th>Last Name </th>
				
				<th>Organization </th>
				<th>Email</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0; $i<count($cust); $i++)
				{
			?>
			<?php //foreach ($allorg as $key=>$val) { ?>
			<?php  //echo $key."=>".$val.'<br/>'; ?>

			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date"><?php echo $cust[$i]['fname']; ?></td>
				<td class="table_date"><?php echo $cust[$i]['lname']; ?></td>
				
				<td class="table_date"><?php echo $cust[$i]['orgname']; ?></td>
				<td class="table_title"><?php echo $cust[$i]['email']; ?></td>
				
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
