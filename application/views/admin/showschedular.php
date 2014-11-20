<!-- <div id="show"> -->
<h1 class="heading">Update Schedule</h1>
<?php $attributes = array( 'id' => 'myform1');
echo form_open("admin/update_schedule",$attributes); ?>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
<div class="panel-body"><div id="id"></div>
<div id="time"></div>


	<table id='mytable' class="table" name='futsal-table' border=1 width=100% >
													
			<tr>
					<td name='time'><span class="day">Time</span></td>
					<td name='sunday'><span class="day">Sunday</span></td>
					<td name='monday'><span class="day">Monday</span></td>
					<td name='tuesday'><span class="day">Tuesday</span></td>
					<td name='wednesday'><span class="day">Wednesday</span></td>
					<td name='thrusday'><span class="day">Thrusday</span></td>
					<td name='friday'><span class="day">Friday</span></td>
					<td name='saturday'><span class="day">Saturday</span></td>

			</tr>




												<?php foreach ($schedular as $keys ): ?>
														<?php $time=$keys->time_diff; ?>
														<input type='hidden' name='diff' value='<?php echo $time; ?>'>
													<?php endforeach; ?>
													<?php $i=0; ?>
													<?php $j=0; ?>
													<?php $c=0; ?>
														<?php foreach ($schedular as $key ): ?>
														<?php $i++;?>
														<?php $c++;?>
														<?php if($i==1) : ?>
																<div class="row">
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td ><input type='text' class="form-control" name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></td>
															<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
															<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
															<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
														<?php elseif ($i==7): ?>
																<td ><span><input type='text' class="form-control" name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
																<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
																<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
																<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
																</tr>
																	</div>	
																<?php $i=0; ?>
																<?php $j++;?>
														<?php elseif ($i<8) : ?>
															<td ><span><input type='text' class="form-control" name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
															<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
															<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
															<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
														
														<?php endif; ?>
														<?php endforeach; ?>	
													


		</table>
	<input type='button' onclick='update_ajax()'  class="btn btn-primary" value='update'>
</div>

<div id="message"  ></div>
<?php echo form_close(); ?>
<!-- </div> -->