<div id="show">
<?php 

date_default_timezone_set("Asia/Katmandu"); 
echo date('w') +1; 
echo date( "Y-m-d");
echo date( "g:i a");
 ?>
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
															<td ><span><?php echo $key->price; ?></span>
															<?php
															if($schedular_date = $this->db->where('id', $key->book_status)->get('booking')->result()){
																	$schedular_date1=$schedular_date[0]->booking_date;
															}
															 // if($key->book_status>0 && strtotime($key->start_time)<strtotime(date( "g:i a")) && strtotime($key->end_time)>strtotime(date( "g:i a")) && strtotime(date( "Y-m-d"))<strtotime($schedular_date1)):
															 	?>
																<?php if($key->book_status>0): ?>
																<h5 class="btn btn-danger log-btn color">
																Booked
															</h5>
															<?php else: ?>
															<h5 class="btn btn-danger log-btn color">
																	<?php  echo anchor("admin/book/$key->id/$user_id","Book"); ?>
															</h5>
															<?php endif; ?>
															</td>
														<?php elseif ($i==7): ?>
															<td ><span><?php echo $key->price; ?></span>
															<?php if($key->book_status>0): ?>
																<h5 class="btn btn-danger log-btn color">
																Booked
															</h5>
															<?php else: ?>
															<h5 class="btn btn-danger log-btn color">
																	<?php  echo anchor("admin/book/$key->id/$user_id","Book"); ?>
															</h5>
															<?php endif; ?>
															</td>
															</tr>
															<?php $i=0; ?>
															<?php $j++;?>
														<?php elseif ($i<8) : ?>
															<td ><span><?php echo $key->price; ?></span>
															<?php if($key->book_status>0): ?>
																<h5 class="btn btn-danger log-btn color">
																Booked
															</h5>
															<?php else: ?>
															<h5 class="btn btn-danger log-btn color">
																	<?php  echo anchor("admin/book/$key->id/$user_id","Book"); ?>
															</h5>
															<?php endif; ?>
															</td>
															
														<?php endif; ?>
														<?php endforeach; ?>
														

		</tbody>
		</table>

</div>
<div id="message"></div>
<?php echo form_close(); ?>
<!-- </div> -->