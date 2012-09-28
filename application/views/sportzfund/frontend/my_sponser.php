<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
			   <script>
			   
			   function hide($id)
			   {
			   
			   
			   document.getElementById($id).value="";
			   
			   }
			   </script>
			   
<!--start body-->
		<section id="body">		
           <h1>My <span>Sponser</span></h1>         	
           <div class="common_box">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
                       <tr>
                        <td width="170" class="right_align">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							  <?php  if($mentor_detail['image']) { ?>
                                <td><img src="<?php echo site_url()?>uploads/<?=$mentor_detail['image']?>" alt="" width="221" class="user_img" height="228"></td>
                              <?php  } else { ?>
							  <td><img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="221" class="user_img" height="228"></td>
							  <?php } ?>
							  </tr>
                              <tr class="gray">
                                <td><?=$mentor_detail['fname']?></td>
                              </tr>
                              <tr class="gray2">
                                <td><strong>Sex :</strong> <?=$mentor_detail['sex']?></td>
                              </tr>
                          </table>
                        </td>
                        <td>
						<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/send_message")?>" >
						<input name="url" type="hidden" value="<?=$url?>" />
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            
                              <tr class="gray2">
                                <td><?=$school [0]['school_name']?><br>
                                  <?=$mentor_detail['email']?></td>
                              </tr>                             
                                
                              <tr class="gray">
                                <td class="font14"><strong>Send a Message:</strong></td>
                              </tr>
                            <tr class="gray2">
                                <td style="padding:6px 6px;"><input name="subject" id="subject" type="text" class="txtbox2" id="textfield4" style="width:440px;" value="subject" onClick="hide('subject')"></td>
                              </tr>
                              <tr class="gray2">
                                <td style="padding:6px 6px;"><textarea name="msg"  id="msg" class="textarea1" style="height:120px; width:440px;" id="textfield10" onClick="hide('msg')">Your Message</textarea></td>
                              </tr>                              
                                                            
                               <tr class="gray2">
                                <td style="padding-bottom:8px;"><input type="submit" name="button" id="button" value="Send" class="btn_02"></td>
                              </tr>                              
                          </table>
						  </form>
                        </td>                        
                      </tr>
                  </table>               
          </div>            
		</section>		
		<!--end body-->	