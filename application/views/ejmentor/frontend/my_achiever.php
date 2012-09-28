<?php if($this->session->userdata('userid') != ''){
?>



	<script>
			$(document).ready(function() {
			
					
		 $("#add").fancybox();

/*		$(".selectbg").change(function() {

        
		var sclt_schl = $('.selectbg').val();
		
		
     	//alert(sclt_schl);
		if(sclt_schl!='Other')
		{   
       	   $('.form3').hide('');
		  
		}
		else
		{
		  $('.form3').show('');
		  
		
		}
    });*/
	
			});
			


</script>

  
			  


<?php } ?>

<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
		<!--start body-->
		<?php include("tabs.php")?>
		     <div class="body_left" style="width:930px;">                   	
             <div class="howit_works" style="width:930px;">                	            
                	  

					
					
				
				  
				  
				  
				  
				   <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0"></div>
			   <div class="top_box" style="background:none;">
				   <div>
				   <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tr>
					    <td width="12%">&nbsp;</td>
                        <td width="13%"><strong>Achievers</strong></td>
                        <td width="5%"><strong>Grade</strong></td>
						<td width="12%" style="text-align:center;"><strong>Email</strong></td>
						<td width="9%"><strong>Returned agreement</strong></td>
						<td width="12%"><strong>Status</strong></td>
                        <td width="15%"><strong>Mentor name</strong></td>
						<td width="5%"><strong>Grade</strong></td>
                        <td width="18%" style="text-align:center;"><strong>Day(s) Mentored</strong></td> 
						
                        <td width="17%"><strong>School</strong></td>
                        <td width="14%"><?php if($this->session->userdata('userid') != '' && $userdetail['account_type'] == 'Achiever'){ ?><a id="add" href="#hidden">Add an Achiever</a><?php } else {} ?></td>
                        
                      </tr>
                    </table>
					</div>
					
					<?php 
					
					if($achieverdetail)
					{
					
					$i=0;
					
foreach($achieverdetail as $row)
					{
 ?>	
					<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0"></div>				  
				   <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="details_box" >
                      <tr>
					
					<?php  if($row['image']) { ?>
					 <td width="10%" style="padding: 10px 0 10px 2px;"><img src="<?php echo site_url()?>uploads/<?=$row['image']?>" alt="" class="wrap" width="71" height="99"></td>
					 
					 <?php  } else { ?>
					 
					 <td width="10%" style="padding: 10px 0 10px 2px;"><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" class="wrap" width="71" height="99"></td>
					 <?php } ?>
                          
                       <td width="13%" style="padding: 10px 0 0 0; vertical-align: middle;"><a href="<?php echo site_url("achiever/achiever_details/".$row['user_id'])?>"><?=$row['fname']." ".$row['lname']?></a></td>
                      <td width="4%" style="padding: 10px 0 0 0; vertical-align: middle;"><?=$row['grade']?></td>
					   <td width="10%" style="padding: 10px 4px 0 0; vertical-align: middle;"><?=$row['email']?></td>
					   <td width="8%" style="padding: 10px 0 0 0; vertical-align: middle;">
					   
					   <input <?php if($row['return_agrmnt'] == 'Y'){ ?> checked="checked" onclick="return false" <?php }?> type="checkbox" id="return" onclick='$("a.fancylink<?=$i?>").trigger("click"); return false;'/>
					   
					   
					   </td>
					  <td width="11%" style="padding: 10px 0 0 0; vertical-align: middle;"><a title="nChange Status" id="various<?=$i?>" href="#inline<?=$i?>"><?php if($row['active']=='Y') echo "Active" ; else echo " Inactive"; ?></a></td>
                         <td width="15%" style="padding: 10px 0 0 0; vertical-align: middle;">Mentor_name</td>
						 <td width="7%" style="padding: 10px 0 0 0; vertical-align: middle;">12</td>
						<td width="13%" style="padding: 10px 0 0 0; vertical-align: middle;"><div class="text_box">M </div><div class="text_box">T </div>
						<!--<?php 
									
									$days=explode(",",$row['available_days']);
									
								?>
									 
									 <?php if (in_array("M", $days)) { ?>
									
									
									<div class="text_box">M </div>
									
                                     <?php } ?>
									 <?php if (in_array("Tu", $days)) { ?>
									
									
									<div class="text_box">Tu </div>
									
                                     <?php } ?>
									 <?php if (in_array("W", $days)) { ?>
									
									
									<div class="text_box">W </div>
									
                                     <?php } ?>
									 <?php if (in_array("Th", $days)) { ?>
									
									
									<div class="text_box">Th </div>
									
                                     <?php } ?>-->
									 
						
						
						
                        <td width="27%" style="padding: 10px 0 0 0; vertical-align: middle;"><?=$row['school_name']?></td>
                        <td width="8%" style="padding: 10px 0 0 0; vertical-align: middle;"></td>
                        <td width="11%" style="padding: 10px 0 0 0; vertical-align: middle;">&nbsp;</td>
                      </tr>
                    </table>
					
					
					<div style="display:none"	>
				<div id="inline<?=$i?>" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/change_status")?>" >
			<input name="stat" type="hidden" value="<?=$row['active']?>" />
			<input name="uid" type="hidden" value="<?=$row['user_id']?>" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			
			
			<?php if($row['active']=='Y') { ?>
			
			
			
			
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Make Inactive</p><br />
			You are deactivating the account of <?=$row['fname']?>.
			
			<table>
			
			<tr><td>
			<label><p>Reason:</p><br /></label>
			
			</td><td>
		 <select name="reason" class="selectbg" id="reason<?=$i?>">
		 <option value="Moved">Moved</option>
		  <option value="Graduated">Graduated</option>
		   <option value="Other">Other</option>
		 
		 
		 </select>
		 </td>
		
		 </tr>
		 
		 
		 <tr class="form<?=$i?>" style="display:none;">
		 
		 <td>
		 
		 <label><p>Explain:</p><br /></label>
		 </td>
		 
		 <td> <textarea name="explain" class="textarea1" style="height:120px; width:440px;"></textarea></td>
		 </tr>
		 	</table>
			
			
			
			<input type="submit" name="sub" value="Make Inactive" class="green_btn"/>
			
		 
		 <?php } 
		 
		 else
		 {
		 
		 ?>
		 
		 
		 <input type="submit" name="sub" value="Make Active" class="green_btn"/>
		 
		 
		 <?php } ?>
			
		
	
		
			
			</center>
			</form>
		</div>
				
				</div>
				<script>
			$(document).ready(function() {
			
					
		
				$("#various<?=$i?>").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

               
			 
		$("a.fancylink<?=$i?>").fancybox();
		
		$("#reason<?=$i?>").change(function() {

        
		var sclt_schl = $('#reason<?=$i?>').val();
		
		
     	//alert(sclt_schl);
		if(sclt_schl!='Other')
		{   
       	   $('.form<?=$i?>').hide('');
		  
		}
		else
		{
		  $('.form<?=$i?>').show('');
		  
		
		}
    });
		
		

		
		$("#return_agrmnt<?=$i?>").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {
				
				    // simple rule, converted to {required:true}
					pfname: "required",	
					plname: "required",	
					check1: "required",
					check2: "required",
					check3: "required",
					check4:	"required",
	
					pemail: {				// compound rule
						required: true,
						email: true
					},
					pcemail: {				// compound rule
						required: true,
						email: true,
						
					},
					
				},
				
				
				
						messages: {
						pfname: "<br><font color='red'>Please enter first Name</font><br>",
						plname: "<br><font color='red'>Please enter last Phone Number</font><br>",
						check1: "<br><font color='red'>Please check this check box</font><br>",
						check2: "<br><font color='red'>Please check this check box</font><br>",
						check3: "<br><font color='red'>Please check this check box</font><br>",
						check4: "<br><font color='red'>Please check this check box</font><br>",
						pemail: "<br><font color='red'>Please enter parent email</font><br>",
						pcemail: "<br><font color='red'>Please re type the same email address</font><br>",
	 	
		}
				
				
			});
			
		
		

			});
</script>
<a style="display: none;" class="fancylink<?=$i?>" href="#abcd<?=$i?>"></a>
<div style="display:none">
<div id="abcd<?=$i?>" style="width:640px;height:380px;">
		<center>
		<form method="POST" enctype="multipart/form-data" action="<?php echo site_url("achiever/add_achiever_agreement")?>" id="return_agrmnt<?=$i?>">
		<!--<input name="school" type="hidden" value="<?php //echo $school[0]['school_id'] ?>" />-->

		<table class="login_form">
                      <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><label>If you have received a signed agreement from <b><?=$row['fname'].' '.$row['lname']?></b>,please verify that:</label></td>           </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><input type="checkbox" value="" name="check1"><label>The agreement is completed and signed by the achiever.</label></td>           </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><input type="checkbox" value="" name="check2"><label>The agreement is signed by you.</label></td>           </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><input type="checkbox" value="" name="check3"><label>The agreement is signed by Achiever's parent/guardian</label></td>           </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><input type="checkbox" value="" name="check4"><label>i understand E.J office may request a copy of the agreement,as such,agree to keep it on file.</label></td>           </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><label>Please provide the following information as it exactly appears on the agreement</label></td>           </tr>
					  <tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Guardian/Parent First Name:</label></td>
					  <td><input type="text" name="pfname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;"></td>
					  </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Guardian/Parent Last Name:</label></td>
                      <td><input type="text" name="plname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;">
					  <input type="hidden" name="achiver_coordinator/faculty_sponser" value="<?php echo $this->session->userdata('userid');?>">
					  <input name="uid123" type="hidden" value="<?=$row['user_id']?>" />
					  </td>
					  </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Guardian/Parent Email:</label></td>
					  <td><input type="text" id="pemail" name="pemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"></td>
                      </tr>
					  <tr>
					  <td style="color: #000; vertical-align: middle;"><label>Confirm Email:</label></td>
					  <td><input type="text" name="pcemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"></td>
                      </tr>
					  <tr>
					  <td colspan="2" align="center" style="color: #000; vertical-align: middle; padding: 2px 0;"><label>Note:An achiever with pending status must still complete his/her profile to become active.</label></td>           </tr>
					  <tr>
					  <td colspan="2" style="text-align:center"><input type="submit" value="Submit" name="submit" class="green_btn" style="margin: 10px auto"/></td>
                      </tr>
         </table>
		</form>
		</center>
		</div>
		</div>
					
					<?php $i++; } }?>
					<p align="center"><?php echo $links; ?></p>
				  </div>
				  
		
				  
				  <div style="display: none;">
		<div id="hidden" style="width:640px;height:380px;">
		<center>
		<form method="POST" enctype="multipart/form-data" action="<?php echo site_url("achiever/add_achiever")?>" id="add_achiver">
		<input name="school" type="hidden" value="<?php echo $school[0]['school_id'] ?>" />
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
					  <td style="color: #000; vertical-align: middle;"><label>Achiever Image:</label></td>
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
					  <td><input type="text" id="achemail" name="achemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"></td>
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
		
		
		
<!--/////////////////////////////////////////return agreement code////////////////////////////////////////////////	-->	
		
		
		
		
		
		
		
		
		</div>
				  
				  
				    </div>
				  
               </div>            
                     </div>		
		         <!--end body-->	        		
	            <div class="clear"></div>
				
			
				