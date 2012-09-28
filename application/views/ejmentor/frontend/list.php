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

<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
		<!--start body-->
		<?php //include("tabs.php")?>
		     <div class="body_left" style="width:930px;">                   	
             <div class="howit_works" style="width:930px;">                	            
                  <div class="top_box">				  
				    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="form">
                      <tr>
                     <!--<td width="3%"><input type="checkbox" name="checkbox" value="checkbox"></td>
                        <td width="12%">Achiever School </td>
                        <td width="3%"><input type="checkbox" name="checkbox" value="checkbox"></td>
                        <td width="46%">Mentor School</td>
                        <td width="16%">&nbsp;</td>-->
                        <td style="text-align:right;"><?php if($this->session->userdata('userid') != '' && $userdetail['account_type'] == 'Achiever'){ ?><a id="add" href="#hidden">Add an Achiever</a><?php } else {} ?></td>
                      </tr>
                    </table>
				  </div>
				  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0"></div>
			   <div class="top_box" style="background:none;">
				   <div>
				   <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tr>
					    <td width="11%" style="padding: 10px 0 10px 10px;">&nbsp;</td>
                        <td width="18%" style="padding: 10px 0 0 0;"><strong>Achievers</strong></td>
                        <td width="12%" style="padding: 10px 0 0 0;"><strong>Grade</strong></td>
                        <td width="20%" style="padding: 10px 0 0 0;"><strong>Email</strong></td>
                        <td width="12%" style="padding: 10px 0 0 0;"><strong>Sex</strong></td> 
                        <td width="27%" style="padding: 10px 0 0 0;"><strong>School</strong></td>
                        <!--<td width="14%"><strong>Staus</strong></td>
                        <td width="9%">&nbsp;</td>-->
                      </tr>
                    </table>
					</div>
					<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0"></div>		
<?php 

if($achieverdetail)
{

foreach($achieverdetail as $row)
					{
 ?>					
				   <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="details_box">
                      <tr>
					  <?php  if($row['image']) { ?>
					 <td width="10%" style="padding: 10px 0 10px 10px;"><img src="<?php echo site_url()?>uploads/<?=$row['image']?>" alt="" class="wrap" width="71" height="99"></td>
					 
					 <?php  } else { ?>
					 
					 <td width="10%" style="padding: 10px 0 10px 10px;"><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" class="wrap" width="71" height="99"></td>
					 <?php } ?>
                        <td width="18%" style="padding: 0px; vertical-align: middle;"><a href="<?php echo site_url("achiever/achiever_details")?>/<?=$row['user_id']?>"><?=$row['fname'].$row['lname']?></a></td>
                        <td width="10%" style="padding: 0px; vertical-align: middle;"><?=$row['grade']?></td>
                        <td width="22%" style="padding: 0px; vertical-align: middle;"><?=$row['email']?></td>
                        <td width="12%" style="padding: 0px; vertical-align: middle;"><?=$row['sex']?></td> 
                        <td width="26%" style="padding: 0px; vertical-align: middle;"><?=$row['school_name']?></td>
                       
                      </tr>
                    </table>
					
					<?php } }?>
					<p align="center"><?php echo $links; ?></p>
					<div style="display: none;">
		<div id="hidden" style="width:640px;height:380px;">
		<center>
		<form method="POST" enctype="multipart/form-data" action="<?php echo site_url("achiever/add_achiever")?>" id="add_achiver">
		<input name="school" type="hidden" value="<?php if($this->session->userdata('userid') != '') { echo $school[0]['school_id']; } ?>" />
		<input name="url" type="hidden" value="<?=$url?>" />
		<table>
                      <tr>
					  <td><label>First Name:</label></td>
					  <td><input type="text" name="achfname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;"></td>
					  </tr>
					  <tr>
					  <td><label>Last Name:</label></td>
                      <td><input type="text" name="achlname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;">
					  <input type="hidden" name="temp_password" value="<?php echo $password;?>">
					  <input type="hidden" name="achiver_coordinator/faculty_sponser" value="<?php echo $this->session->userdata('userid');?>">
					  </td>
					  </tr>
					  <tr>
					  <td><label>Middle Initial:</label></td>
                      <td><input type="text" name="achmname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;"></td>
					  </tr>
					  <tr>
					  <td><label>Sex:</label></td>
					  <td><select name="sex">
					  <option value="male">Male
					  </option>
					  <option value="female">Female
					  </option>
					  </select></td>
                      </tr>
					  <tr>
					  <td><label>Achiever Image:</label></td>
					  <td><input type="file" name="userfile" /></td>
                      </tr>
					  <tr>
					  <td><label>School:</label></td>
					  <td><?php if($this->session->userdata('userid') != '') { echo $school[0]['school_name']; } ?></td>
                      </tr>
					  <tr>
					  <td><label>Grade:</label></td>
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
					  <td><label>Email:</label></td>
					  <td><input id="achemail" type="text" name="achemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;"></td>
                      </tr>
					  <tr>
					  <td><label>Confirm Email:</label></td>
					  <td><input type="text" name="achcemail" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px; margin: 5px 0 2px 0;"></td>
                      </tr>
					  <tr>
					  <td colspan="2" align="center"><input type="checkbox" value="" name="check"><label>I have received the Achiever's completed and<br/> signed application and have reviewed it for accuracy.</label>
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