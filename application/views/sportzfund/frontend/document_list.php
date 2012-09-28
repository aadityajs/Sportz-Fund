<script>
			$(document).ready(function() {
			$("#upload1").fancybox({
            'autoScale': true,
            'transitionIn': 'none',
            'transitionOut': 'none'
        });
		
		$("#upload2").fancybox({
            'autoScale': true,
            'transitionIn': 'none',
            'transitionOut': 'none'
        });
		

			});
</script>
		<!--start body-->
		<?php include("tabs.php")?>
		     <div class="body_left" style="width:930px; height:auto;">                   	
             <div class="howit_works" style="width:930px; height:auto;">                	            
			 			  
				    <table width="45%" align="center" border="0" cellspacing="0" cellpadding="0" class="form">
                      <tr>
                        <td style="text-align:center; width:450px; border:1px solid #ff6600; border-bottom: 0px"><b>E.J Documents</b></td>
						<td style="text-align:center; width:450px; border:1px solid #ff6600; border-bottom: 0px"><b>School files</b></td>
                      </tr>
					  
					  <tr>
                        <td style="text-align:left; width:450px; border:1px solid #ff6600; border-top: 0px;">
						<table>
						<?php 
		if($docs) {
foreach($docs as $row)
					{
 ?>	
						<tr>
						<td align="center"><a href="<?php echo site_url()?>uploads/<?=$row['docs']?>" target="_blank"><?=$row['docs']?></a></td>
						</tr>
						<?php }  }?>
						</table>
						</td>
						<td style="text-align:right; width:450px; border:1px solid #ff6600; border-top: 0px;">
						<table>
						<?php 
	if($docs_p) {					
foreach($docs_p as $row1)
					{
 ?>	
						<tr>
						<td align="center"><a href="<?php echo site_url()?>uploads/<?=$row1['docs']?>" target="_blank"><?=$row1['docs']?></a></td>
						</tr>
						<?php } }?>
						</table>
						</td>
                      </tr>
					  <?php if($this->session->userdata('usertype') == 'Faculty') { ?>
					  <tr>
                        <td style="text-align:center;"><!--<a href="#inline1" id="upload1">Upload a file</a>--></td>
						<td style="text-align:center;"><a href="#inline2" id="upload2">Upload a file</a></td>
                      </tr>
					  <?php } elseif($this->session->userdata('usertype') == 'Achiever') {?>
					  
					  <tr>
                        <td style="text-align:center;">&nbsp;</td>
						<td style="text-align:center;"><a href="#inline2" id="upload2">Upload a file</a></td>
                      </tr>
					  <?php } ?>
                    </table>
				  
			 </div>            
                     </div>		
					 <div style="display: none;">
		<div id="inline1" style="width:600px;height:auto;overflow:auto;">
			
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("docs/add_docs")?>" name="edit_name">
			
			
			<input name="url" type="hidden" value="<? //=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Upload File</p><br />
			
			<table>
			<tr><td>
			<label><p>File:</p><br /></label>
			
			</td><td>
		
		 <input type="file" name="userfile" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"/></td></tr>
			
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn" />
			</center>
			</form>
		</div>
		
		<div id="inline2" style="width:600px;height:auto;overflow:auto;">
			
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("docs/add_docs")?>" name="edit_name">
			
			<input name="school" type="hidden" value="<?=$userdetail['school']?>" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Upload File</p><br />
			
			<table>
			<tr><td>
			<label><p>File:</p><br /></label>
			
			</td><td>
		
		 <input type="file" name="userfile" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"/></td></tr>
			
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn" />
			</center>
			</form>
		</div>
					 </div>
					 
					 
		         <!--end body-->	        		
	            <div class="clear"></div>