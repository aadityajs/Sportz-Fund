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
				<?php include("tabs.php")?>
		<section id="body">		
           <h1>Find <span>Mentors</span></h1>         	
           <div class="common_box">
		   
		   <?php 
		   	
					if($check>0)
					
					{
					
					
					echo "You have already selected a mentor.
Please visit the My Mentor page to view
your mentor .";
					
					}
					
					else
					
					{
					
							//echo $userdetail['fname'].' '.$userdetail['lname'].'<br>';
		//echo $achivercoordi['email'];
										
					if($userdetail['is_submitted'] == 'N'){
					
					echo '<p>You have not yet submitted a complete profile. Please return to the <b>Profile</b> tab.</p><p>You will be able to search available mentors only after you have submitted your profile.</p><BR><BR>';
					}
					elseif($userdetail['return_agrmnt'] == 'N'){
					
					echo '<p>Your account is pending return of your signed <B>agreement</B> to your achiever coordinator.</p>';	
					?>
					<?php  if($achivercoordi['image']) { ?>
                                <P><img src="<?php echo site_url()?>uploads/<?=$achivercoordi['image']?>" alt="" width="221" class="user_img2" height="228">
								<?php  } else { ?>
								<img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="221" class="user_img2" height="228">
								<?php } ?>
								
								
                                
								
								
								
                                <strong><?=$achivercoordi['fname']?></strong><br>
                                  <?php echo $school[0]['school_name'] ?>
                                  <br>
                                <?=$achivercoordi['email']?></P>
					<?php 				
					echo '<P>You will be able to search available mentors only after your achiever coordinator receives the agreement.</P>';
					}
					
					else {
					
					
					
					if($achieverdetail)
					{
					
foreach($achieverdetail as $row)
					{
					
					
 ?>	
		   
		   
           <div class="details_box4">				
             <div style="width: 200px; float: left; margin: 0 auto;">
			 <?php  if($row['image']) { ?>
			 
			 <img src="<?php echo site_url()?>uploads/<?=$row['image']?>" alt="" width="152" height="155" border="0" class="border">
			 
			  <?php  } else { ?>
			  
			   <img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="152" height="155" border="0" class="border">
			   
			    <?php } ?>
			 
			 </div> 
			 <div style="width: 200px; float: right; margin: 38px auto;">
			<div><a href="<?php echo site_url("mentor/mentor_details/".$row['user_id'])?>/select-mentor"><?=$row['fname']." ".$row['lname']?></a></div>
			<div class="clear"></div>
			<div><strong>Day(s) Available</strong><span style="float:right; width: 90px;">
			
			
			
			<?php 
									
									
								/*	if($myachdetail['user_id'] == $row['user_id']){
									if ($myachdetail['mon']=='Y') {
                                      echo "<div class='text_box1'>M </div>"; } ?>
                                    <?php							
									if ($myachdetail['tue']=='Y') {
                                       echo "<div class='text_box1'>Tu </div>"; } ?>
                                    <?php							
									if ($myachdetail['wed']=='Y') {
                                       echo "<div class='text_box1'>W </div>"; } ?>
                                   <?php							
									if ($myachdetail['thu']=='Y') {
                                       echo "<div class='text_box1'>Th </div>"; } 
									   }*/
									   ?>
			
			
			
			<?php 
									
									$days=explode(",",$row['available_days']);
									
								?>
									 
									 <?php if (in_array("M", $days)) { ?>
									
									
									<div class="text_box1">M </div>
									
                                     <?php } ?>
									 <?php if (in_array("Tu", $days)) { ?>
									
									
									<div class="text_box1">Tu </div>
									
                                     <?php } ?>
									 <?php if (in_array("W", $days)) { ?>
									
									
									<div class="text_box1">W </div>
									
                                     <?php } ?>
									 <?php if (in_array("Th", $days)) { ?>
									
									
									<div class="text_box1">Th </div>
									
                                     <?php } ?>
									 
									 
									 
									 
									 
									 </span></div>
           </div> 	
             </div>
			 
			 
			 
			 <?php } } } }?>
			 
			 
			 
			 				  
				<div class="clear"></div>  	               
          </div>            
		</section>		
		<!--end body-->	
				
				
				<div style="display: none;">
		<div id="hidden" style="width:640px;height:380px;">
		<center>
		<form method="POST" enctype="multipart/form-data" action="<?php echo site_url("mentor/add_mentor")?>">
		<input name="school" type="hidden" value="<?php echo $school[0]['school_id'] ?>" />

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
					  <td style="padding: 7px 0; font-weight: bold;"><?php echo $school[0]['school_name'] ?></td>
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