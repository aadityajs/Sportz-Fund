<div class="leftcol">
<div><h1>Did I Win?</h1>
</div>
<div class="clear"></div>
<?php if ($this->session->userdata('message')) { ?>
	<div class="msg"><?php echo $this->session->userdata('message');?></div>
<?php $this->session->unset_userdata('message'); } ?>
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
	  <table width="100%" border="0" cellspacing="4" cellpadding="4" border="0">
	
        <?php
		
	if(!empty($searchWin))
	{ 
			$range_period=explode('-',$searchWin['win_period']);
			
		for($i=0;$i<count($range_period);$i++)
		{
		  $dt= $range_period[$i]; 
		 //break;
		}
		//echo $dt;
		//echo date("m",strtotime($dt));exit;
		/*$d = date_parse_from_format("d-m-Y", $dt);
		$mnth = $d["month"];
		$yr = $d["year"];
	    $day = $d["day"];*/
		 $mnth=substr($dt,3,2);
		 $yr=substr($dt,6,4);
		
	?>
		<!--<tr>
          <th><strong>Winner Name:</strong></th>
          <td><?php //echo $searchWin['winner_name']; ?></td>
        </tr>
		<tr>
          <th><strong>Winner Prize:</strong></th>
          <td><?php //echo $searchWin['winner_prize']; ?></td>
        </tr>-->
		
		
		  <tr>
			<td width="137" valign="top"><p align="center"><strong>Date</strong></p></td>
			<td width="137" valign="top"><p align="center"><strong>Fantasy Pts</strong></p></td>
			<td width="137" valign="top"><p align="center"><strong>Place</strong></p></td>
			<td width="137" valign="top"><p align="center"><strong>Winnings</strong></p></td>
			
		  </tr>
		  <tr>
			<td width="137" valign="top"><p align="center"><?php echo $searchWin['win_day'].'-'.$mnth.'-'.$yr;?></p></td>
			<td width="137" valign="top"><p align="center"><?php echo $pts;?></p></td>
			<td width="137" valign="top"><p align="center"><?php echo $searchWin['winner_id']; ?></p></td>
			<td width="137" valign="top"><p align="center"><?php echo '$';echo $searchWin['winner_prize']; ?></p></td>
			
		  </tr>
		 
<?php	}

	?>
	
         <tr> <td></td></tr>
		<tr>
          <td><strong>Enter Coupon Code:</strong></td>
          <td><input type="text" class="textfield" name="code"/></td>
		  <td><input type="submit" name="searchsubmit"  value="search" class="yes_btn1"/></td>
        </tr>
       
		
      </table></td>
    </tr>
    
    
    <tr>
      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
    <tr>
      
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