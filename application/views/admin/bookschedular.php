
<div class="show">
	<?php
		date_default_timezone_set("Asia/Katmandu"); 
		echo $user_id;
		echo date('w') +1; 
		$day=date('w') +1; 
		echo "<input type='hidden' id='today' value='".$day."' >";
		echo "</br>";
		$date=date("Y-m-d"); 
		echo "<div class='today'>Date:</div>".$date."</br>";
		echo " <input type='hidden' id='date' value='".$date."' >";
		echo "<div class='today'>Current-time:</div>".date( "g:i a")."</br>";
 	?>
 </div>

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<div id="time"></div>
<div class="panel-body">
	<table id='mytable' name='futsal-table'  class='table' border=1 width=100% >
		<tbody id='my'>
													<tr>
															<td name='time'><span class="day">Time </td>
															<td name='sunday'><span class="day">Sunday</span><div class="din1"></div></td>
															<td name='monday'><span class="day">Monday</span><div class="din2"></div></td>
															<td name='tuesday'><span class="day">Tuesday</span><div class="din3"></div></td>
															<td name='wednesday'><span class="day">Wednesday</span><div class="din4"></div></td>
															<td name='thrusday'><span class="day">Thrusday</span><div class="din5"></div></td>
															<td name='friday'><span class="day">Friday</span><div class="din6"></div></td>
															<td name='saturday'><span class="day">Saturday</span><div class="din7"></div></td>
													</tr>
													
														<?php $time=$schedular[0]->time_diff; ?>
														<input type='hidden' name='diff' value='<?php echo $time; ?>'>
													
													<?php $i=0; ?>
													<?php $j=0; ?>
													<?php $k=0; ?>
													<?php $c=0; ?>
														<?php foreach ($schedular as $key ): ?>
														<?php $i++;?>
														<?php $k++;?>
														<?php $c++;?>
														<?php if($i==1) : ?>
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td class='rows<?php echo $k;?>'>
												
																<?php echo $key->price; ?>
															
																<?php if($key->book_status>0): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
															
															<?php else: ?>
																<?php echo form_open("admin/book"); ?>
																<input type="hidden" name="key_id" value="<?php echo $key->id; ?>">
																<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
																<div class='date_send<?php echo $k;?>'></div>
																<input  type="submit"  class="btn btn-danger"  value="Book" >
																<?php echo form_close(); ?>
										
															<?php endif; ?>
															</td>
														<?php elseif ($i==7): $k=0;?>
															<td class='rows<?php echo $k;?>'>
															
																<?php echo $key->price; ?>
															<?php if($key->book_status>0): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
															<?php else: ?>
															<?php echo form_open("admin/book"); ?>
																<input type="hidden" name="key_id" value="<?php echo $key->id; ?>">
																<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
																<div class='date_send<?php echo $k;?>'></div>
																<input  type="submit"  class="btn btn-danger"  value="Book" >
																<?php echo form_close(); ?>
															<?php endif; ?>
															</td>
															</tr>
															<?php $i=0; ?>
															<?php $j++;?>
														<?php elseif ($i<8) : ?>
															<td class='rows<?php echo $k;?>'>
															
																<?php echo $key->price; ?>
															<?php if($key->book_status>0): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
																
															<?php else: ?>
															<?php echo form_open("admin/book");  ?>
																<input type="hidden" name="key_id" value="<?php echo $key->id; ?>">
																<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
																<div class='date_send<?php echo $k;?>'></div>
																<input  type="submit"  class="btn btn-danger"  value="Book" >
																<?php echo form_close(); ?>
															<?php endif; ?>
															</td>
															
													<?php endif; ?>
														<?php endforeach; ?>
														

		</tbody>
		</table>

</div>
<div id="message" ></div>

<!-- </div> -->