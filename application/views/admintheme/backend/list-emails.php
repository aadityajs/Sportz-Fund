<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //print_r($emails[0]['email']); ?>
<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Emails</h2>
			<form name="email" method="post">
		<table id="table">
		<thead>
			
			
			<?php if (!empty($emails)) { ?>
			
			</thead>
			<tbody>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
				<td>Name </td>
				<?php
				$em='';
				for($i=0;$i<count($emails);$i++)
				{ 
					$em.=$emails[$i]['email'].',';
					}
				?><td><input type="text" name="email_con[]" value="<?php echo $em; ?>" style="width:450px;"/>
				<input type="hidden" name="count" value="<?php echo $i; ?>" />
				</td>
			</tr>

			<tr>
				<td>Subject </td>
				<td class="table_date"><input type="text" name="sub" value="" /></td>
			</tr>
			
			<tr>
				<td>Message </td>
				<td class="table_date"><textarea name="msg" cols="50" rows="10"></textarea></td>
			</tr>
			<tr><td><input type="submit" name="emailsubmit" value="EmailSend" class="noborder" /></td></tr>
			</tbody><?php  } else { ?> 
			<tr><td>No records found! </td></tr>
			<?php } ?>
		</table>
		</form>
			
		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
