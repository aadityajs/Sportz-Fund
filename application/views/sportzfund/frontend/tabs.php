<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
<?php if($this->session->userdata('userid') != '') { ?>	
		<div id="top_pannel_bg">
<div class="top_pannel">
<ul>
<li><?php if($this->session->userdata('usertype') == 'Faculty') { ?><a <?php if(site_url($url) == site_url("faculty_sponsor/faculty_sponsor_details/")) { echo 'class= "here"';} ?> href="<?php echo site_url("faculty_sponsor/faculty_sponsor_details/")?>"> <?php } elseif($this->session->userdata('usertype')=='Mentor'){ ?><a href="<?php echo site_url("mentor/mentor_home/")?>" <?php if(site_url($url) == site_url("mentor/mentor_home/")) { echo 'class= "here"';} ?>> <?php }  else { ?><a href="<?php echo site_url("user/account_details/")?>" <?php if(site_url($url) == site_url("user/account_details/")) { echo 'class= "here"';} ?>><?php } ?> Home</a> <!--<a href="<?php echo site_url("user/account_details/")?>" > Account Details</a>--></li>
<li><?php if($this->session->userdata('usertype') == 'Achiever_student') { ?>
		
		<a href="<?php echo site_url("achiever/achiever_details/".$this->session->userdata('userid'))?>" <?php if(site_url($url) == site_url("achiever/achiever_details/".$this->session->userdata('userid'))) { echo 'class= "here"';} ?>>My Profile</a>
		
		<?php } elseif($this->session->userdata('usertype') == 'Mentor') { ?>
		
		<a href="<?php echo site_url("mentor/mentor_details/".$this->session->userdata('userid'))?>" <?php if(site_url($url) == site_url("mentor/mentor_details/".$this->session->userdata('userid'))) { echo 'class= "here"';} ?>>My Profile</a>
		
		<?php } elseif($this->session->userdata('usertype') == 'Achiever') { ?>
		
		<!--<a href="<?php echo site_url("achiever_coordinator/achiever_coordinator_details")?>">My Profile</a>-->
		
		<?php } elseif($this->session->userdata('usertype') == 'Faculty') { ?>
		
		<!--<a href="<?php echo site_url("faculty_sponsor/faculty_sponsor_details/")?>">My Profile</a>-->
		
		
		<?php } ?></li>
<li><?php if($this->session->userdata('usertype') == 'Achiever_student') { ?>
		<a href="<?php echo site_url("achiever/my_mentor/")?>" <?php if(site_url($url) == site_url("achiever/my_mentor/")) { echo 'class= "here"';} ?>>My Mentor</a>
		<? } elseif($this->session->userdata('usertype') == 'Mentor') { ?>
		<a href="<?php echo site_url("mentor/my_achievers")?>" <?php if(site_url($url) == site_url("mentor/my_achievers")) { echo 'class= "here"';} ?>>My Achievers</a>
		<? } elseif($this->session->userdata('usertype') == 'Faculty') { ?>
		<a href="<?php echo site_url("mentor/my_mentors/")?>" <?php if(site_url($url) == site_url("mentor/my_mentors/")) { echo 'class= "here"';} ?>>My Mentors</a>
		
		<?php } else { ?>
		<a href="<?php echo site_url("achiever/my_achievers")?>" <?php if(site_url($url) == site_url("achiever/my_achievers/")) { echo 'class= "here"';} ?>>My Achievers</a>
		<?php } ?></li>
<?php if($this->session->userdata('usertype') == 'Achiever_student') { ?><li><a href="<?php echo site_url("achiever/find_mentor")?>" <?php if(site_url($url) == site_url("achiever/find_mentor/")) { echo 'class= "here"';} ?>>Find a Mentor </a></li>
<?php } ?>
<li><a href="<?php echo site_url("docs/doc_list")?>" <?php if(site_url($url) == site_url("docs/doc_list/")) { echo 'class= "here"';} ?>>Documents</a></li>
</ul>
</div>
</div>
<?php } ?>