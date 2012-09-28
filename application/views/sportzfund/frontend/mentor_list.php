<?php if($this->session->userdata('userid') != ''){
?>
<script>
			$(document).ready(function() {
			$("#add").fancybox()({
            'autoScale': true,
            'transitionIn': 'none',
            'transitionOut': 'none'
        });

			});
</script>
<?php } ?>
		<!--start body-->
		
		     <div class="body_left" style="width:930px;">                   	
             <div class="howit_works" style="width:930px;">                	            
                	  

					
					
				
				  
				  
				  
				  
				   <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0"></div>
			   <div class="top_box" style="background:none;">
				   <div>
				   <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tr>
					    <td width="12%">&nbsp;</td>
                        <td width="13%"><strong>Mentor</strong></td>
                        <td width="12%"><strong>Grade</strong></td>
                        <td width="15%"><strong>Achiever</strong></td>
                        <td width="18%"><strong>Day(s)</strong></td> 
                        <td width="17%"><strong>School</strong></td>
                        <td width="14%"><?php if($this->session->userdata('userid') != '' && $userdetail['account_type'] == 'Faculty'){ ?><a id="add" href="#hidden">Add a Mentor</a><?php } else {} ?></td>
                        <td width="9%">&nbsp;</td>
                      </tr>
                    </table>
					</div>
					
					<?php 
					
					if($mentordetail)
					{
					
foreach($mentordetail as $row)
					{
 ?>	
					<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0"></div>				  
				   <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="details_box" >
                      <tr>
					
					<?php  if($row['image']) { ?>
					 <td width="10%" style="padding: 10px 0 10px 10px;"><img src="<?php echo site_url()?>uploads/<?=$row['image']?>" alt="" class="wrap" width="71" height="99"></td>
					 
					 <?php  } else { ?>
					 
					 <td width="10%" style="padding: 10px 0 10px 10px;"><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" class="wrap" width="71" height="99"></td>
					 <?php } ?>
                          
                       <td width="15%" style="padding: 10px 0 0 0; vertical-align: middle;"><a href="<?php echo site_url("mentor/mentor_details/".$row['user_id'])?>"><?=$row['fname']." ".$row['lname']?></a></td>
                      <td width="10%" style="padding: 10px 0 0 0; vertical-align: middle;"><?=$row['grade']?></td>
                         <td width="16%" style="padding: 10px 0 0 0; vertical-align: middle;">
                         <?php 
						 foreach ($achieverdetail as $ach){
							 if($row['user_id']==$ach['mentor_id']){
								 echo $ach['fname'].", ";
							 }
						 }
						 ?>
                         
                         </td>
						<td width="20%" style="padding: 10px 0 0 0; vertical-align: middle;">
						<?php 
									
									$days=explode(",",$row['available_days']);
									
								?>
									 
									 <?php 
									
									
									if($myachdetail['user_id'] == $row['user_id']){
									if ($myachdetail['mon']=='N') {
                                      echo "<div class='text_box'>M </div>"; } ?>
                                    <?php							
									if ($myachdetail['tue']=='N') {
                                       echo "<div class='text_box'>Tu </div>"; } ?>
                                    <?php							
									if ($myachdetail['wed']=='N') {
                                       echo "<div class='text_box'>W </div>"; } ?>
                                   <?php							
									if ($myachdetail['thu']=='N') {
                                       echo "<div class='text_box'>Th </div>"; } 
									   }
									   ?>
									 
									 
									 </td>
									 
									
									 
						
						
						
                        <td width="27%" style="padding: 10px 0 0 0; vertical-align: middle;"><?php echo $row['school_name']?></td>
                        <td width="8%" style="padding: 10px 0 0 0; vertical-align: middle;"></td>
                        <td width="11%" style="padding: 10px 0 0 0; vertical-align: middle;">&nbsp;</td>
                      </tr>
                    </table>
					
					<?php } }?>
					<p align="center"><?php echo $links; ?></p>
				  </div>
				  
<!--			<style>
				#fancybox-close{
					border: 1px solid red;
					position: absolute;
					margin: -40px !important;
				}
			</style>	-->  
				  
				  <div style="display: none;">
		<div id="hidden" style="width:640px;height:380px;">
		<center>
		<form method="POST" enctype="multipart/form-data" action="<?php echo site_url("mentor/add_mentor")?>" id="add_achiver">
		<input name="school" type="hidden" value="<?php if($this->session->userdata('userid') != '') { echo $school[0]['school_id']; }?>" />
<input name="url" type="hidden" value="<?=$url?>" />
		<table class="login_form">
                      <tr>
					  <td style="color: #000; vertical-align: middle;"><label>First Name:</label></td>
					  <td><input type="text" name="achfname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;"></td>
					  </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Last Name:</label></td>
                      <td><input type="text" name="achlname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;">
					  <input type="hidden" name="temp_password" value="<?php echo $password;?>">
					  <input type="hidden" name="achiver_coordinator/faculty_sponser" value="<?php echo $this->session->userdata('userid');?>">
					  </td>
					  </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Middle Initial:</label></td>
                      <td><input type="text" name="achmname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"></td>
					  </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Sex:</label></td>
					  <td><select name="sex" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;">
					  <option value="male">Male
					  </option>
					  <option value="female">Female
					  </option>
					  </select></td>
                      </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Mentor Image:</label></td>
					  <td><input type="file" name="userfile" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"/></td>
                      </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle; padding: 7px 0;"><label>School:</label></td>
					  <td style="padding: 7px 0; font-weight: bold;"><?php if($this->session->userdata('userid') != '') { echo $school[0]['school_name']; } ?></td>
                      </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Grade:</label></td>
					  <td>
					  <select name="achgrade" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;">
					  <?php for($j=1;$j<=12;$j++)
					  { ?>
					  <option value="<?=$j?>"><?=$j?>
					  </option>
					  <?php } ?>
					  </select>
					  </td>
                      </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Email:</label></td>
					  <td><input type="text" name="achemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"></td>
                      </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Confirm Email:</label></td>
					  <td><input type="text" name="achcemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"></td>
                      </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><input type="checkbox" value="" name="check"><label>I have received the Achiever's completed and<br/> signed application and have reviewed it for accuracy.</label>
					  </td>
                      </tr>
					  <tr>
					  <td colspan="2" style="text-align:center"><input type="submit" value="Add Achiever" name="submit" class="green_btn" style="margin: 10px auto"/></td>
                      </tr>
         </table>
		</form>
		</center>
		</div>
		</div>
				  
				  
				    </div>
				  
               </div>            
                     </div>		
		         <!--end body-->	        		
	            <div class="clear"></div>
				
				
				
				