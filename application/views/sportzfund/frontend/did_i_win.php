<div class="leftcol">
<div><h1>Did I Win?</h1>
</div>
<div class="clear"></div>
<div>
<form method="post" name="frmSearchWinner" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>&nbsp;</h1></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
	  <table width="100%" border="0" cellspacing="4" cellpadding="4">
        <?php
	if(!empty($searchWin))
	{ ?>
		<tr>
          <th><strong>Winner Name:</strong></th>
          <td><?php echo $searchWin['winner_name']; ?></td>
        </tr>
		<tr>
          <th><strong>Winner Prize:</strong></th>
          <td><?php echo $searchWin['winner_prize']; ?></td>
        </tr>
<?php	}
	
	?>
		<tr>
          <th><strong>Enter Coupon Code:</strong></th>
          <td><input type="text" class="textfield" name="code"/></td>
        </tr>
       
		
      </table></td>
    </tr>
    
    
    <tr>
      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="searchsubmit" class="" value="search"/></td>
    </tr>
	
	<tr>
      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
	<tr>
	<td>We can also be reached during normal business hours at: Phone: 1-888-XXX-XXXX</td>
	</tr>    
    <tr>
    <td><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
  </form>
</div>
</div>