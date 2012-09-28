	<!--start body-->
	
		<script>
			$(document).ready(function() {
			
		
				$("#various2").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various3").fancybox();

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








		<section id="body">	
		<a href="#inline1" id="various1" style="display:none;"></a>	
		 	<div class="body_left"> 
             <h1>Account <span>Details</span></h1>  
			 
                <div class="howit_works">
				<form method="post" enctype="multipart/form-data" />
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
                       <tr class="gray">
                        <td width="210" class="right_align"><strong> First Name :</strong></td>
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
                      <tr class="gray2">
                        <td class="right_align"><strong>Phone :</strong></td>
                        <td><?=$userdetail['phone_no']?></td>
                        <td><a id="various3" href="#inline3">Edit</a></td>
                      </tr>
                       <tr class="gray">
                        <td class="right_align"><strong>Address :<span></span></strong></td>
                        <td style="line-height:14px; padding-top:9px;"><?=$userdetail['address']?></td>
                        <td style="line-height:14px; padding-top:9px;"><a id="various4" href="#inline4">Edit</a></td>
                      </tr>
                      <tr class="gray2">
                        <td class="right_align"><strong>School :</strong></td>
                        <td style="line-height:14px;  padding-top:9px;"><?php echo $school[0]['school_name'] ?></td>
                        <td style="line-height:14px;  padding-top:9px;">&nbsp;</td>
                      </tr>
                       <!--<tr class="gray">
                        <td class="right_align"><strong>Grade Level :</strong></td>
                        <td>12</td>
                        <td>&nbsp;</td>
                      </tr>-->
                      <tr class="gray2">
                        <td class="right_align" style="line-height:13px;"><strong>Announcements :</strong></td>
                        <td><textarea name="textfield10" class="textarea1" style="height:120px; width:330px;" id="textfield10"></textarea></td>
                        <td>&nbsp;</td>
                      </tr>
                       <tr class="gray">
                        <td>&nbsp;</td>
                        <td><input type="submit" name="button" id="button" value="Submit" class="btn_02"></td>
                        <td>&nbsp;</td>
                      </tr>
                  </table>    
				  </form>           
              </div>            
            </div>
            <?php include("sidebar.php")?>
		</section>		
		<!--end body-->	
		<div style="display: none;">
		<div id="inline0" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/sec_ans")?>">
			
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
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" id="change_email">
			<input name="field" type="hidden" value="email" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Email</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Enter Your New Email:</p><br /></label>
			
			</td><td>
		   <input type="text" name="email"  style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		<div id="inline3" style="width:400px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" id="edit_phone">
			<input name="field" type="hidden" value="phone_no" />
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
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" id="edit_add">
			<input name="field" type="hidden" value="address" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Address</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Enter Your Address:</p><br /></label>
			
			</td><td>
		  <textarea name="address"  id="address" class="textarea1" style="height:120px; width:330px;"> </textarea></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
	</div>
    <div class="clear"></div>
	