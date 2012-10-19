<?php
//echo '<pre>';print_r($this->session->userdata('post'));exit;

$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');

//print_r($this->session->userdata('post'));exit;
}
?>

<div class="containt_box">
<div class="leftcol">
<div><h1>GAME CARD </h1>
</div>
<div class="clear"></div>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
	<?php

				foreach($getscoringperiod as $ress)
				{
					$val=$ress->from.'-'.$ress->to;
					 $string=$ress->to;
					 $mnt=substr($string,3,2);
					 $cur_mnt=date('m');
					 if($mnt==$cur_mnt)
					 {
					 $from=$ress->from;
					 $to=$ress->to;
					 
					 }  }
					 ?>


      <td style="padding: 15px 0 10px 0;">Thanks you for supporting "LDBL".  Below is your free Sportzfund game card(s).   This card, with your unique fantasy player combination, will be active from <?php echo $from ; echo ' through '; echo $to; ?>.</td><?php	
				?>
    </tr>
	<tr>
      <td><h1>GAME CARD</h1></td>
    </tr>
	<tr>
	<td><img src="<?php echo $this->config->item('theme_url')?>images/bottom_arrow2.png" alt="" width="693" height="57" /><div class="deshed_line"><img src="<?php echo $this->config->item('theme_url')?>images/dashed_line.png" border="0" /></div></td>
	</tr>
	<tr>
      <td>
	<?php
	for($i=0;$i<count($player_details);$i++)
	  {
	?>
	  <div id="gameCard<?php echo $i;?>" class="like_to_bg" style="margin: 3px auto 10px auto;">
	  <div class="like_to1">
	  <div class="like_to">
	  <ul>
	  <?php
	  //print_r($player_details[0]);exit;
	  
	  foreach($player_details[$i] as $row)
	  {
	  ?>
	  	<li><div class="img2"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></div><div><p><?php echo $row['player_name'];?></p></div></li>

		<?php } ?>

		</ul>
		<div class="clear"></div>
		<div><strong>Coupon Code:<?php echo $row['coupon']; ?></strong></div>
	  </div>
	  </div>
	  <div class="clear"></div>
	  </div>
	 
	  <a href="" onclick="printSelection(document.getElementById('gameCard<?php echo $i;?>'));return false"><h2><center>Get Print of Your Game Card</center></h2></a>
	  <script type="text/javascript">

		function printSelection(node){
		
		  var content=node.innerHTML
		  var pwin=window.open('','print_content','width=693,height=450');
		
		  pwin.document.open();
		  pwin.document.write('<html><head><link href="<?php echo $this->config->item('theme_url')?>css/style.css" rel="stylesheet" type="text/css"/></head><body onload="window.print()">'+content+'</body></html>');
		  pwin.document.close();
		
		  setTimeout(function(){pwin.close();},1000);
		
		}
		</script>
	   <?php } ?>
	 </td>
    </tr>
	<tr>
     <!-- <td><h1>GAME CARD - Pg 2 </h1></td>-->
    </tr>
	<tr>
	<!--<td><img src="<?php echo $this->config->item('theme_url')?>images/bottom_arrow2.png" alt="" width="693" height="57" /><div class="deshed_line"><img src="<?php echo $this->config->item('theme_url')?>images/dashed_line.png" border="0" /></div></td>-->
	</tr>
	<tr>
      <td>
	  <!--<div class="like_to_bg" style="margin: 3px auto 10px auto;">
	  <div class="like_to1">
	  <div class="like_to">
	  <ul>
	  	<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		<li><div class="img2"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/game_img1.png" border="0" /></a></div><div><p><a href="#">Pujols</a></p></div></li>
		</ul>
		<div class="clear"></div>
	  </div>
	  </div>
	  <div class="clear"></div>
	  </div>-->
	 </td>
    </tr>
	<tr>
      <td>&nbsp;</td>
    </tr>
      <td>Check back during your active scoring period to see if your card has won any cash prizes, including $50,000 for a perfect card.  Simply enter your unique access code listed on this game card to see if you won.  To see if your game card has won, click on the "Did I win" link and enter your unique access code.</td>
    </tr>

    <tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>

    <tr>
    <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</div>

<?php 
$this->session->unset_userdata('coupon');
?>

</div>














