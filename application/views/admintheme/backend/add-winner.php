<?php $url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
      $url = empty($url) ? base_url() : $url;

?>
<?php //echo '<pre>'.print_r($listallorg, true).'</pre>'; ?>

<?php if ($this->session->flashdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->flashdata('message');?></div>
<?php } ?>

<div id="tabledata" class="section" style="width: 630px; margin-top: 0;">
			<h2 class="ico_mug">Define Winner</h2>
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
				<th>Day</th>
				<th>Winner</th>
				<th>Coupons</th>
				<th>Prize ($)</th>
				<th>Status</th>
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
					 $string=$ress->to;
					 $mnt=substr($string,3,2);
					 $cur_mnt=date('m');
					 if($mnt==$cur_mnt)
					 {
					 ?>	
				<option value="<?php echo $val; ?>" ><?php echo $val; ?></option>
					<?php	}  }
				?>
					</select>
					
				</td>
				<td class="table_date">
			
				<select name="day" id="day">
					<?php
				
				foreach($getscoringperiod as $ress)
				{ 
					$val=$ress->from.'-'.$ress->to;
					 $day=$ress->period; 
					 $string=$ress->to;
					 $mnt=substr($string,3,2);
					 $cur_mnt=date('m');
					 if($mnt==$cur_mnt)
					 {
					 ?>	
				<option value="<?php echo $day; ?>" ><?php echo $day; ?></option>
					<?php	}  }
				?>
					</select>
					
				</td>
				<td class="table_date">
					<select id="orgName">
						<option value="">Select Organization</option>
						<?php
							foreach ($listallorg as $key=>$value) {
						?>
						<option value="<?php echo $value['orgname']; ?>"><?php echo $value['fname'].' '.$value['lname']; ?></option>
						<?php } ?>

					</select>

				</td>

				<!-- -->
				<td class="table_date">
					<div id="coupon" ></div>
				</td>
				<td class="table_date">
					<input type="text" name="prize" value="" style="width:25px;">
				</td>
				<td class="table_title">
					<select name="is_active" id="is_active" style="width:60px;">
						<option value="active" selected="selected">Active</option>
						<option value="inactive">Inactive</option>
					</select>
				</td>

				<td class="table_check"></td>
				<!-- <span class="ico_pending">Pending</span> -->
			</tr>

			</tbody>
		</table>

		<input type="submit" name="winnersubmit" value="<?php echo ($this->uri->segment(3) == 'edit' ? 'Save' : 'Add'); ?> Winner" class="noborder" />
		</form>

		</div> <!-- end #tabledata -->



		<!--start body-->

		<!--end body-->
		<div class="clear"></div>
