	<script>
			$(document).ready(function() {
			
		
				$("#various2").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various3").fancybox();

			$("#various4").fancybox({
			
				
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
            
			$("#various5").fancybox({
			
				
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
			
			$("#various6").fancybox({
		
			
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
			
			$("#various7").fancybox({
			
				
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
			
			$("#various8").fancybox({
		
				
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
				

			});
			
			
		
</script>
<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
	
	<!--start body-->
	<?php include("tabs.php")?>
		<section id="body">		
           <h1>Faculty Sponsor<span> Profile</span></h1>         	
           <div class="common_box">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
                       <tr>
                        <td width="170" class="right_align">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							  
							  <?php  if($myachdetail['image']) { ?>
                                <td><img src="<?php echo site_url()?>uploads/<?=$myachdetail['image']?>" alt="" width="221" class="user_img" height="228"></td>
								<?php  } else { ?>
								<td><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="221" class="user_img" height="228"></td>
								<?php } ?>
                              </tr>
                              <tr class="gray">
                                <td><?=$myachdetail['fname']?> <span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various7" href="#inline7">Edit</a><?php } ?></span></a></td>
                              </tr>
                              <tr class="gray2">
                                <td><strong>Sex :</strong> <?=$myachdetail['sex']?></td>
                              </tr>
                          </table>
                        </td>
                        <td>
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr class="gray">
                                <td class="font14"><strong>School:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td><?php echo $school[0]['school_name'] ?></td>
                              </tr>
                              
                              <tr class="gray">
                                <td class="font14" width="80%"><strong>About Me:</strong><span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various2" href="#inline2">Edit</a><?php } ?></span></td>
                              </tr>
                              <tr class="gray2">
                                <td style="padding:6px 6px;"><?=$myachdetail['about_me']?></td>
                              </tr>
							 <!-- <tr class="gray">
                                <td class="font14"><strong>Availability:</strong><span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various8" href="#inline8">Edit</a><?php } ?></span></a></td>
                              </tr>-->
                              <!--<tr class="gray2">
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="calender">
                                  <tr>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                  </tr>
                                  <tr>
								  
								  
								  
                                    <td><?php 
									
									$days=explode(",",$myachdetail['available_days']);
									
									if (!in_array("M", $days)) {
                                      echo "X"; } ?></td>
                                    <td><?php							
									if (!in_array("Tu", $days)) {
                                       echo "X"; } ?></td>
                                    <td><?php							
									if (!in_array("W", $days)) {
                                       echo "X"; } ?></td>
                                    <td><?php							
									if (!in_array("Th", $days)) {
                                       echo "X"; } ?></td>
                                  </tr>
                                </table></td>
                              </tr>-->                              
                               <tr class="gray2">
                                <td style="padding-bottom:8px;"><!--<input type="submit" name="button" id="button" value="Send" class="btn_02">--></td>
                              </tr>                              
                          </table>
                        </td>
                        <td width="260">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <!--  <tr class="gray">
                                <td class="font14"><strong>Achiever Coordinator</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td style="line-height:16px; padding:6px 6px;">
                                <img src="<?php /*echo site_url()?>uploads/<?=$faculty_coordinator['image']*/?>" alt="" width="221" class="user_img2" height="228">
                                <strong><?/*=$faculty_coordinator['fname']*/?></strong><br>
                                  <?php /*echo $school[0]['school_name']*/ ?>
                                  <br>
                                <?/*=$faculty_coordinator['email']*/?></td>
                              </tr>  -->                            
                              <tr class="gray">
                                <td class="font14"><strong>Favorite Subjects:</strong><span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various3" href="#inline3">Edit</a><?php } ?></span></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                 <?=$myachdetail['fav_sub']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Least Favorite Subjects:</strong> <span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various4" href="#inline4">Edit</a><?php } ?></span></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                  <?=$myachdetail['least_fav_sub']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Favorite Food:</strong><span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various5" href="#inline5">Edit</a><?php } ?></span></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                 <?=$myachdetail['fav_food']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Favorite T.V. Show:</strong><span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various6" href="#inline6">Edit</a><?php } ?></span></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                               <?=$myachdetail['fav_tv_show']?>
                                </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                  </table>               
          </div>            
		</section>		
		<!--end body-->	
        		
	  <div class="clear"></div>
      
      
	  <div style="display: none;">
	  <div id="inline2" style="width:600px;height:300px;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>">
			<input name="field" type="hidden" value="about_me" />
			<input name="url" type="text" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit About You</p><br />
			
			<table>
			
			<tr><td>
			<label><p>About Me:</p><br /></label>
			
			</td><td>
		  <textarea name="about_me" class="textarea1" style="height:120px; width:440px;" id="textfield10"><?=$myachdetail['about_me']?></textarea></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
        </div>
        
        <div id="inline3" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" >
			<input name="field" type="hidden" value="fav_sub" />
			<input name="url" type="text" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Your Favorite Subject</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Favorite Subjects:</p><br /></label>
			
			</td><td>
		  <input type="text" name="fav_sub" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;" id="fav_sub" value="<?=$myachdetail['fav_sub']?>"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		<div id="inline4" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" >
			<input name="field" type="hidden" value="least_fav_sub" />
			<input name="url" type="text" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Your Least Favorite Subject</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Least Favorite Subjects:</p><br /></label>
			
			</td><td>
		  <input type="text" name="least_fav_sub" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;" id="fav_sub" value="<?=$myachdetail['least_fav_sub']?>"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		<div id="inline5" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" >
			<input name="field" type="hidden" value="fav_food" />
			<input name="url" type="text" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Your Favorite Food</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Favorite Food:</p><br /></label>
			
			</td><td>
		  <input type="text" name="fav_food" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;" id="fav_sub" value="<?=$myachdetail['fav_food']?>"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		<div id="inline6" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" >
			<input name="field" type="hidden" value="fav_tv_show" />
			<input name="url" type="text" value="<?=$url?>" />
			
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Your Favorite TV Show</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Favorite TV Show:</p><br /></label>
			
			</td><td>
		  <input type="text" name="fav_tv_show" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;" id="fav_sub" value="<?=$myachdetail['fav_tv_show']?>"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		<div id="inline7" style="width:600px;height:auto;overflow:auto;">
			
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit_three")?>" name="edit_name">
			
			
			<input name="url" type="text" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit Your Data</p><br />
			
			<table>
				
			<input name="field" type="hidden" value="fname" />
			<tr><td>
			<label><p>Name:</p><br /></label>
			
			</td><td>
			
		
		  <input type="text" name="fname" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;" id="fav_sub" value="<?=$myachdetail['fname']?>"/></td></tr>
			
		
		
		
		
			<tr><td>
			<label><p>Sex:</p><br /></label>
			
			</td><td>
			
		
		  <select name="sex">
		  <option value="male" <?php if($myachdetail['sex']=='Male') { ?> selected="selected" <?php } ?>>Male</option>
		   <option value="female" <?php if($myachdetail['sex']=='Female') { ?> selected="selected" <?php } ?>>Female</option>
		  
		  
		  </select></td></tr>
			
		
		
		
			
			<tr><td>
			<label><p>Image:</p><br /></label>
			
			</td><td>
			
			<?php if($myachdetail['image']) {?>
			
			 <img src="<?php echo site_url()?>uploads/<?=$myachdetail['image']?>" alt="" width="100" class="user_img2" height="100">
			 <a href="<?php echo site_url("user/delete_image")?>">Delete</a>
			 
			 <?php } ?>
		
		 <input type="file" name="userfile" style="background: #f5f5f5; border: 1px solid #CCCCCC; width: 180px; height: 24px;margin: 2px 0;"/></td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn" />
			</center>
			</form>
		</div>
		
				<div id="inline8" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit_availability")?>" >
			<input name="field" type="hidden" value="available_days" />
			<input name="url" type="text" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Set Your Availability</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Availability:</p><br /></label>
			
			</td><td>
		 <input name="available_days[]" type="checkbox" value="M" <?php if (in_array("M", $days)) {
                                      echo "checked"; } ?>/>Monday</td><td>
		 <input name="available_days[]" type="checkbox" value="Tu" <?php if (in_array("Tu", $days)) {
                                      echo "checked"; } ?>/>Tuesday</td><td>
		 <input name="available_days[]" type="checkbox" value="W" <?php if (in_array("W", $days)) {
                                      echo "checked"; } ?>/>Wednesday</td><td>
		 <input name="available_days[]" type="checkbox" value="Th" <?php if (in_array("Th", $days)) {
                                      echo "checked"; } ?>/>Thursday</td><td>
		<!-- <input name="available_days[]" type="checkbox" value="F" />Friday</td><td>
		 <input name="available_days[]" type="checkbox" value="S" />Saturday</td><td>
		 <input name="available_days[]" type="checkbox" value="Su" />Sunday</td><td>-->
		
		 </tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		</div>