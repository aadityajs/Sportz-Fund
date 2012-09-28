<?php
$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}
?>       
<script>
$(document).ready(function() {
		
	
			$(".selectbg").change(function() {

        
		var sclt_schl = $('.selectbg').val();
		
		
     	//alert(nominee);
		if(sclt_schl!='1')
		{   
       	   $('.form3').hide('');
		   $("#form31").attr("disabled", "disabled");
		   $("#form32").attr("disabled", "disabled");
		   $("#form33").attr("disabled", "disabled");
		   $("#form34").attr("disabled", "disabled");
		   $("#form35").attr("disabled", "disabled");
		   $("#form36").attr("disabled", "disabled");
		}
		else
		{
		  $('.form3').show('');
		  $("#form31").removeAttr("disabled");
			$("#form32").removeAttr("disabled");
			$("#form33").removeAttr("disabled");
			$("#form34").removeAttr("disabled");
			$("#form35").removeAttr("disabled");
			$("#form36").removeAttr("disabled");
		
		}
    });
});
</script>


		
		
		
		<!--start body-->
		<section id="body">		
           <h1>Faculty <span>Sponsor</span></h1>         	
           <div class="common_box">
           <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong> In aliquet pulvinar ipsum sollicitudin porta. Integer commodo arcu vel eros tristique pulvinar. Maecenas aliquet ipsum quis nunc facilisis auctor. Morbi commodo nibh justo, eu volutpat urna. Etiam ligula mi, cursus sed facilisis sed, mattis sit amet tortor. Nam at urna nisi, vel lacinia sem. Nunc vulputate feugiat orci vitae venenatis. Nulla urna turpis, aliquam nec ornare ut, fermentum vitae lacus. Cras sed gravida orci. Curabitur lacinia, mi sit amet feugiat mattis, nulla quam mollis sem, eget feugiat urna elit quis ante. Cras mattis mollis magna ac commodo. Integer commodo arcu vel eros tristique pulvinar.</div>
		 <div class="clear"></div>
		  <div class="common_box">
		  <form method="post" enctype="multipart/form-data" id="achiever" name="achiever">
		  <!--<form method="post" enctype="multipart/form-data" id="faculty" name="faculty" action="<?php echo site_url("register/faculty-sponsor")?>">-->
				<input type="hidden" name="hid" value="<?php printf( uniqid());?>">
				<input type="hidden" name="temp_password" value="<?php echo $password;?>">
		    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="form2">
              <tr>
                <td><table width="100%" border="0" cellpadding="2" cellspacing="2" class="form2">
                  <tr>
                    <td width="21%" align="left" valign="top"><h1>Select your School</h1></td>
                    <td width="32%" align="left" valign="top">
					
					
					 <?php
					  $js = 'class="selectbg"'; echo form_dropdown('school',$schools,'',$js);?>
					
					
					
					
					</td>
                    <td width="47%" align="left" valign="top">
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="form3">
                      <tr>
                        <td colspan="2"><span>If your school is not listed, register it below</span></td>
                      </tr>
                      <tr>
                        <th width="30%">School Name:</th>
                        <td width="70%"><input type="text" id="form31" name="school_name" style="width: 280px;" value="<?php if(isset($postval['school_name'])) echo $postval['school_name']?>"></td>
                      </tr>
                      <tr>
                        <th>Address:</th>
                        <td><textarea name="school_add" id="form32" class="textarea2"><?php if(isset($postval['school_add'])) echo $postval['school_add']?></textarea></td>
                      </tr>
                      <tr>
                        <th>State:</th>
                        <td><select name="school_state" id="form33" class="selectbg"><option value="al">Alabama</option></select></td>
                      </tr>
                      <tr>
                        <th>City:</th>
                        <td><input type="text" id="form34" name="school_city" value="<?php if(isset($postval['school_city'])) echo $postval['school_city']?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Zip Code:</th>
                        <td><input type="text" id="form35" name="school_zip" value="<?php if(isset($postval['school_zip'])) echo $postval['school_zip']?>">
                        </td>
                      </tr>
                      <tr>
                        <th>School Phone:</th>
                        <td><input type="text" id="form36" name="school_phone" value="<?php if(isset($postval['school_phone'])) echo $postval['school_phone']?>"></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="5" cellpadding="5" class="form2">
                  <tr>
                    <th width="17%">Title:</th>
                    <td width="83%"><select name="title" class="selectbg">
					<option>Mr.</option>
					<option>Ms.</option>
					<option>Mrs.</option>
                    </select>
					</td>
                  </tr>
                  <tr>
                    <th>First Name:</th>
                    <td><input type="text" name="fname" id="textfield" class="txtbox2" value="<?php if(isset($postval['fname'])) echo $postval['fname']?>"></td>
                  </tr>
                  <tr>
                    <th>Last Name:</th>
                    <td><input type="text" name="lname" id="textfield2" class="txtbox2" value="<?php if(isset($postval['lname'])) echo $postval['lname']?>"></td>
                  </tr>
                  <tr>
                    <th>Email:</th>
                    <td><input type="text" name="email" id="textfield3" class="txtbox2" value="<?php if(isset($postval['email'])) echo $postval['email']?>">
						<label style="font-size:11px;"><b>ex: example@exam.com</b></label></td>
                  </tr>
                  <tr>
                    <th>Confirm Email:</th>
                    <td><input type="text" name="remail" id="textfield9" class="txtbox2" value="<?php if(isset($postval['remail'])) echo $postval['remail']?>"></td>
                  </tr>
				  <!--<tr>
                         <th>Username <span>*</span> </th>
                        <td><input type="text" name="username" id="textfield8" class="txtbox2" value="<?php /*if(isset($postval['username'])) echo $postval['username']*/?>">
						
						</td>
                      </tr>-->
                  <tr>
                    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th width="39%" align="left" valign="top">Best time to reach you be phone at your school</th>
                        <td width="61%" align="left" valign="top"><input type="text" name="best_time" id="textfield7" class="txtbox2" value="<?php if(isset($postval['best_time'])) echo $postval['best_time']?>">
						<label style="font-size:11px;"><b>ex: 4:00 PM</b></label></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="top" style="padding: 20px 30px;">How did you find out about EJ Mentors and what drew you to the to the program.</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="top"><textarea name="how_find" style="width: 600px; margin: 0 30px;" class="textarea2"></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="top" style="padding: 10px 30px;"><input type="checkbox" name="provide_space" value="yes"> 
                        I have the time and space to meet with chapter members.</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="top" style="padding: 10px 30px;"><input type="checkbox" name="principal_approval" value="yes"> 
                        EJ Mentors program is approved by my schools principal.</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="top" style="padding: 0 0 0 30px;">
						  <table width="280" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td style="padding:0;"> <input type="checkbox" name="agree" value="yes"/> 
                             I agree to <a href="#">Terms</a></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="top" style="padding: 10px 0 0 410px;"><input type="submit" name="submit" value="submit"></td>
                      </tr>                      
                    </table></td>
                  </tr>                  
                </table></td>
              </tr>
            </table>
			</form>
           </div>                
	  </section>		
		<!--end body-->	
        
         <div class="clear"></div>