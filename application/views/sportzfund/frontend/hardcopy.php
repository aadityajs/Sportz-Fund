<script>
function check()
{
				if($('#fname').val()=="")
                {
                    alert("Please Enter First Name!!");
                   $('#fname').focus();
                    return false;
                }
				if($('#lname').val()=="")
                {
                    alert("Please Enter Last Name!!");
                   $('#lname').focus();
                    return false;
                }
				if($('#add').val()=="")
                {
                    alert("Please Enter Address!!");
                   $('#add').focus();
                    return false;
                }
				if($('#city').val()=="")
                {
                    alert("Please Enter City!!");
                   $('#city').focus();
                    return false;
                }
				if($('#state').val()=="")
                {
                    alert("Please Enter State!!");
                   $('#state').focus();
                    return false;
                }
				if($('#zip').val()=="")
                {
                    alert("Please Enter Zip!!");
                   $('#zip').focus();
                    return false;
                }if($('#phone').val()=="")
                {
                    alert("Please Enter Phone No!!");
                   $('#phone').focus();
                    return false;
                }
				if($('#email').val()=="")
                {
                    alert("Please Enter Email!!");
                   $('#email').focus();
                    return false;
                }
				if($('#cnfemail').val()=="")
                {
                    alert("Please Enter Confirm Email!!");
                   $('#cnfemail').focus();
                    return false;
                }
				if($('#email').val()!=$('#cnfemail').val())
				{
					alert("Email does not match!!");
                   $('#email').focus();
                    return false;
				}
				if($('#support').val()=="")
                {
                    alert("Please Enter Name!!");
                   $('#support').focus();
                    return false;
                }
				if($('#code').val()=="")
                {
                    alert("Please Enter Code!!");
                   $('#code').focus();
                    return false;
                }
}
</script>

<div class="leftcol">
<div><h1>Activate Hard Copy Card</h1>
</div>
<div class="clear"></div>
<div>
<form name="hardcopy" method="post" onsubmit="return check()">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><strong>First Name:</strong></th>
          <td width="66%"><input type="text" class="textfield" name="fname" id="fname"/></td>
        </tr>
        <tr>
          <th><strong>Last Name:</strong></th>
          <td><input type="text" class="textfield" name="lname" id="lname"/></td>
        </tr>
        <tr>
          <th><strong>Address:</strong></th>
          <td><input type="text" class="textfield" name="add" id="add"/></td>
        </tr>
        <tr>
          <th><strong>City, State, Zip:</strong></th>
          <td><input type="text" class="textfield" name="city" id="city" style="width: 140px; margin: 0 10px 0 0; float: left;"/><input type="text" class="textfield" name="state" id="state" style="width: 141px; margin: 0 10px 0 0; float: left;"/><input type="text" class="textfield" name="zip" id="zip" style="width: 130px; float: left;"/></td>
        </tr>
		<tr>
          <th><strong>Phone #:</strong></th>
          <td><input type="text" class="textfield" name="phone" id="phone"/></td>
        </tr>
        <tr>
          <th><strong>Email:(why</strong></th>
          <td><input type="text" class="textfield" name="email" id="email"/></td>
        </tr>
        <tr>
          <th><strong>Confirm Email:</strong></th>
          <td><input type="text" class="textfield" name="cnfemail" id="cnfemail"/></td>
        </tr>
		<tr>
          <th><strong>Name of person you're supporting: </strong></th>
          <td><input type="text" class="textfield" name="support" id="support"/></td>
        </tr>
		<tr>
          <th>&nbsp;</th>
          <td style="padding: 30px 0 10px 0;"><input type="text" class="textfield" name="code" id="code" style="width: 150px;"/> <br /> <div class="access_code">Enter Access Code and click activate</div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="Submit2" class="activate_btn" value=" "/></td>
    </tr>    
    <tr>
    <td><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</form></div>
</div>