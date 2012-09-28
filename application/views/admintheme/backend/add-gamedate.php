<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //echo '<pre>'.print_r($getscoringperiod, true).'</pre>'; exit;?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Add Game Date</h2>
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
				<th>Period</th>
				<th>Year</th>
				<th>Month</th>
				<th>Day</th>
				
				<th>Type</th>
				<th>Active</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<!-- <td class="table_check"><input type="checkbox" class="noborder" /></td> -->
				<td class="table_date">
				
					
				
				
				<select name="period" id="period">
					<?php
				foreach($getscoringperiod as $ress)
				{ 
					 $val=$ress->from.'-'.$ress->to;
				?>
				<option value="<?php echo $val; ?>" ><?php echo $val; ?></option>
					<?php	} 
				?>
					</select>
					
				</td>
				<td class="table_date">
					<select name="year" id="year">
						<?php
							 $currentYear=date('Y');
							foreach (range($currentYear,2000) as $value) 
							{ ?>
							 <option  value="<?php echo $value ?>"><?php echo $value ?></option >
	
						<?php	}
							
							?>
					</select>

				</td>

				<!-- -->

				<td class="table_date">
				<select name="month" id="month">
						
							 <option value="01" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='01'){?> selected="selected" <?php } } ?>>Jan</option >
							 <option value="02" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='02'){?> selected="selected" <?php } } ?>>Feb</option >
							 <option value="03" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='03'){?> selected="selected" <?php } } ?>>Mar</option >
							 <option value="04" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='04'){?> selected="selected" <?php } } ?>>Apr</option >
							 <option value="05" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='05'){?> selected="selected" <?php } } ?>>May</option >
							 <option value="06" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='06'){?> selected="selected" <?php } } ?>>Jun</option >
							 <option value="07" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='07'){?> selected="selected" <?php } } ?>>July</option >
							 <option value="08" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='08'){?> selected="selected" <?php } } ?>>Aug</option >
							 <option value="09" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='09'){?> selected="selected" <?php } } ?>>Sep</option >
							 <option value="10" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='10'){?> selected="selected" <?php } } ?>>Oct</option >
							 <option value="11" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='11'){?> selected="selected" <?php } } ?>>Nov</option >
							 <option value="12" <?php if(!empty($editGamedate)){if($editGamedate['game_month']=='12'){?> selected="selected" <?php } } ?>>Dec</option >
	
					</select>
				</td>
				<td class="table_date">
					<input type="text" name="day" id="day" value="<?php echo (!empty($editGamedate) ? $editGamedate['game_day'] : ""); ?>">
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

		<input type="submit" name="gamedatesubmit" value="<?php echo ($this->uri->segment(3) == 'edit' ? 'Save' : 'Add'); ?> GameDate" class="noborder" />
		</form>

		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
