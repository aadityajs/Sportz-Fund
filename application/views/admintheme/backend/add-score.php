<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //echo '<pre>'.print_r($editScoring, true).'</pre>'; ?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Add Score</h2>
		<form method="post" name="frmAddWinner" >
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 		<script type="text/javascript">
            $(document).ready(function () {
                $('#orgName').change(function () {
                    //alert('hi');
                    var org_name = $(this).attr('value');
                    console.log(org_name );
                    $.ajax({
                        url: "<?php echo site_url("admin/winner/ajax_call")?>", //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        data: "org_uname="+org_name , //The variables which are going.
                        dataType: "html", //Return data type (what we expect).

                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
                            //data is the html of the page where the request is made.
                            $('#coupon').html(data);
                        }
                    });
                });
            });
        </script>


		<table id="table">
			<thead>
			<tr>
				<!-- <th><input type="checkbox" class="noborder" /></th> -->
			<th>Customer Name</th>
			<th>Organization</th>
			<th>Fantasy Points</th>
			<th>Perfect score</th>

			</tr>
			</thead>
			<tbody>
			<?php
			$c=1;
			foreach ($editScore as $row)
			{
   				$c++;
			?>
			<tr>

				<td class="table_date">
					<?php echo $row->fname; ?>
				</td>
				<input type="hidden" name="name[]"  value="<?php echo $row->fname; ?>">
				<td class="table_date">
					<?php echo $row->orgname; ?>
				</td>
				<input type="hidden" name="orgname[]"  value="<?php echo $row->orgname; ?>">


				<td class="table_date">
					<input type="text" name="points[]" id="points" value="">
				</td>
				<td class="table_date">
					<input type="text" name="score[]" value="">
				</td>

			</tr>
			<?php } ?>  <input type="hidden" name="count_score" id="count_score" value="<?php echo $c; ?>">
			</tbody>
		</table>

		<input type="submit" name="scoresubmit" value="<?php echo ($this->uri->segment(3) == 'edit' ? 'Save' : 'Add'); ?> Score" class="noborder" />
		</form>

		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
