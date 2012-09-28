<script>
			$(document).ready(function() {
			$("#various1").fancybox();
			});
</script>
<style>
BODY {
    color: #5B5B5B;
    font-family: 'Trebuchet MS',Arial,Helvetica,sans-serif;
    font-size: 12px;
}

</style>
<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
		<!--start body-->
		<section id="body">		
          <h1><span>FAQ</span></h1>         	
            <div class="common_box">
			<p style="padding: 10px 0;">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tbody><tr>
                               		<td>&nbsp;</td>
                                </tr>
                                <tr>
                                	<td align="center">
																		<table cellspacing="2" cellpadding="2" border="0" width="90%">
									<tbody><tr>
									<td align="center"><ul style="line-height:10px">
									<?php
		  if($this->session->userdata('adminid')){
		  ?>
		  <a href="#inline1" id="various1" style="position: absolute; top: 14px; color: rgb(255, 60, 0); font-size: 16px; font-weight: bold;" >Add FAQ</a>
		  <?php } ?>
									 <?php
									 $i=0;
									 if($faq) {
									  foreach($faq as $row)
					{ $i++;
					?>
					
				<li><a href="#q<?=$i?>">	
					<?php
				echo $i.'. '.$row['questions'];	
				if($this->session->userdata('adminid')){
		  ?>
		  <a href="#edit<?=$i?>" id="var<?=$i?>" style="color: LightCoral; margin-left: 18px; font-size: 12px;"><b>Edit</b></a>
		  <a href="#del<?=$i?>" id="delete<?=$i?>" style="color: LightCoral; margin-left: 18px; font-size: 12px;"><b>Delete</b></a>
		  <?php } ?>	
					</a></li><br>
					
					
					<script>
			$(document).ready(function() {
			$("#var<?=$i?>").fancybox();
			$("#delete<?=$i?>").fancybox();
			});
</script>
					<div style="display:none;">
					<div id="edit<?=$i?>" style="width:800px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("admin/index/edit_faq")?>" id="change">
			<input name="field1" type="hidden" value="questions" />
			<input name="field2" type="hidden" value="answers" />
			<input name="field3" type="hidden" value="is_active" />
			<input name="field4" type="hidden" value="<?=$row['faq_id']?>" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit FAQ</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Edit Question:</p><br /></label>
			
			</td><td>
		   <input type="text" name="questions" value="<?=$row['questions']?>"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 300px; height: 24px;"/>

		   </td></tr>
		   <tr><td>
			<label><p>Edit Answers:</p><br /></label>
			
			</td><td>
		   <textarea name="answers" style="height:300px; width:500px;"><?=$row['answers']?></textarea>
		   
		   
		   </td></tr>
		   <tr><td>
			<label><p>Edit Activity:</p><br /></label>
			
			</td><td>
		   <select name="is_active">
		   <option value="Y">Active</option>
		   <option value="N">Inactive</option>
		   </select>
		   
		   
		   </td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		
		<div id="del<?=$i?>" style="width:800px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("admin/index/delete_faq")?>" id="change">
			<input name="field" type="hidden" value="<?=$row['faq_id']?>" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Delete FAQ</p><br />
			<table>
			<tr><td>
			<label><b>Delete This Question:</b></label>
			</td><td>
		   <label style="padding-left:10px;"><?=$row['questions']?></label>
		   </td></tr>
		   <tr><td colspan="2" align="center"><input type="submit" name="sub" value="Delete" class="green_btn"/></td></tr>
			</table>

			</center>
			</form>
		</div>
		
		
		
		
		
		
		
		
		
		</div>
					
					
					
					
					
					
					
					
					
					
					
					
					 <?php
					} }
			?>							
									</ul></td>
									</tr>
									<tr><td><hr></td></tr>
									
										 <?php
									 $i=0;
									 if($faq) {
									  foreach($faq as $row)
					{ $i++;
					?>
					
				<tr>
									<td><a name="q<?=$i?>"></a><b><?=$i?>.
					<?php
				echo $row['questions'];		
					?>
					<br></b><p> <?php
					
					echo $row['answers'];
					
			?></p><br><hr></td></tr><tr><td align="right"><a href="#top">>>Back to top</a></td></tr>
			<?php } }?>
													
									</tbody></table>
									
									</td>
                                </tr>
                            </tbody></table>
			</p>
		<div class="clear"></div>
		
		<?php if($this->session->userdata('adminid')){ 
		if($faq_in) {
		?>
		<table><tr><td><label style="color: rgb(255, 60, 0); font-size: 16px; font-weight: bold;">Inactive questions:</label></td></tr>
		<?php
			 $j=0;
			 
			 foreach($faq_in as $row1)
					{ 
					$j++;
		?>
		<tr>
		<td>
		<?php echo $row1['questions']; ?><a href="#active<?=$j?>" id="act<?=$j?>" style="color: LightCoral; margin-left: 18px; font-size: 12px;"><b>Make Active</b></a>

<script>
			$(document).ready(function() {
			$("#act<?=$j?>").fancybox();
			});
</script>
<div style="display:none;" >
<div id="active<?=$j?>" style="width:800px;height:auto;overflow:auto;">
		
		<form method="post" enctype="multipart/form-data" action="<?php echo site_url("admin/index/make_active")?>" >
			<input name="field" type="hidden" value="<?=$row1['faq_id']?>" />
			<input name="field1" type="hidden" value="is_active" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<input name="is_active" type="hidden" value="Y" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Activate FAQ</p><br />
			<table>
			<tr><td>
			<label><b>Activate This Question:</b></label>
			</td><td>
		   <label style="padding-left:10px;"><?=$row1['questions']?></label>
		   </td></tr>
		   <tr><td colspan="2" align="center"><input type="submit" name="sub" value="Activate" class="green_btn"/></td></tr>
			</table>

			</center>
			</form>
		</div>
		</div>
		
		</td>
		</tr>
		<?php } }?>
		
		</table>
		<?php  } ?>
          </div> 
		   <div class="clear"></div>
		</section>		
		<!--end body-->	
        	 <div class="clear"></div>	
			 <div style="display:none;">
		 <div id="inline1" style="width:800px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("admin/index/add_faq")?>" id="change">
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Add FAQ</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Add Question:</p><br /></label>
			
			</td><td>
		   <input type="text" name="questions"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/>

		   </td></tr>
		   <tr><td>
			<label><p>Add Answers:</p><br /></label>
			
			</td><td>
		   <textarea name="answers" class="textarea1" style="height:300px; width:500px;"></textarea>
		   
		   
		   </td></tr>
		   <tr><td>
			<label><p>Active:</p><br /></label>
			
			</td><td>
		   <select name="is_active">
		   <option value="Y">Active</option>
		   <option value="N">Inactive</option>
		   </select>
		   
		   
		   </td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		 
		 </div>