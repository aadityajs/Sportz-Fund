	<!--start body-->
	
		<script>
			$(document).ready(function() {
			
		
				$("#various2").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various3").fancybox();
			
			$("#various7").fancybox();
			
			$("#various5").fancybox();
			
			$("#various6").fancybox();
			
			$("#various10").fancybox();
			
			$("#various11").fancybox();

			$("#various4").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});

			
				<?php if($userdetail['password']== '')
		{
		
		?>
			$("#various1").fancybox().trigger('click')({
            'autoScale': true,
            'transitionIn': 'none',
            'transitionOut': 'none'
        });
		
		
		<?php }
?>

			});
</script>



<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>



<?php include("tabs.php")?>
		<section id="body">	
		<a href="#inline1" id="various1" style="display:none;"></a>	
		 	<div class="body_left">
			<?php if($userdetail['account_type'] == 'Achiever_student') { ?>  
             <h1>Achiever <span>Details</span></h1>  
			 <?php } elseif($userdetail['account_type'] == 'Mentor') { ?> 
			 <h1>Mentor <span>Details</span></h1>  
			<?php } elseif($userdetail['account_type'] == 'Faculty') { ?> 
			 <h1>Faculty Sponsor <span>Details</span></h1>  
			<?php } elseif($userdetail['account_type'] == 'Achiever') { ?> 
			 <h1>Achiever Co-ordinator <span>Details</span></h1>  
			 <?php } ?>
			 
                <div class="howit_works">
				<form method="post" enctype="multipart/form-data" />
				<input name="url" type="hidden" value="<?=$url?>" />
	
	<?php if($userdetail['account_type'] == 'Faculty' || $userdetail['account_type'] == 'Mentor') { ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
  			<tr class="gray2">
                <td class="right_align" style="line-height:13px; text-align: left; vertical-align: middle; width: 180px;"><strong>Chapter Announcements</strong></td>
                <td><span style="margin: 0 10px 0 0;"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/help_img1.png" style="vertical-align: middle; border:0"/></a></span>Posted On: <?=date('m-d-Y',$userdetail['announce_date'])?>&nbsp;<?php if($userdetail['account_type'] == 'Faculty') { ?><a id="various7" href="#inline7">Edit </a><?php } ?></td>
            </tr>
			<tr class="gray2">
               <td colspan="2"><?=$userdetail['announcement']?></td>
            </tr>
    </table>
	<?php } ?>
	<div style="background: #fff; padding: 15px 0;">
<div style="width: 128px; height: auto; float: left; background: #fff; border: 1px solid #c9c8c8; margin: 0 5px;"> 




<?php  if($userdetail['image']) { ?>
					 <td><img src="<?php echo site_url()?>uploads/<?=$userdetail['image']?>" alt="" width="120"   style="vertical-align: top; border:0; margin: 5px 5px;"></td>
					 
					 <?php  } else { ?>
					 
					 <td><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="120"></td>
					 <?php } ?>




</div>
				
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form" style=" width: 490px; float: right; margin: 0 5px 0 0;">
                       <tr class="gray">
                        <td width="110" class="right_align"><strong> First Name :</strong></td>
                        <td><?=$userdetail['fname']?></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr class="gray2">
                        <td class="right_align"><strong> Last Name :</strong></td>
                        <td><?=$userdetail['lname']?></td>
                        <td>&nbsp;</td>
                      </tr>
                       <tr class="gray">
                        <td class="right_align"><strong>Email Address :</strong></td>
                        <td><?=$userdetail['email']?></td>
                        <td><a id="various2" href="#inline2">Edit</a></td>
                      </tr>
					  
					
					  
					  <tr class="gray">
                        <td class="right_align"><strong>Password :</strong></td>
                        <td>
						<input style="border: 0px; background: #F7F6F6;" type="password" value="<?php 
						if($userdetail['password'] == ''){
						echo $userdetail['temp_password'];
						}
						else {
						echo $userdetail['password'];
						}
						?>" readonly="readonly" />
						</td>
                        <td><a id="various6" href="#inline6">Edit</a></td>
                      </tr>
                      <tr class="gray2">
                        <td class="right_align"><strong>Phone :</strong></td>
                        <td><?=$userdetail['phone_no']?></td>
                        <td><a id="various3" href="#inline3">Edit</a></td>
                      </tr>
                       <tr class="gray">
                        <td class="right_align"><strong>Address :<span></span></strong></td>
                        <td style="line-height:14px; padding-top:9px;"><?=$userdetail['address']?>
						<?php if(trim($userdetail['street'])) { ?>
						
						
						,<br /><?php echo trim($userdetail['street']); 
						
						} ?>
						<?php if(trim($userdetail['city'])){ ?>
						 <br /><?php echo trim($userdetail['city']); 
						 }
						  
						  if(trim($userdetail['state'])) { ?>
						  
						  , <?php echo trim($userdetail['state']); 
						  } 
						  
						  if(trim($userdetail['zip_code'])) { ?>
						<br />Zip-code:<?php echo trim($userdetail['zip_code']); 
						
						} ?>
						
						
						</td>
                        <td style="line-height:14px; padding-top:9px;"><a id="various4" href="#inline4">Edit</a></td>
                      </tr>
                      <tr class="gray2">
                        <td class="right_align"><strong>School :</strong></td>
                        <td style="line-height:14px;  padding-top:9px;"><?php echo $school[0]['school_name'] ?></td>
                        <td style="line-height:14px;  padding-top:9px;">&nbsp;</td>
                      </tr>
                       
					   <?php if($userdetail['account_type'] == 'Achiever_student') { ?> 
					   <tr class="gray">
                        <td class="right_align"><strong>Grade Level :</strong></td>
                        <td><?=$userdetail['grade']?></td>
                        <td style="line-height:14px; padding-top:9px;"><a id="various5" href="#inline5">Edit</a></td>
                      </tr>
					  <?php } ?>
                      
                       <tr class="gray">
                        <td>&nbsp;</td>
                        <td><!--<input type="submit" name="button" id="button" value="Submit" class="btn_02">--></td>
                        <td>&nbsp;</td>
                      </tr>
                  </table>
				  <div class="clear"></div> 
				  </div>      
				  </form>
				 <div class="clear"></div>          
              </div>  
			  
			  <?php if($userdetail['account_type'] == 'Achiever_student') { ?>
			  <div class="howit_works2">
				<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="form" style=" background: #fff;">
				  <tr>
					<td class="right_align" width="210"><strong>Parent/Guardian First Name:</strong></td>
					<td><?=$userdetail['parent_fname']?></td>
				  </tr>
				  <tr class="gray">
					<td class="right_align"><strong>Parent/Guardian Last Name:</strong></td>
					<td><?=$userdetail['parent_lname']?></td>
				  </tr>
				  <tr>
					<td class="right_align"><strong>Parent/Guardian Email:</strong></td>
					<td><?=$userdetail['parent_email']?></td>
				  </tr>
				  
				  <?php 
				  if(!($userdetail['is_active'] == 'N' && $userdetail['return_agrmnt'] == 'Y')) {
				  ?>
				  <tr class="gray">
					<td class="right_align"><strong>Returned Agreement:</strong></td>
					<td><?php if($userdetail['return_agrmnt'] == 'Y'){ 
					echo 'Yes'; 
					}
					else 
					echo 'No';
					?></td>
				  </tr>
				  <?php 
				  }
				  ?>
				  
				  <tr>
					<td style="padding: 10px 5px;" class="right_align"><strong>Status:</strong></td>
					<td style="padding: 10px 5px;">
					<?php if($userdetail['is_active'] == 'N' && $userdetail['return_agrmnt'] == 'N'){ 
					echo 'Pending'; 
					}
					elseif($userdetail['is_active'] == 'N' && $userdetail['return_agrmnt'] == 'Y') {
					echo 'Inactive';
					}
					else
					echo 'Active';
					?>
					
					<?php if($userdetail['is_active'] == 'N' && $userdetail['return_agrmnt'] == 'Y') { ?>
					<span class="deactivate_btn" style="background: #8dc969;"><a id="various11" href="#inline11">Request Reactivation</a></span>
					<?php } else { ?>
					<span class="deactivate_btn"><a id="various10" href="#inline10">Deactivate my account</a></span>
					<?php } ?>
					</td>
				  </tr>
				</table>
           </div>     
		   <?php } ?>     
            </div>
            <?php include("sidebar.php")?>
		</section>		
		<!--end body-->	
		<div style="display: none;">
		<div id="inline0" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/sec_ans")?>">
			<input name="url" type="hidden" value="<?=$url?>" />
			
			<center>
			<p>Thank you for becoming an EJ Mentors Achiever Coordinator!</p><br />
			<p>Please begin by changing your temporary password:</p><br />
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="login_form"><tr><td align="left">
			<label>New Password:</label></td><td align="right"><input type="text" name="password"  /> </td></tr>
			<tr><td align="left"><label>Re-type Password:</label></td><td align="right"><input type="text" name="retype_pass"  /></td></tr>
			</table>
			<p>Please choose and answer three of security questions below.</p><br />
			<table><!--<tr><td>
            
			<?php // print_r($secureques)?>
			<label><?  //= $secureques['questions']?></label>
			</td>
			<td>
			<label>Answer:</label><input type="text" name="secure_ans[]"  /> </td></tr>
			<tr><td>
			<label></label>
			</td><td>
			<label>Answer:</label><input type="text" name="secure_ans2"  /> </td></tr>-->
			
			<?php foreach($secureques as $row)
			
			{
			
            ?>
			
			<tr><td>
			<label><?=$row['questions']?></label>
			<input name="ques_id[]" type="hidden" value="<?=$row['ques_id']?>" />
			</td><td>
			<label>Answer:</label><input type="text" name="secure_ans[]"  /></td></tr>
			
			<?php } ?>
	
			</table>
			<input type="submit" name="sub" value="Submit"/>
			</center>
			</form>
		</div>
		
		<div id="inline1" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/sec_ans")?>" name="password_reset" id="password_reset">
			<input name="url" type="hidden" value="<?=$url?>" />
			<div>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Congratulations on joining EJ Mentors, <?=$userdetail['fname']?>!</p><br />
			<p style="font: normal 12px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Please begin by changing your temporary password:</p><br />
			<style>
				.login_form td{
					padding: 2px 0;
				}
			</style>
			<table width="400" border="0" cellpadding="4" cellspacing="4" class="login_form">
			  <tr><td width="47%" align="right">
			<label style="font: normal 12px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">New Password:</label></td><td width="53%" align="left"><input type="password" name="password" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;" id="password"/></td></tr>
			<tr><td align="right" valign="middle"><label style="font: normal 12px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Re-type Password:</label></td><td align="left"><input type="password" name="retype_pass" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/></td></tr>
			</table>
			<p style="font: normal 12px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 17px; margin: 0;">Please choose and answer three of security questions below.</p><br />
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="login_form">			
			
			
			
			<?php foreach($secureques as $row)
			
			{
			
            ?>
			
			<tr><td>
		<label style="font: normal 12px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;"><?=$row['questions']?></label>
			<input name="ques_id[]" type="hidden" value="<?=$row['ques_id']?>" />
			</td><td>
			<label style="font: normal 12px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 5px 0 15px; margin: 0;">Answer:</label><input type="text" name="secure_ans[]"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 90px; height: 24px;"/></td></tr>
			
			<?php } ?>
			
	
			</table>
			<span class="center_align"><input type="submit" name="sub" value="Submit" class="green_btn"/></span>			
			</div>
			</form>
		</div>
		
		
		
		
		<div id="inline2" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit_email")?>" id="change_email">
			<input name="field" type="hidden" value="email" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<input name="check_pass" id="check_pass" type="hidden" value="<?=$userdetail['password']?>" />
			<input name="check_mail" id="check_mail" type="hidden" value="<?=$userdetail['email']?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Email</p><br />
			
			<table>
			<tr><td>
			<label><p>Enter Your Current Email:</p><br /></label>
			
			</td><td>
			<input type="text" name="old_email"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/></td></tr>
			<tr><td>
			<label><p>Enter Your Password:</p><br /></label>
			
			</td><td>
			
			<input type="password" name="pass"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/></td></tr>
			
			<tr><td>
			<label><p>Enter Your New Email:</p><br /></label>
			
			</td><td>
		   <input type="text" name="email"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		<div id="inline5" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" id="change_grade">
			<input name="field" type="hidden" value="grade" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Grade</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Enter Your Grade:</p><br /></label>
			
			</td><td>
		   <select name="grade" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;">
					  <?php for($j=1;$j<=12;$j++)
					  { ?>
					  <option value="<?=$j?>"><?=$j?>
					  </option>
					  <?php } ?>
					  </select>
			</td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		<div id="inline6" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" id="pass_word">
			<input name="field" type="hidden" value="password" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Password</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Change Your Password:</p><br /></label>
			
			</td><td>
		   <input type="text" name="password" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/>
			</td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		
		<div id="inline3" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" id="edit_phone">
			<input name="field" type="hidden" value="phone_no" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Phone</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Enter Your Phone No:</p><br /></label>
			
			</td><td>
		   <input type="text" name="phone_no"   id="phone_no" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		
		
		
		<div id="inline4" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit_addrss")?>" id="edit_add">
			<input name="field1" type="hidden" value="address" />
			<input name="field2" type="hidden" value="city" />
			<input name="field3" type="hidden" value="state" />
			<input name="field4" type="hidden" value="zip_code" />
			<input name="field5" type="hidden" value="street" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Address</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Enter Your Address:</p><br /></label>
			
			</td><td>
		  <textarea name="address"  id="address" class="textarea1" style="height:120px; width:250px;"><?=$userdetail['address']?></textarea></td></tr>
			<tr><td>
			<label><p>Enter state:</p><br /></label>
			
			</td><td>
		  <input type="text" name="state" value="<?=$userdetail['state']?>"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/> </td></tr>
		<tr><td>
			<label><p>Enter Your city:</p><br /></label>
			
			</td><td>
		  <input type="text" name="city" value="<?=$userdetail['city']?>"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/> </td></tr>
	
	<tr><td>
			<label><p>Enter Your Zip code:</p><br /></label>
			
			</td><td>
		  <input type="text" name="zip_code" value="<?=$userdetail['zip_code']?>"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/> </td></tr>
	
	<tr><td>
			<label><p>Enter Your Street name:</p><br /></label>
			
			</td><td>
		  <input type="text" name="street" value="<?=$userdetail['street']?>"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/> </td></tr>
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		<div id="inline7" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("faculty_sponsor/annoucement")?>">
			<input name="field" type="hidden" value="about_me" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Announcement</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Anouncement:</p><br /></label>
			
			</td><td>
		  <textarea name="announcement" class="textarea1" style="height:120px; width:440px;" id="textfield10"><?=$userdetail['announcement']?></textarea></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		<div id="inline10" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/account_deact")?>" id="deact_acnt">
			<input name="field" type="hidden" value="is_active" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: red; padding: 0 0 0 15px; margin: 0;">WARNING!</p><br />
			<p style="font-size:11px; font-weight:bold;">SUSPENDING YOUR ACCOUNT WILL DISCONNECT YOU FROM YOUR MENTOR. THERE IS NO GUARANTEE THAT YOU WILL BE ABLE TO RECONNECT WITH THIS MENTOR OR FIND ANOTHER AVAILABLE MENTOR.</p>
			<p style="font-size:11px; font-weight:bold;">REQUESTS TO REACTIVATE A SUSPENDED ACCOUNT MAY TAKE UP TO 10 BUSINESS DAYS TO PROCESS.</p>
			<table>
			
			<tr>
			<td colspan="2">
			<label><p style="font-size:11px; font-weight:bold;">ARE YOU SURE YOU WANT TO DEACTIVATE YOUR ACCOUNT?</p><br /></label>
			<input type="hidden" name="is_active" value="N"/>
			<input type="hidden" name="aname" value="<?php echo $userdetail['fname']." ".$userdetail['lname']; ?>"/>
			<input type="hidden" name="aemail" value="<?=$userdetail['email']?>"/>
			<input type="hidden" name="pemail" value="<?=$userdetail['parent_email']?>"/>
			
			</td>
			</tr>
			<tr>
			<td style="vertical-align:bottom;"><input type="submit" name="sub" value="DEACTIVATE" class="green_btn" style="margin: 0px;"/></td> <td><a href="<?php echo site_url("user/account_details")?>"><input type="button" value="Cancel" class="green_btn"/></a></td></tr>
			</table>
			
			</center>
			</form>
		</div>
		
		
		
		<div id="inline11" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/reactivation")?>" id="reactivation">
			<input name="field" type="hidden" value="address" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<input type="hidden" name="aemail" value="<?=$userdetail['email']?>"/>
			<center>
			<br/>			
			<table>
			
			<tr><td style="text-align:center;">
			<label style="font-weight:bold;">Please explain why you suspended your account</label>
			
			</td>
			</tr>
			<tr>
			<td style="text-align:center;">
		  <textarea name="reason1"  id="address" class="textarea1" style="height:120px; width:330px;"> </textarea></td></tr>
			
			<tr><td style="text-align:center;">
			<label style="font-weight:bold;">Please explain why you would like to reactivate your account</label>
			
			</td>
			</tr>
			<tr>
			<td style="text-align:center;">
		  <textarea name="reason2"  id="address" class="textarea1" style="height:120px; width:330px;"> </textarea></td></tr>
		
	
			</table>
			<br />
			<input style="margin: 0px;" type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
	</div>
    <div class="clear"></div>
	