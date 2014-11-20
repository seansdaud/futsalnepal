<div class="show">
	<?php
		date_default_timezone_set("Asia/Katmandu"); 

		//echo date('w') +1; 
		$day=date('w') +1; 
		echo "<input type='hidden' id='today' value='".$day."' >";
		echo "</br>";
		$date=date("Y-m-d"); 
		echo "<div class='today'>Date:</div>".$date."</br>";
		echo " <input type='hidden' id='date' value='".$date."' >";
		//echo "<div class='today'>Current-time:</div>".date( "g:i a")."</br>";
 	?>
 </div>
 <?php echo form_open("admin/detail_schedular_post"); ?>
	<!-- 	<div class="form-group ">
			<label for="username">Choose Date:</label>
		</div>
		<div class="form-group ">
					<input type="text" name="getdate" id="datepick" class="form-control" placeholder="Choose Date" required>
					</br>
					<input type ="submit" value="View Detail" class="btn btn-primary">
					</br>
		</div> -->
<?php echo form_close(); ?>
<?php foreach ($admin as $admins ):?>
	<?php 	echo "<input type='hidden' class='adminid' value='".$admins->id."' >"; ?>
<div class="show">Schedule for <?php echo $admins->fieldname; ?>:</div>
</br>
<ul class="nav nav-tabs" role="tablist">
  <li class="1<?php echo $admins->id; ?>" ><a href="#1<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Sunday</a></li>
  <li class="2<?php echo $admins->id; ?>" ><a href="#2<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Monday</a></li>
  <li class="3<?php echo $admins->id; ?>" ><a href="#3<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Tuesday</a></li>
  <li class="4<?php echo $admins->id; ?>" ><a href="#4<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Wednesday</a></li>
  <li class="5<?php echo $admins->id; ?>" ><a href="#5<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Thrusday</a></li>
   <li class="6<?php echo $admins->id; ?>" ><a href="#6<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Friday</a></li>
    <li class="7<?php echo $admins->id; ?>" ><a href="#7<?php echo $admins->id; ?>" role="tab" data-toggle="tab">Saturday</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<?php 

$loop=$day+8;
$daynew=$day;
$array=array();
for ($i=0; $i <8 ; $i++) { 
	$array[$i]=$daynew;
	$daynew=$daynew+1;
	
	if($daynew==8){
		$daynew=1;
	}
	
}
// print_r($array);
// die();
$i=-1;
$loop=7+$day;
for ($m=$day; $m <= $loop ; $m++): $i++;?>

		<?php if($m==$day):?>         

	 		 <div class="tab-pane fade in active" id="<?php echo $array[$i];echo $admins->id; ?>">  
					<div class='showdate'><?php 
								$parts = explode('-', $date);
								$datePlusFive = date(
								    'Y-m-d', 
								    mktime(0, 0, 0, $parts[1], $parts[2]+$i , $parts[0])
								    //              ^ Month    ^ Day + 5      ^ Year
								);	
								echo $datePlusFive;		
								?></div>
					<input type="hidden" id='date_now<?php echo $i;?>' >
	 		 		<div class="panel-body tabbody">
						<table name='table'  class='table detailtable' border=1 width=100% >

																			<tr>
																					<td name='time'><span class="day">Time</span></td>
																					<td name='status'><span class="day">Status</span></td>
																					<td name='booked_by'><span class="day">Booked By</span></td>
																					<td name='price'><span class="day">Price</span></td>
																					<td name='phone_no'><span class="day">Phone no:</span></td>
																					
																			</tr>
																			
														<?php 
														$this->db->where('day',$array[$i]);
														$schedular=$this->db->where('admin_id', $admins->id)->get('scheduler')->result();
														 ?>
										
														 <?php $k=0; ?>
														<?php foreach ($schedular as $key ): ?>
														<?php $k++; ?>
															
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td>
															<?php  $bookin=$this->db->where('status', $key->book_status)->where('booking_date',$datePlusFive)->get('booking')->result();?>
																<?php if($key->book_status>0 && !empty($bookin)): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" Not Booked" ></div>
															<?php endif; ?>
															</td>
															<td>
																<?php if($key->book_status>0 && !empty($bookin)): ?>
																<?php	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
															
																<div>
																	<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->name; ?>" >

																</div>
															<?php else: ?>
																<div>
																	<div><input  type="button"  class="btn btn-danger"  value=" Not Booked" ></div>
																</div>
															<?php endif; ?>
															</td>
															<td>
																<div>
																	Rs.<?php echo $key->price; ?>
																</div>
															</td>
															<td>
																	<?php if($key->book_status>0 && !empty($bookin)): 
																	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
																	<?php if(!empty($user[0]->contactno)): ?>
																	<div>
																		<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->contactno; ?>" >

																	</div>
																	<?php else: ?>
																		<div><input  type="button"  class="btn btn-danger"  value=" NOne" ></div>
																	<?php endif; ?>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" NOne" ></div>
															<?php endif; ?>
															</td>
																<?php if ($k==7){ $k=0;}?>
														<?php endforeach; ?>
						</table>
					</div>
	 		 </div>
		<?php else: ?>
			<div class="tab-pane fade " id="<?php echo $array[$i]; echo $admins->id; ?>">
				<div class='showdate'><?php 
								$parts = explode('-', $date);
								$datePlusFive = date(
								    'Y-m-d', 
								    mktime(0, 0, 0, $parts[1], $parts[2]+$i, $parts[0])
								    //              ^ Month    ^ Day + 5      ^ Year
								);	
								echo $datePlusFive;	
								?></div>
						 		<div class="panel-body tabbody">
						<table name='table'  class='table detailtable' border=1 width=100% >

																			<tr>
																					<td name='time'><span class="day">Time</span></td>
																					<td name='status'><span class="day">Status</span></td>
																					<td name='booked_by'><span class="day">Booked By</span></td>
																					<td name='price'><span class="day">Price</span></td>
																					<td name='phone_no'><span class="day">Phone no:</span></td>
																					
																			</tr>
																			<!-- <?php 
																			$this->db->where('day',$i);
																			$this->db->where('book_status >', '0');
																			$book=$this->db->get('scheduler')->result();
																		
																			 ?> -->
														<?php 
														$this->db->where('day',$array[$i]);
														$schedular=$this->db->where('admin_id', $admins->id)->get('scheduler')->result();
														 ?>
										

													
														 <?php $k=0; ?>
														<?php foreach ($schedular as $key ): ?>
														<?php $k++; ?>

									
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td>
															<?php  $bookin=$this->db->where('status', $key->book_status)->where('booking_date',$datePlusFive)->get('booking')->result();?>
																<?php if($key->book_status>0 && !empty($bookin)): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" Not Booked" ></div>
															<?php endif; ?>
															</td>
															<td>
																<?php if($key->book_status>0 && !empty($bookin)): 
																
																	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
															
																<div>
																	<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->name; ?>" >

																</div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" Not Booked" ></div>
															<?php endif; ?>
															</td>
															<td>
																<div>
																	Rs.<?php echo $key->price; ?>
																</div>
															</td>
															<td>
															<?php if($key->book_status>0 && !empty($bookin)): 
																	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
															
																<div>
																	<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->contactno; ?>" >

																</div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" NOne" ></div>
															<?php endif; ?>
															</td>
															<?php if ($k==7){ $k=0;}?>
														<?php endforeach; ?>
						</table>
					</div>
			</div>
		<?php endif; ?>
<?php endfor; ?>

  

</div>
<?php endforeach; ?>
</div>
