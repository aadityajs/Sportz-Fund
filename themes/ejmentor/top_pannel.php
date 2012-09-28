<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>
  <!--start head-->
		  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
	  
	  <?php if(site_url($url) != site_url("faculty_sponsor/faculty_sponsor_details/") && site_url($url) != site_url("mentor/mentor_home/") && site_url($url) != site_url("user/account_details/") && site_url($url) != site_url("achiever/achiever_details/".$this->session->userdata('userid')) && site_url($url) != site_url("mentor/mentor_details/".$this->session->userdata('userid')) && site_url($url) != site_url("achiever/my_mentor/") &&  site_url($url) != site_url("mentor/my_achievers") && site_url($url) != site_url("mentor/my_mentors/") && site_url($url) != site_url("achiever/my_achievers/") && site_url($url) != site_url("achiever/find_mentor/") && site_url($url) != site_url("docs/doc_list/") ) { ?> 
	 
	  <header>
	  
	  
	  
	  

        <div class="logo">
          <a href="<?php echo site_url()?>"><img src="<?php echo $this->config->item('theme_url')?>images/logo.png" alt=""></a>
        </div>
        <div class="banner">
        	<!--<img src="images/banner1.png" alt="">-->
         <div id="example">
		   <div id="slides">
			 <div class="slides_container">
					<div class="slide">
						<a href="http://www.flickr.com/photos/jliba/4665625073/" title="145.365 - Happy Bokeh Thursday! | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo $this->config->item('theme_url')?>img/slide-1.png" width="570" height="270" alt="Slide 1"></a>
					  <div class="caption" style="bottom:0">
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,consectetur, adipisci velit, sed quia non numquam eius <a href="#">read more &raquo;</a></p>
					  </div>
					</div>
					<div class="slide">
						<a href="http://www.flickr.com/photos/stephangeyer/3020487807/" title="Taxi | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo $this->config->item('theme_url')?>img/slide-2.png" width="570" height="270" alt="Slide 2"></a>
					  <div class="caption">
							<p>ipsum quia dolor sit amet,consectetur, adipisci velit, sed quia non numquam eius <a href="#">read more &raquo;</a></p>
					  </div>
					</div>
					<div class="slide">
						<a href="http://www.flickr.com/photos/childofwar/2984345060/" title="Happy Bokeh raining Day | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo $this->config->item('theme_url')?>img/slide-3.png" width="570" height="270" alt="Slide 3"></a>
					  <div class="caption">
							<p>Eui dolorem ipsum quia dolor sit amet,consectetur, adipisci velit, sed quia non numquam eius <a href="#">read more &raquo;</a></p>
					  </div>
					</div>
					<div class="slide">
						<a href="http://www.flickr.com/photos/b-tal/117037943/" title="We Eat Light | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo $this->config->item('theme_url')?>img/slide-4.png" width="570" height="270" alt="Slide 4"></a>
					  <div class="caption">
							<p>Lorem ipsum quia dolor sit amet,consectetur, adipisci velit, sed quia non numquam eius <a href="#">read more &raquo;</a></p>
					  </div>
					</div>
					<div class="slide">
						<a href="http://www.flickr.com/photos/bu7amd/3447416780/" title="&ldquo;I must go down to the sea again, to the lonely sea and the sky; and all I ask is a tall ship and a star to steer her by.&rdquo; | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo $this->config->item('theme_url')?>img/slide-5.png" width="570" height="270" alt="Slide 5"></a>
					  <div class="caption">
							<p>Amet,consectetur, adipisci velit, sed quia non numquam eius <a href="#">read more &raquo;</a></p>
					  </div>
					</div>
			    </div>
				<a href="#" class="prev"><img src="<?php echo $this->config->item('theme_url')?>img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
			 <a href="#" class="next"><img src="<?php echo $this->config->item('theme_url')?>img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
		   </div>
		    <img src="<?php echo $this->config->item('theme_url')?>img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
	      </div>
        </div>
		
		
		
		
         <div class="clear"></div>
	    <nav>
       	  <ul class="nav_left">
           	<li><a href="<?php echo site_url()?>" class="here">Home</a></li>
            <li><a href="<?php echo site_url("cms_pages/about_us")?>">About Us</a></li>
            <li class="dc">
                <a href="#">Mentors</a>
                <ul>                 
                    <li><a href="createpost.html">What is an EJ Mentor?</a></li>
					 <li><a href="<?php echo site_url("mentor/mentor_list")?>">List of Mentors</a></li>
                    <?php if($this->session->userdata('usertype') == 'Faculty') { ?><li><a href="<?php echo site_url("faculty_sponsor/faculty_sponsor_details/")?>">Faculty Home</a></li> <?php } elseif($this->session->userdata('usertype') == 'Mentor') { ?><li><a href="<?php echo site_url("mentor/mentor_home/")?>">Mentor Home</a></li> <?php } ?>
                    <li><a href="createpost.html">Become an EJ Mentor</a></li>
                    <li><a href="createpost.html">Start a Chapter</a></li>
               </ul>
            </li>
            <li class="dc">
                <a href="#">Achievers</a>
                <ul>                 
                    <li><a href="<?php echo site_url("achiever/achiever_list")?>">List of achievers</a></li>
                    <?php if($this->session->userdata('usertype') == 'Achiever') { ?><li><a href="<?php echo site_url("user/account_details")?>">Co-ordinator Home</a></li> <?php } elseif($this->session->userdata('usertype') == 'Achiever_student') { ?><li><a href="<?php echo site_url("user/account_details")?>">Achiever Home</a></li><?php } ?>
                    <li><a href="createpost.html">Become an EJ Achiever</a></li>
                    <li><a href="createpost.html">Register Your School</a></li>
               </ul>
            </li>
            <li><a href="<?php echo site_url("cms_pages/contribute")?>">Contribute</a></li>
            <li><a href="<?php echo site_url("cms_pages/faq")?>">FAQs</a></li>
            <li><a href="<?php echo site_url("cms_pages/contact_us")?>">Contact Us</a></li>
            
            
            
          </ul>
            <!--<ul class="nav_right">
           	  <li>Follow Us</li>
              <li>
               	<img src="<?php echo $this->config->item('theme_url')?>images/social_01.png" alt="">
                <img src="<?php echo $this->config->item('theme_url')?>images/social_02.png" alt="">
                <img src="<?php echo $this->config->item('theme_url')?>images/social_03.png" alt="">
                <img src="<?php echo $this->config->item('theme_url')?>images/social_04.png" alt="">
              </li>                
          </ul>-->
           <div class="clear"></div>
        </nav>
		
	  </header>
	  <?php } else { ?>
	  
	  <header1>
	  <div id="header1">
        <div class="logo1"><a href="#"><img src="<?php echo $this->config->item('theme_url')?>images/logo_admin.png" alt="" width="116" height="109" border="0"></a></div>
	    <nav1>
		<div class="nav1">
       	  <ul>
           	   	<li><a href="<?php echo site_url()?>" class="here">Home</a></li>
            <li><a href="<?php echo site_url("cms_pages/about_us")?>">About Us</a></li>
            <li class="dc">
                <a href="#">Mentors</a>
                <ul>                 
                    <li><a href="createpost.html">What is an EJ Mentor?</a></li>
					 <li><a href="<?php echo site_url("mentor/mentor_list")?>">List of Mentors</a></li>
                    <?php if($this->session->userdata('usertype') == 'Faculty') { ?><li><a href="<?php echo site_url("faculty_sponsor/faculty_sponsor_details/")?>">Faculty Home</a></li> <?php } elseif($this->session->userdata('usertype') == 'Mentor') { ?><li><a href="<?php echo site_url("mentor/mentor_home/")?>">Mentor Home</a></li> <?php } ?>
                    <li><a href="createpost.html">Become an EJ Mentor</a></li>
                    <li><a href="createpost.html">Start a Chapter</a></li>
               </ul>
            </li>
            <li class="dc">
                <a href="#">Achievers</a>
                <ul>                 
                    <li><a href="<?php echo site_url("achiever/achiever_list")?>">List of achievers</a></li>
                    <?php if($this->session->userdata('usertype') == 'Achiever') { ?><li><a href="<?php echo site_url("user/account_details")?>">Co-ordinator Home</a></li> <?php } elseif($this->session->userdata('usertype') == 'Achiever_student') { ?><li><a href="<?php echo site_url("user/account_details")?>">Achiever Home</a></li><?php } ?>
                    <li><a href="createpost.html">Become an EJ Achiever</a></li>
                    <li><a href="createpost.html">Register Your School</a></li>
               </ul>
            </li>
            <li><a href="<?php echo site_url("cms_pages/contribute")?>">Contribute</a></li>
            <li><a href="<?php echo site_url("cms_pages/faq")?>">FAQs</a></li>
            <li><a href="<?php echo site_url("cms_pages/contact_us")?>">Contact Us</a></li>
            
            
                           
           </ul> 
		   </div>
		  </nav1>
		 <div class="clear"></div>
		</div>
	  <div class="clear"></div>
	  </header1>
  <div class="clear"></div>	  
	  
	  <?php } ?>
		
		
	<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		
		<!--end head-->
	
		<div class="error" id="error"><?php if($this->session->userdata('errormsg')) {echo $this->session->userdata('errormsg'); $this->session->unset_userdata('errormsg');}?></div>
		
		<div class="error" id="error2"><?php if ($this->session->flashdata('message')){echo $this->session->flashdata('message'); }?></div>
		<!--<?php if($this->session->userdata('userid') != '') { ?>
		
		<h2 style="text-align:center;">
		
		<a href="<?php echo site_url("user/account_details")?>">Account Details</a> &nbsp;&nbsp;|&nbsp;&nbsp;
		
		<?php if($this->session->userdata('usertype') == 'Achiever_student') { ?>
		
		<a href="<?php echo site_url("achiever/achiever_details/".$this->session->userdata('userid'))?>">My Profile</a>
		
		<?php } elseif($this->session->userdata('usertype') == 'Mentor') { ?>
		
		<a href="<?php echo site_url("mentor/mentor_details/".$this->session->userdata('userid'))?>">My Profile</a>
		
		<?php } elseif($this->session->userdata('usertype') == 'Achiever') { ?>
		
		<a href="<?php echo site_url("achiever_coordinator/achiever_coordinator_details")?>">My Profile</a>
		
		<?php } elseif($this->session->userdata('usertype') == 'Faculty') { ?>
		
		<a href="<?php echo site_url("faculty_sponsor/faculty_sponsor_details")?>">My Profile</a>
		
		
		<?php } ?>
		
		&nbsp;&nbsp;|&nbsp;&nbsp;
		
		<?php if($this->session->userdata('usertype') == 'Achiever_student') { ?>
		<a href="">My Mentor</a>
		<? } elseif($this->session->userdata('usertype') == 'Mentor') { ?>
		<a href="">My Achiever</a>
		<?php } else { ?>
		<a href="<?php echo site_url("achiever/achiever_list")?>">Achiever</a>
		<?php } ?>
		
		
		&nbsp;&nbsp;
		
		<?php if($this->session->userdata('usertype') == 'Mentor'){ ?>
		
		|&nbsp;&nbsp;<a href="<?php echo site_url("mentor/my_sponser/".$this->session->userdata('userid'))?>">My Sponsor</a>&nbsp;&nbsp;
		
		<?php } elseif($this->session->userdata('usertype') == 'Achiever_student'){?> 
		
		|&nbsp;&nbsp;<a href="<?php echo site_url("mentor/mentor_list")?>">Find A Mentor</a>&nbsp;&nbsp;
		
		<?php } else { ?> 
		
		|&nbsp;&nbsp;<a href="<?php echo site_url("mentor/mentor_list")?>">Mentors</a>&nbsp;&nbsp;
		
		<?php } ?>
		
		|&nbsp;&nbsp;<a href="<?php echo site_url("docs/doc_list")?>">Documents</a></h2><?php } ?>-->