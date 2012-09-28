<?php
$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}
?>
	<!--start body-->
		<section id="body">
		 	<div class="body_left">
             <h1>Register <span>an Achiever School</span></h1>
				<?php
				if ($this->session->flashdata('message')){
			   ?>
				<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
				<?php
				 }
				?>
                <div class="howit_works">
                <form method="post" enctype="multipart/form-data" id="achiever" name="achiever">
				<input type="hidden" name="temp_password" value="<?php echo $password;?>">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
                      <tr>
                        <td width="210" class="right_align"><strong>First Name <span>*</span></strong></td>
                        <td><input type="text" name="fname" id="textfield" class="txtbox2" value="<?php if(isset($postval['fname'])) echo $postval['fname']?>"></td>
                      </tr>
                      <tr>
                        <td class="right_align"><strong>Last Name <span>*</span></strong></td>
                        <td><input type="text" name="lname" id="textfield2" class="txtbox2" value="<?php if(isset($postval['lname'])) echo $postval['lname']?>"></td>
                      </tr>
                      <tr>
                        <td class="right_align"><strong>Email Address <span>*</span></strong></td>
                        <td><input type="text" name="email" id="textfield3" class="txtbox2" value="<?php if(isset($postval['email'])) echo $postval['email']?>">
						<br/><label style="font-size:11px;"><b>ex: example@exam.com</b></label>
						</td>
                      </tr>
					  <tr>
                        <td class="right_align"><strong>Re-type Email Address <span>*</span></strong></td>
                        <td><input type="text" name="remail" id="textfield9" class="txtbox2" value="<?php if(isset($postval['remail'])) echo $postval['remail']?>">
						<br/><label style="font-size:11px;"><b>ex: example@exam.com</b></label>
						</td>
                      </tr>
                      <tr>
                        <td class="right_align"><strong>School <span>*</span></strong></td>
                        <td><?php
					  $js = 'class="selectbg"'; echo form_dropdown('school',$schools,'',$js);?><!--<input type="text" name="school" id="textfield4" class="txtbox2" value="<?php //if(isset($postval['school'])) echo $postval['school']?>">
						<br/><label style="font-size:11px;"><b>ex: Anywhere High school</b></label>-->
						</td>
                      </tr>
                      <tr>
                        <td class="right_align"><strong>Address <span>*</span></strong></td>
                        <td><input type="text" name="address" id="textfield5" class="txtbox2" value="<?php if(isset($postval['address'])) echo $postval['address']?>">
						<br/><label style="font-size:11px;"><b>ex: Street, City, State, Zip code</b></label>
						<input type="hidden" name="hid" value="<?php printf( uniqid());?>">
						</td>
                      </tr>
                      <tr>
                        <td class="right_align"><strong>Phone <span>*</span></strong></td>
                        <td><input type="text" name="phone_no" id="textfield6" class="txtbox2" value="<?php if(isset($postval['phone_no'])) echo $postval['phone_no']?>">
						<br/><label style="font-size:11px;"><b>ex: (555) 555 - 1234</b></label>
						</td>
                      </tr>
                      <tr>
                        <td class="right_align"><strong>Best time to call <span>*</span></strong></td>
                        <td><input type="text" name="best_time" id="textfield7" class="txtbox2" value="<?php if(isset($postval['best_time'])) echo $postval['best_time']?>">
						<br/><label style="font-size:11px;"><b>ex: 4:00 PM</label>
						</td>
                      </tr>
                      <!--<tr>
                        <td class="right_align"><strong>Username <span>*</span></strong></td>
                        <td><input type="text" name="username" id="textfield8" class="txtbox2" value="<?php /*if(isset($postval['username'])) echo $postval['username']*/?>">

						</td>
                      </tr>-->
                      <tr>
                        <td class="right_align"><strong>how did you hear about us? <span>*</span></strong></td>
                        <td><input type="text" name="how_did" id="textfield10" class="txtbox2" value="<?php if(isset($postval['how_did'])) echo $postval['how_did']?>"></td>
                      </tr>
                      <tr>
                        <td class="right_align" style="line-height:13px;"><strong>Please Provide Some<br> Background about your school<br>and its needs <span>*</span></strong></td>
                        <td><textarea name="school_back" class="textarea1" style="height:120px; width:330px;" id="textfield11"><?php if(isset($postval['school_back'])) echo $postval['school_back']?></textarea></td>
                      </tr>
                      <tr>
                        <td class="right_align" style="line-height:13px;"><strong>Student at your school <br>need tutoring and are <br>on free or reduced lunch </strong></td>
                        <td class="radio_txt">
                         <input type="radio" checked="checked" name="reduced_lunch" id="radio" value="Yes">
                          Yes
                          <input type="radio" name="reduced_lunch" id="radio2" value="No">
                          No</td>
                      </tr>
                      <tr>
                        <td class="right_align" style="line-height:13px;"><strong>I can provide space <br>at the school for supervised <br>turoring to take place on <br>a regular basis  <span>*</span></strong></td>
                        <td class="radio_txt">
                         <input type="radio" checked="checked" name="provide_space" id="radio" value="Yes">
                          Yes
                          <input type="radio" name="provide_space" id="radio2" value="No">
                          No</td>
                      </tr>
                      <tr>
                        <td class="right_align" style="line-height:13px;"><strong>Ej mentors programs<br> is approved by the <br>school principal</strong></td>
                        <td class="radio_txt">
                         <input type="radio" checked="checked" name="principal_approval" id="radio" value="Yes">
                          Yes
                          <input type="radio" name="principal_approval" id="radio2" value="No">
                          No</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" id="button" value="Submit" class="btn_02"></td>
                      </tr>
                  </table>
                  </form>
                </div>
            </div>
            <div class="body_right">
               <div style="padding-top:20px;"><img src="<?php echo $this->config->item('theme_url')?>images/facebook_list.png" alt=""></div>
                <div class="login_box">
               	  <h1>Success Members</h1>
                   <div class="user"><img src="<?php echo $this->config->item('theme_url')?>images/user_01.png" alt=""> Went dv shoppin with Coordinat aughter gaga earfones.</div>
                   <div class="user"><img src="<?php echo $this->config->item('theme_url')?>images/user_02.png" alt=""> Went dv shoppin with Coordinat aughter gaga earfones.</div>
                   <div class="see_all"><a href="#">See All &raquo;</a></div>
                  <div class="clear"></div>
                </div>
            </div>
		</section>
		<!--end body-->

         <div class="clear"></div>