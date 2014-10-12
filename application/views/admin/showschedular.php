<!-- <div id="show"> -->
<?php $attributes = array( 'id' => 'myform1');
echo form_open("admin/update_schedule",$attributes); ?>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<div id="time"></div>
<div id="result">
	<table id='mytable' name='futsal-table' border=1 width=100% >
		<tbody id='my'>
													<tr>
															<td name='time'>Time</td>
															<td name='sunday'><span>Sunday</span></td>
															<td name='monday'><span>Monday</span></td>
															<td name='tuesday'><span>Tuesday</span></td>
															<td name='wednesday'><span>Wednesday</span></td>
															<td name='thrusday'><span>Thrusday</span></td>
															<td name='friday'><span>Friday</span></td>
															<td name='saturday'><span>Saturday</span></td>
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
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td ><span><input type='text' name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
															<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
															<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
															<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
														<?php elseif ($i==7): ?>
																<td ><span><input type='text' name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
																<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
																<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
																<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
																</tr>
																<?php $i=0; ?>
																<?php $j++;?>
														<?php elseif ($i<8) : ?>
															<td ><span><input type='text' name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
															<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
															<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
															<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
														
														<?php endif; ?>
														<?php endforeach; ?>
														

		</tbody>
		</table>

</div>
<input type='button' onclick='update_ajax()'  value='update'>
<div id="id"></div>

<div id="message"></div>
<?php echo form_close(); ?>
<!-- </div> -->