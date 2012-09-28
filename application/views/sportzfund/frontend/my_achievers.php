<script>
$(document).ready(function() {
			$("#various1").fancybox().trigger('click')({
            'autoScale': true,
            'transitionIn': 'none',
            'transitionOut': 'none'
        });
			});
</script>
		<!--start body-->
		<?php include("tabs.php")?>
	<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
		<section id="body">	
		
		
		
		<?php if($my_achievers)
		
		
		{
		
		
		foreach($my_achievers as $row)
		
		{
		
		
		?>
		
		
	
		
             <h1>My <span>Mentor</span></h1>
           <div class="common_box">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
                       <tr>
                        <td width="170" class="right_align">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							  
							  
							  <?php  if($row['image']) { ?>
					 <td><img src="<?php echo site_url()?>uploads/<?=$row['image']?>" alt="" width="221" class="user_img" height="228"></td>
					 
					 <?php  } else { ?>
					 
					 <td><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="221" class="user_img" height="228"></td>
					 <?php } ?>
							  
                               
								
								
								
                              </tr>
                              <tr class="gray">
                                <td><?=$row['fname']?></td>
                              </tr>
                              <tr class="gray2">
                                <td><strong>Sex :</strong> <?=$row['sex']?></td>
                              </tr>
							  <tr class="gray">
                                <td class="font14"><strong>Favorite Subjects:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                 <?=$row['fav_sub']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Least Favorite Subjects:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                  <?=$row['least_fav_sub']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Favorite Food:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                 <?=$row['fav_food']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Favorite T.V. Show:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                               <?=$row['fav_tv_show']?>
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
                                <td><?php echo $row['school_name'] ?></td>
                              </tr>
                              
                              <tr class="gray">
                                <td class="font14" width="80%"><strong>About Me:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td style="padding:6px 6px;"><?=$row['about_me']?></td>
                              </tr>
							  
							                                
                              
							
							  
							  
                               						  
				  			   
				     <tr><td style="background: #FFFFFF;"></td>
							   </tr>                            
                               <tr class="gray2">
                                <td style="padding-bottom:8px; text-align:center;">
							
								</td>
                              </tr>  
							  
							  
							  <form method="post" action="<?php echo site_url("mentor/send-achiever-message")?>" enctype="multipart/form-data"> 
							  <input name="achiever_id" type="hidden" value="<?=$row['user_id']?>" /> 
							  
							   <input name="achiever_mail" type="hidden" value="<?=$row['email']?>" />  
                              <tr class="gray">
                                <td class="font14"><strong>Send a Message:</strong></td>
                              </tr>
                            <tr class="gray2">
                                <td style="padding:6px 6px;"><input name="subject" type="text" class="txtbox2" id="textfield4" style="width:440px;" value="subject"></td>
                              </tr>
                              <tr class="gray2">
                                <td style="padding:6px 6px;"><textarea name="msg" class="textarea1" style="height:120px; width:440px;" id="textfield10">Your Message</textarea></td>
                              </tr>                               
                                                            
                               <tr class="gray2">
                                <td style="padding-bottom:8px;"><input type="submit" name="button" id="button" value="Send" class="btn_02"></td>
                              </tr>  
							  
							  </form>                             
                          </table>
                        </td>
                        <td width="260">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr class="gray">
                                <td class="font14"><strong>Faculty Sponsor</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td style="line-height:16px; padding:6px 6px;">
								
								<?php  if($row['imageco']) { ?>
                                <img src="<?php echo site_url()?>uploads/<?=$row['imageco']?>" alt="" width="221" class="user_img2" height="228">
								<?php  } else { ?>
								<img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="221" class="user_img2" height="228">
								<?php } ?>
								
								
                                
								
								
								
                                <strong><?=$row['fnm']?></strong><br>
                                  <?php echo $row['school_name'] ?>
                                  <br>
                                <?=$row['emailco']?></td>
                              </tr>                              
                              <!--<tr class="gray">
                                <td class="font14"><strong>Favorite Subjects:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                 <?=$row['fav_sub']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Least Favorite Subjects:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                  <?=$row['least_fav_sub']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Favorite Food:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                                 <?=$row['fav_food']?>
                                </td>
                              </tr>
                              <tr class="gray">
                                <td class="font14"><strong>Favorite T.V. Show:</strong></td>
                              </tr>
                              <tr class="gray2">
                                <td  style="padding:6px;">
                               <?=$row['fav_tv_show']?>
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
		
		<!--end body-->	
	
	
	
	
	<?php	
		
		}
		
		}
		
		else
		{
		
		?>
		
		
		
		
		
		
		
		
		
		
	<!--	<a href="#inline1" id="various1" style="display:none;"></a>	-->	
           <h1>My <span>Mentor</span></h1>         	
           <div class="common_box">
                	               
			<div >	
        		<div id="inline1" style="width:400px;height:auto;overflow:auto;">
				<center>
				<p><label>You have not yet selected a mentor.</label></p>
				<p><label>To find available mentors for your school,<br/>visit the <strong>Find a Mentor</strong> tab.</label></p>
				</center>
				</div>
		</div>
	  <div class="clear"></div>
					   
								   
          </div>            
		</section>		
		<!--end body-->
			  
	  <?php } ?>
	