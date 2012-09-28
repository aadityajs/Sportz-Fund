	<script>
			$(document).ready(function() {
			
		
				$("#various2").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various3").fancybox();
			
			$("#various9").fancybox();

			$("#various4").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
            
			$("#various5").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
			
			$("#various6").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
			
			$("#various7").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
			
			$("#various8").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});
				

			});
			
			
			function lookup(keyword_app)
{
	if(keyword_app.length == 0)
	{	
		$('#suggestions').hide();
	}
	else
	{	
		$.post("<?php echo base_url();?>/mentor/fetch_schools", {queryString: ""+keyword_app+""}, function(data){
		
		
		
			if(data.length >0) {
			
			//alert('hhhiu');
				$('#suggestions').show();
				$('#autoSuggestionsList').html(data);
			}
		});
	}
}
// lookup
			
function fill2(thisValue)


{

 n=thisValue.split("__");



fill(n[0]);
fill3(n[1]);




}

function fill(thisValue)
{
	$('#keyword_app').val(thisValue);
	
	setTimeout("$('#suggestions').hide();", 200);
}




function fill3(thisValue)
{
	
	$('#member_id').val(thisValue);
	setTimeout("$('#suggestions').hide();", 200);
}


			
		
</script>
<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
	
	<!--start body-->
	<?php include("tabs.php")?>
		<section id="body">		
           <h1>Mentor<span>Profile</span></h1>         	
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
                          </table>
                        </td>
                        <td>
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr class="gray">
                                <td class="font14"><strong>Student at:</strong></td>
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
							  
							                                <tr class="gray">
                                <td class="font14"><strong>Mentors at:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								
								 <?php 
					
					if($men_schools)
					{
					
foreach($men_schools as $rowsc)
					{
					
					?>
                                  <tr class="gray_dot">
                                    <td><?=$rowsc['school_name']?></td>
                                    <td class="right_align"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a href="<?php echo site_url("mentor/remove_mentor_school")?>/<?=$rowsc['id']?>">Remove</a><?php } ?></td>
                                  </tr>
								   <?php } } ?>
								  
								  
                                  
                                </table></td>
                              </tr>
							  <?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> 
                              
                              <tr class="gray">
                                <td class="font14"><strong>Add a School</strong></td>
                              </tr>
							  
				
							  
							  
                             <tr class="gray2">
                                <td style="padding:6px 6px;">
								
								<form action="<?php echo site_url("mentor/add-mentor-school")?>" method="post">
								
								<input name="url" type="hidden" value="<?=$url?>" />
								
								               	<input name="keyword_app" class="txtbox2" id="keyword_app" type="text" onkeyup="lookup(this.value);"  style="width:440px;" value="<?php if($this->input->post('memuname')!=""){echo $this->input->post('memuname');}else if($this->session->userdata('memuname')!=""){echo $this->session->userdata('memuname');}?>" ><br/>
				
			<input name="school_id"  id="member_id" type="hidden" value="<?php if($this->input->post('search_member_id')!=""){echo $this->input->post('search_member_id');}else if($this->session->userdata('search_member_id')!=""){echo $this->session->userdata('search_member_id');}?>" />
			
			
								<div class="suggestionsBox" id="suggestions" style="display: none;">
                    <div class="suggestionList" id="autoSuggestionsList"></div>
                </div>
								
								
								
								
								<input type="submit" name="sub" value="Submit" class="green_btn" style="float: right; margin: 5px 0"/>
								
								</form>
								
								
								<!--<input name="textfield4" type="text" class="txtbox2" id="textfield4" style="width:440px;" value="enter zip code">--></td>
                              </tr>
							  <?php } ?>
							  
							  <tr class="gray">
                                <td class="font14"><strong>Availability:</strong><span style="text-align:right; float:right; padding-right:5px; font-weight:normal; font-size:12px;"><?php if($this->session->userdata('userid')==$myachdetail['user_id']) {?> <a id="various8" href="#inline8">Edit</a><?php } ?></span></a></td>
                              </tr>
                              <tr class="gray2">
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="calender">
                                  <tr>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                  </tr>
                                  <tr>
								  
								  <?php 
									
									//echo $myachdetail['mentoring_day'] ;
									
									
									if ($myachdetail['mon']=='Y')  { ?><td>
                                      <?php echo "";?> </td> <?php } elseif($myachdetail['mon']=='N') { ?> <td class="cross"><?php echo 'X'; ?></td><?php  } else { ?> <td> <?php echo $myachdetail['mon']; ?> </td><?php } ?>
                                   <?php 
									
									//echo $myachdetail['mentoring_day'] ;
									
									
									if ($myachdetail['tue']=='Y')  { ?><td>
                                      <?php echo "";?> </td> <?php } elseif($myachdetail['tue']=='N') { ?> <td class="cross"><?php echo 'X'; ?></td><?php  } else { ?> <td> <?php echo $myachdetail['tue']; ?> </td><?php } ?>
                                    <?php 
									
									//echo $myachdetail['mentoring_day'] ;
									
									
									if ($myachdetail['wed']=='Y')  { ?><td>
                                      <?php echo "";?> </td> <?php } elseif($myachdetail['wed']=='N') { ?> <td class="cross"><?php echo 'X'; ?></td><?php  } else { ?> <td> <?php echo $myachdetail['wed']; ?> </td><?php } ?>
                                   <?php 
									
									//echo $myachdetail['mentoring_day'] ;
									
									
									if ($myachdetail['thu']=='Y')  { ?><td>
                                      <?php echo "";?> </td> <?php } elseif($myachdetail['thu']=='N') { ?> <td class="cross"><?php echo 'X'; ?></td><?php  } else { ?> <td> <?php echo $myachdetail['thu']; ?> </td><?php } ?>
                                  </tr>
								  
								 
                                </table></td>
                              </tr> 						  
				  			  
				     <tr><td style="background: #FFFFFF;"><?php  if($val!="" && $check<1) {?> <a id="various9" href="#inline9"<?php /*?>href="<?php echo site_url("achiever/select-mentor")?>/<?=$uid?>"<?php */?> style="width: auto;height: 30px;font: bold 11px/30px Arial, Helvetica, sans-serif;margin: 10px 0 10px 60px;padding: 0 12px; float: none; display:inline-block; color: #fff;background: #2a5949;border: 0px;border-radius: 4px;cursor: pointer;">Select this Mentor</a> <a href="#" style="width: auto;height: 30px;font: bold 11px/30px Arial, Helvetica, sans-serif;margin: 10px 0 10px 60px;padding: 0 12px; float: none; display:inline-block; color: #fff;background: #2a5949;border: 0px;border-radius: 4px;cursor: pointer;">Return to list</a><?php } ?></td>
							   </tr>                            
                               <tr class="gray2">
                                <td style="padding-bottom:8px; text-align:center;">
								<?php if($this->session->userdata('userid')==$myachdetail['user_id']) { ?>
								<form method="post" action="<?php echo site_url("mentor/is_submitted")?>" enctype="multipart/form-data">
								<input name="field" type="hidden" value="is_submitted" />
								<input name="url" type="hidden" value="<?=$url?>" />
								<input name="abt_me" type="hidden" value=" <?=$myachdetail['about_me']?>" />
								<input name="fav_subject" type="hidden" value=" <?=$myachdetail['fav_sub']?>" />
								<input name="lst_fav_sub" type="hidden" value=" <?=$myachdetail['least_fav_sub']?>" />
								<input name="fav_fd" type="hidden" value=" <?=$myachdetail['fav_food']?>" />
								<input name="fav_show" type="hidden" value=" <?=$myachdetail['fav_tv_show']?>" />
								<input name="image" type="hidden" value=" <?=$myachdetail['image']?>" />
								
								<input type="hidden" name="is_submitted" value="Y"/>
								<?php if($myachdetail['is_submitted'] == 'N') { ?><input type="submit" name="submit" id="button" value="Submit" class="btn_02"> <?php } else { ?>
								<label>Your Profile has been submitted.</label>
								<?php }?>
								</form>
								<?php } ?>
								</td>
                              </tr>                              
                          </table>
                        </td>
                        <td width="260">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr class="gray">
                                <td class="font14"><strong>Faculty Sponsor</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td style="line-height:16px; padding:6px 6px;">
								
								<?php  if($faculty_coordinator['image']) { ?>
                                <img src="<?php echo site_url()?>uploads/<?=$faculty_coordinator['image']?>" alt="" width="221" class="user_img2" height="228">
								<?php  } else { ?>
								<img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="221" class="user_img2" height="228">
								<?php } ?>
								
								
                                
								
								
								
                                <strong><?=$faculty_coordinator['fname']?></strong><br>
                                  <?php echo $school[0]['school_name'] ?>
                                  <br>
                                <?=$faculty_coordinator['email']?></td>
                              </tr>                              
                              <!--<tr class="gray">
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
                              </tr>-->
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
	  <div id="inline2" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>">
			<input name="field" type="hidden" value="about_me" />
			<input name="url" type="hidden" value="<?=$url?>" />
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
		<div id="inline3" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/edit")?>" >
			<input name="field" type="hidden" value="fav_sub" />
			<input name="url" type="hidden" value="<?=$url?>" />
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
			<input name="url" type="hidden" value="<?=$url?>" />
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
			<input name="url" type="hidden" value="<?=$url?>" />
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
			<input name="url" type="hidden" value="<?=$url?>" />
			
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
			
			
			<input name="url" type="hidden" value="<?=$url?>" />
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
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Set Your Availability</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Availability:</p><br /></label>
			
			</td><td>
	 <input name="available_days[]" type="checkbox" value="M" <?php if ($myachdetail['mon']=='Y')  {
                                      echo "checked"; } elseif($myachdetail['mon']=='N') { echo ''; } else { echo "disabled"; } ?>/>Monday</td><td>
		 <input name="available_days[]" type="checkbox" value="Tu" <?php if ($myachdetail['tue']=='Y')  {
                                      echo "checked"; } elseif($myachdetail['tue']=='N') { echo ''; } else { echo "disabled"; } ?>/>Tuesday</td><td>
		 <input name="available_days[]" type="checkbox" value="W" <?php if ($myachdetail['wed']=='Y')  {
                                      echo "checked"; } elseif($myachdetail['wed']=='N') { echo ''; } else { echo "disabled"; } ?>/>Wednesday</td><td>
		 <input name="available_days[]" type="checkbox" value="Th" <?php if ($myachdetail['thu']=='Y')  {
                                      echo "checked"; } elseif($myachdetail['thu']=='N') { echo ''; } else { echo "disabled"; } ?>/>Thursday</td>
		<!-- <input name="available_days[]" type="checkbox" value="F" />Friday</td><td>
		 <input name="available_days[]" type="checkbox" value="S" />Saturday</td><td>
		 <input name="available_days[]" type="checkbox" value="Su" />Sunday</td><td>-->
		
		 </tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		
		
		<div id="inline9" style="width:600px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("achiever/select-mentor")?>" >
			<input name="field" type="hidden" value="available_days" />
			<input name="mentor" type="hidden" value="<?=$uid?>" />
			
			
			<input name="url" type="hidden" value="<?=$url?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">You are selecting Sally N. to be your EJ Mentor.
Please choose the days when you would like to meet:
(you may select only one or two of the available days below)</p><br />
			
			<table>
			
			<tr><td>
		 <input name="mentoring_days[]" type="checkbox" value="M" <?php if ($myachdetail['mon']=='N')  {
                                      echo "disabled"; } ?>/>Monday</td><td>
		 <input name="mentoring_days[]" type="checkbox" value="Tu" <?php if ($myachdetail['tue']=='N') {
                                      echo "disabled"; } ?>/>Tuesday</td><td>
		 <input name="mentoring_days[]" type="checkbox" value="W" <?php if ($myachdetail['wed']=='N') {
                                      echo "disabled"; } ?>/>Wednesday</td><td>
		 <input name="mentoring_days[]" type="checkbox" value="Th" <?php if ($myachdetail['thu']=='N') {
                                      echo "disabled"; } ?>/>Thursday</td>
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