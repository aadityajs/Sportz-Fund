<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //echo '<pre>'.print_r($getscoringperiod, true).'</pre>'; 
?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Add Group Card</h2>
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
			    <th>Organization </th>
				<th>No Cards </th>
				<th>Group </th>
				<th>Period</th>
				<th>Type</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date">
					<?php
				 	echo $getscoringperiod[0]['orgname'];
				    ?>
					<input type="hidden" name="orgname" value="<?php echo $getscoringperiod[0]['orgname'];?>" />
				</td>
				<td class="table_date">
					<?php
				 	echo count($getscoringperiod);
				    ?>
				<input type="hidden" name="no_cards" value="<?php echo count($getscoringperiod);?>" />
				</td>

				<td class="table_date">
					<input type="text" name="group" id="day" value="" style="width:25px;">
				</td>
				
				<td class="table_date">
					<input type="text" name="period" id="day" value="" style="width:25px;">
				</td>
				
				<td class="table_title">
					<select name="type" id="type">

						<option value="MLB" <?php if(!empty($editGamedate)){if($editGamedate['type']=='MLB'){?> selected="selected" <?php } } ?>>MLB</option>
						<option value="NFL" <?php if(!empty($editGamedate)){if($editGamedate['type']=='NFL'){?> selected="selected" <?php } } ?>>NFL</option>
					</select>
				</td>
				<td class="table_title">
					<select name="is_active" id="is_active">
						<option value="active" <?php if(!empty($editGamedate)){if($editGamedate['is_active']=='active'){?> selected="selected" <?php } } ?>>Active</option>
						<option value="inactive" <?php if(!empty($editGamedate)){if($editGamedate['is_active']=='inactive'){?> selected="selected" <?php } } ?>>Inactive</option>
					</select>
				</td>

				<td class="table_check"></td>
				<!-- <span class="ico_pending">Pending</span> -->
			</tr>

			</tbody>
		</table>

		<input type="submit" name="groupcardsubmit" value="<?php echo ($this->uri->segment(3) == 'edit' ? 'Save' : 'Add'); ?> GroupCard" class="noborder" />
		</form>

		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
