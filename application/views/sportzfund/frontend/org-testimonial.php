<div class="leftcol">
<div><h1>Testimonials</h1>
</div>
<div class="clear"></div>
<?php if ($this->session->userdata('message')) { ?>
	<div class="msg"><?php echo $this->session->userdata('message');?></div>
<?php $this->session->unset_userdata('message'); } ?>
<div>
<form name="testi" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td style="padding: 15px 0 5px 0;">Had great success using Sportzfund as your fundraiser?  Please share your success stories with us.  We would love to hear from you!</td>
    </tr>
	<tr><td><strong>Name: </strong><?php echo $userdetail['fname']; echo ' - '; echo $userdetail['lname'];?>
	<input type="hidden" name="name" value="<?php echo $userdetail['fname']; echo '-'; echo $userdetail['lname'];?>"  />
	</td>
    </tr>
    <tr>
      <td style="padding: 20px 0;"><textarea name="msg" class="textareabg" style="width: 690px; height: 290px;"></textarea></td>
    </tr>
	<tr>
      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
	<tr>
      <td><input type="submit" name="Submit2" class="send_testimonial_btn" value=" "/></td>
    </tr>
    <tr>
      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
  </table>
  </form>
</div>
</div>