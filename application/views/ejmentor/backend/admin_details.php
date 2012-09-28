		<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
		<!--start body-->
	<?php if($this->session->userdata('adminid')){ ?>	
<div id="top_pannel_bg">
<div class="top_pannel">
<ul>
<li><a href="<?php echo site_url("/admin/index/home")?>" class="here"> Account Details</a></li>
<li><a href="#"> Schools</a></li>
<li><a href="#"> Users</a></li>
<li><a href="#"> Auto Emails </a></li>
<li><a href="#"> Documents</a></li>
</ul>
</div>
</div>
<?php } ?>
		<section id="body">		
		 	<div class="body_left"> 
             <h1>Administrator <span>Details</span></h1>         	
                <div class="howit_works">
				<div style="background: #fff; padding: 15px 0;">
				<div style="width: 128px; height: auto; float: left; background: #fff; border: 1px solid #c9c8c8; margin: 0 5px;"> 




<?php  if($admindetail['admin_image']) { ?>
					 <img src="<?php echo site_url()?>uploads/<?=$admindetail['admin_image']?>" alt="" width="120"   style="vertical-align: top; border:0; margin: 5px 5px;">
					 
					 <?php  } else { ?>
					 
					 <img src="<?php echo site_url()?>uploads/no_icon.gif" alt="" width="120">
					 <?php } ?>




</div>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form" style=" width: 490px; float: right; margin: 0 5px 0 0;">
                       <tr class="gray">
                        <td width="210" class="right_align"><strong> First Name :</strong></td>
                        <td><?=$admindetail['admin_fname']?></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr class="gray2">
                        <td class="right_align"><strong> Last Name :</strong></td>
                        <td><?=$admindetail['admin_lname']?></td>
                        <td>&nbsp;</td>
                      </tr>
                       <tr class="gray">
                        <td class="right_align"><strong>Email Addres :</strong></td>
                        <td><?=$admindetail['admin_email']?></td>
                        <td><a href="#">Edit</a></td>
                      </tr>
                      <tr class="gray2">
                        <td class="right_align"><strong>Phone :</strong></td>
                        <td><?=$admindetail['admin_phone_no']?></td>
                        <td><a href="#">Edit</a></td>
                      </tr>
                       <tr class="gray">
                        <td class="right_align"><strong>Address :<span></span></strong></td>
                        <td style="line-height:14px; padding-top:9px;"><?=$admindetail['admin_address']?><br>
                          </td>
                        <td style="line-height:14px; padding-top:9px;"><a href="#">Edit</a></td>
                      </tr> 
                  </table>  
				  <div class="clear"></div>             
              </div> 
			  <div class="clear"></div> 
			  </div>            
            </div>
			 <?php include("sidebar.php")?>
		</section>		
		<!--end body-->	
		<div class="clear"></div>
