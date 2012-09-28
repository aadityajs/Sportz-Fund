<script>
			$(document).ready(function() {
			$("#various1").fancybox();
			});
</script>
<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                   $url = empty($url) ? base_url() : $url;
  
               ?>

		<!--start body-->
		<section id="body">		
          <h1><?php $exp = explode(' ',$aboutus['page_title']); echo $exp[0]; ?><span> <?=$exp[1]?></span><?php
		  if($this->session->userdata('adminid')){
		  ?>
		  <a href="#inline1" id="various1" style="color: LightCoral; margin-left: 18px; font-size: 12px;">Edit</a>
		  <?php } ?>
		  </h1>         	
            <div class="common_box">
             <?=$aboutus['content']?>
		<div class="clear"></div>
          </div> 
		   <div class="clear"></div>
		</section>		
		<!--end body-->	
		 <div class="clear"></div>
		 <div style="display:none;">
		 <div id="inline1" style="width:800px;height:auto;overflow:auto;">
			<form method="post" enctype="multipart/form-data" action="<?php echo site_url("admin/index/change")?>" id="change">
			<input name="field" type="hidden" value="content" />
			<input name="url" type="hidden" value="<?=$url?>" />
			<input name="cms_id" type="hidden" value="<?=$aboutus['cms_id']?>" />
			<center>
			<p style="font: bold 14px/16px Arial, Helvetica, sans-serif; color: #000; padding: 0 0 0 15px; margin: 0;">Edit About us</p><br />
			
			<table>
			
			<tr><td>
			<label><p>Change Your About us:</p><br /></label>
			
			</td><td>
		   <textarea name="content"  id="content" class="textarea1" style="height:300px; width:500px;"><?=$aboutus['content']?></textarea>
		   
		   
		   </td></tr>
			
		
	
			</table>
			<input type="submit" name="sub" value="Submit" class="green_btn"/>
			</center>
			</form>
		</div>
		 
		 </div>