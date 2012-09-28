<?php if($this->session->userdata('adminid')) {	?>
<!--start footer-->
    <div  id="footer" class="clearfix">
    	<p class="left">Admin Control Panel</p>
		<p class="right">&copy; <?php echo date('Y');?> Admin Control Panel - <?php echo $this->config->item('site_title'); ?></p>
	</div><!-- end #footer -->
</div><!-- end container -->
<!--end footer-->
<?php } ?>
</body>
</html>
