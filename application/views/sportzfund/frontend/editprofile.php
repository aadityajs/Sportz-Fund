<?php
/*$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}*/
?>
<script type="text/javascript">


$(document).ready(function() {
	$("div#regStep2").hide();
	$("div#regStep3").hide();

	$("#moveNextPage").click(function(){
		$("div#regStep1").slideUp();
		$("div#regStep2").slideDown();
		$("a#bredRegStep1").removeClass('here');
		$("a#bredRegStep2").addClass('here');

		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

	$("#regCont").click(function(){
		$("div#regStep2").slideUp();
		$("div#regStep3").slideDown();
		$("a#bredRegStep2").removeClass('here');
		$("a#bredRegStep3").addClass('here');
		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

	$("#correctReg").click(function() {
		$("div#regStep2").slideUp();
		$("div#regStep3").slideUp();
		$("div#regStep1").slideDown();
	});

});


function changeOrg(id,val)
{
	
	document.getElementById(id).innerHTML=val;
	
	
	
}


</script>

<div class="steptop_bg">
<ul>
<li><a href="#" id="bredRegStep1" class="here">Step - 1</a></li>
<li><a href="#" id="bredRegStep2">Step - 2</a></li>
<li><a href="#" id="bredRegStep3">Step - 3</a></li>
</ul>
</div>
<div class="leftcol">
<div><h1>Edit Profile</h1></div>
<div class="clear"></div>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<form method="post" enctype="multipart/form-data" id="frmOrgRegister" name="frmOrgRegister">

<div id="regStep1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>Organization</h1></td>
    </tr>
    <tr>
      <td><span>Note:</span> When registering your organization, be sure to type it exactly as you want it to appear on the front of your electronic game card tickets.  (Max of 30  characters per line).</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
       <!-- <tr>
          <th><strong>Organization  name:</strong></th>
          <td><input type="text" class="textfield" name="orgname" value="<?php if(isset($userdetail['orgname'])) echo $userdetail['orgname']?>"/></td>
        </tr>-->
        <tr>
          <th>EIN# (if applicable):</th>
          <td><input type="text" class="textfield" name="ein" value="<?php if(isset($userdetail['ein'])) echo $userdetail['ein']?>" onblur="changeOrg('orginfo','<?php echo $userdetail['orgname'];?>')"/></td>
        </tr>
        <tr>
          <th>Name continued (optional):</th>
          <td><input type="text" class="textfield" name="namecont" value="<?php if(isset($userdetail['namecont'])) echo $userdetail['namecont']?>"/></td>
        </tr>
        <tr>
          <th>Address (optional):</th>
          <td><input type="text" class="textfield" name="address" value="<?php if(isset($userdetail['address'])) echo $userdetail['address']?>" onblur="changeOrg('add',this.value)"/></td>
        </tr>
        <tr>
          <th>City, State, Zip:</th>
          <td><input type="text" class="textfield" name="citystatezip" value="<?php if(isset($userdetail['citystatezip'])) echo $userdetail['citystatezip']?>" onblur="changeOrg('zip',this.value)"/></td>
        </tr>
        <tr>
          <th><strong>Phone no. or Email:</strong></th>
          <td><input type="text" class="textfield" name="phemail" value="<?php if(isset($userdetail['phemail'])) echo $userdetail['phemail']?>" onblur="changeOrg('email',this.value)"/></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td class="text18">The card below is an example of the electronic PDF ticket your customers will receive once they donate.</td>
    </tr>
    <tr>
      <td><img src="<?php echo $this->config->item('theme_url'); ?>images/bottom_arrow2.png" alt="" width="693" height="57" /></td>
    </tr>
    <tr>
      <td class="banner_bgbot">
	  <!--<p><img src="<?php echo $this->config->item('theme_url'); ?>images/bannerbg.jpg" alt="" width="630" height="513" border="0"/></p>-->
	  <div class="game_card">
	<div class="game_card_center">
		<div class="game_card_top_img"><img src="<?php echo $this->config->item('theme_url'); ?>images/game_img.jpg" border="0" /></div>
		<div class="card_bot">
			<h2 id="orginfo"></h2>
			<div class="Success_box">
				<ul>
					<li id="add"></li>
					<li id="zip"></li>
					<li id="email"></li>
				</ul>
			</div>
		</div>
	</div>
</div>
	  
	  </td>
    </tr>
    <tr>
      <td class="text14">DOES YOUR ORGANIZATION INFORMATION APPEAR CORRECTLY ON THE TICKET?</td>
    </tr>
    <tr>
      <td><a href="javascript: void(0);" id="moveNextPage"  >
		<img  src="<?php echo $this->config->item('theme_url'); ?>images/next_pagebtn.gif" alt="" width="307" height="49" border="0" style="float: left;"/>
      </a>
      <img src="<?php echo $this->config->item('theme_url'); ?>images/corr_btn.gif" alt="" width="269" height="49" border="0" style="float: right; margin-right: 20px;"/>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>

<div id="regStep2">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
	    <tr>
	      <td><h1>Contact Info</h1></td>
	    </tr>
	    <tr>
	      <td>Please provide the name of the person who will be the primary contact for your Sportzfund fundraiser. </td>
	    </tr>
	    <tr>
	      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
	        <tr>
	          <th width="34%"><strong>First Name:</strong></th>
	          <td width="66%"><input type="text" class="textfield" name="fname" value="<?php if(isset($userdetail['fname'])) echo $userdetail['fname']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Last Name:</strong></th>
	          <td><input type="text" class="textfield" name="lname" value="<?php if(isset($userdetail['lname'])) echo $userdetail['lname']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Address:</strong></th>
	          <td><input type="text" class="textfield" name="contactaddress" value="<?php if(isset($userdetail['contactaddress'])) echo $userdetail['contactaddress']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>City, State, Zip:</strong></th>
	          <td><input type="text" class="textfield" name="contcitystatezip" value="<?php if(isset($userdetail['contcitystatezip'])) echo $userdetail['contcitystatezip']?>"/></td>
	        </tr>
			<tr>
	          <th><strong>Phone #:</strong></th>
	          <td><input type="text" class="textfield" name="phone" value="<?php if(isset($userdetail['phone'])) echo $userdetail['phone']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Email:</strong></th>
	          <td><input type="text" class="textfield" name="email" value="<?php if(isset($userdetail['email'])) echo $userdetail['email']?>"/></td>
	        </tr>
	        
	      </table></td>
	    </tr>
		<tr>
	      <td class="bot_line">&nbsp;</td>
	    </tr>
	    <tr>
	      <td class="text18">Sportzfund Log-in Information</td>
	    </tr>
	    <tr>
	      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
	        <tr>
	          <th>Type Old Password:</th>
	          <td><input type="text" class="textfield" name="oldpassword" value=""/><br/><level>Passwords must match exactly</level></td>
	        </tr>
	        <tr>
	          <th>Select a New Password:</th>
	          <td><input type="text" class="textfield" name="password" value=""/><br/><level>Passwords must match exactly</level></td>
	        </tr>
	        <!--<tr>
	          <th>Confirm Password:</th>
	          <td><input type="text" class="textfield" name="confpassword" value="<?php if(isset($postval['confpassword'])) echo $postval['confpassword']?>"/></td>
	        </tr>-->
	        <tr>
	          <th>Upload Image: </th>
	          <td><input type="file" style="width:276px;" name="userimage" /></td>
	        </tr>
	        <tr>
	          <th>&nbsp;</th>
	          <td><level><strong>Note:</strong> Upload your organization logo or image.  This will appear on your customized website.  A logo/image is not mandatory.<level></td>
	        </tr>
	        <tr>
	          <th>&nbsp;</th>
	          <td>&nbsp;</td>
	        </tr>
	      </table></td>
	    </tr>
	    <tr>
	      <td><strong>Note:</strong> This username and password will be your administration log-in to your organization's personalized website. The username will also be the personalized website you're assigned.  For example, if your username is 'Falcons', your website will be sportzfund.com/falcons.</td>
	    </tr>
	    <tr>
	      <td><img src="<?php echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="23" /></td>
	    </tr>
	    <tr>
	      <td><input type="button" id="regCont" name="Submit2" class="continue_btn" value=""/></td>
	    </tr>
	    <tr>
	    <td><img src="<?php echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="1" /></td>
	    </tr>
	  </table>

</div>

<div id="regStep3">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>Edit Profile</h1></td>
    </tr>
    <tr>
      <td>Press Yes to edit</td>
    </tr>
    <tr>
      <td>
	  <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding: 12px 0 0 0;">
        <tr>
          <td class="styled_select">
          	<select name="game" id="game" style="width:165px;">
				<option value="Football">Football</option>
				<option value="Baseball">Baseball</option>
			</select>
          </td>
        </tr>
         <tr>
          <td><h1>How did you hear about Sportzfund?</h1></td>
        </tr>
		<tr>
          <td class="styled_select1">
		    <select name="hearaboutus" id=""hearaboutus"" style="width:275px;">
				<option value="Facebook/Social Network">Facebook/Social Network</option>
				<option value="Google">Google</option>
				<option value="Other">Other</option>
			</select></td>
        </tr>
        <tr>
          <td><h1>Please type in name of  <span class="text15">"Facebook/Social Network"</span></h1></td>
        </tr>
        <tr>
          <td><textarea name="hearaboutusdetails" class="textareabg"><?php if(isset($postval['hearaboutusdetails'])) echo $postval['hearaboutusdetails']?></textarea></td>
        </tr>
        <tr>
          <td><h1>Review game card ticket one last time</h1></td>
        </tr>
      </table>--></td>
    </tr>
	<tr>
<!--      <td><img src="<?php echo $this->config->item('theme_url'); ?>images/bottom_arrow2.png" alt="" width="693" height="57" /></td>
-->    </tr>
	<tr>
     <!-- <td><div class="text_spot">Your Game Card</div></td>-->
    </tr>
	<tr>
<!--      <td class="banner_bgbot"><p><img src="<?php echo $this->config->item('theme_url'); ?>images/bannerbg.jpg" alt="" width="630" height="513" border="0"/></p></td>
-->    </tr>
      <td>&nbsp;</td>
    </tr>
    <!--<tr>
      <td><input type="checkbox" name="confagree" id="confagree" value="yes"/>
        I confirm that the organization text and information listed on the above ticket is correct.  I also agree to the terms.</td>
    </tr>
    <tr>
      <td><img src="<?php //echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>-->
    <tr>
      <td>
      <input type="submit" name="submitReg" id="submitReg" class="yes_btn" value="Yes"/>
      <input type="button" id="correctReg" name="Submit" class="make_btn" value="NO, make corrections "/>

     
    </tr>
    <tr>
    <td><img src="<?php echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>

</div>

</form>


</div>














