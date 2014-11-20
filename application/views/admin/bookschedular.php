<h1 class="heading"><?php 
$name=$this->db->where('id',$this->session->userdata('user_id'))->get('user')->result();
		echo "Booking for ".$name[0]->name.""; ?>
		</h1>
<div class="show">
	<?php
		date_default_timezone_set("Asia/Katmandu"); 

		// echo date('w') +1; 
		// $day=date('w') +1; 
		// echo "<input type='hidden' id='today' value='".$day."' >";
		// echo "</br>";
		// $date=date("Y-m-d"); 
		// echo "<div class='today'>Date:</div>".$date."</br>";
		// echo " <input type='hidden' id='date' value='".$date."' >";
		// echo "<div class='today'>Current-time:</div>".date( "g:i a")."</br>";

		date_default_timezone_set("Asia/Katmandu"); 
		$day=date('w') +1; 
		echo "<input type='hidden' id='today' value='".$day."' >";
		echo "</br>";
		$date=date("Y-m-d"); 
		echo "<div class='today'>Date:".$date."</div></br>";
		echo " <input type='hidden' id='date' value='".$date."' >";
		echo "<div class='today'>Current-time:".date( "g:i a")."</div></br>";
 
 	?>
 </div>

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<!-- <div id="time"></div>
<div class="panel-body">
	<table id='mytable' name='futsal-table'  class='table ' border=1 width=100% >
		<tbody id='my'>
													<tr>
															<td name='time'><span class="day">Time </span></td>
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
																<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
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
																<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
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
																<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
																<div class='date_send<?php echo $k;?>'></div>
																<input  type="submit"  class="btn btn-danger"  value="Book" >
																<?php echo form_close(); ?>
															<?php endif; ?>
															</td>
															
													<?php endif; ?>
														<?php endforeach; ?>
														

		</tbody>
		</table>

</div> -->

 <?php echo form_open("admin/book_for_all"); ?>
		<div class="form-group ">
			<label for="username">Choose Date:</label>
		</div>
		<div class="form-group ">
			<input type="text" name="getdate" id="datepick" class="form-control" placeholder="Choose Date" required>
			</br>
			<input type ="submit" value="View Detail" class="btn btn-primary">
			</br>
	</div>
<?php echo form_close(); ?>
 <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="1"><a href="#1 " role="tab" data-toggle="tab">Sunday</a></li>
  <li class="2"><a href="#2" role="tab" data-toggle="tab">Monday</a></li>
  <li class="3"><a href="#3 " role="tab" data-toggle="tab">Tuesday</a></li>
  <li class="4"><a href="#4 " role="tab" data-toggle="tab">Wednesday</a></li>
  <li class="5"><a href="#5" role="tab" data-toggle="tab">Thrusday</a></li>
   <li class="6"><a href="#6" role="tab" data-toggle="tab">Friday</a></li>
    <li class="7"><a href="#7" role="tab" data-toggle="tab">Saturday</a></li>
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

	 		 <div class="tab-pane fade in active" id="<?php echo $array[$i]; ?>">  
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
					<script type="text/javascript">
					 var dull = document.getElementById("date_now<?php echo $i; ?>").value;
					</script>
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
														$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
														$adminid= $admin[0]->id;
														$this->db->where('day',$array[$i]);
														$schedular=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
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
																<?php echo form_open("admin/book"); ?>
																<input type="hidden" name="key_id" value="<?php echo $key->id; ?>">
																<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
																<input type='hidden' name='date' value='<?php echo $datePlusFive; ?>'>
																<input  type="submit"  class="btn btn-success"  value="Book" >
																<?php echo form_close(); ?>
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
			<div class="tab-pane fade " id="<?php echo $array[$i]; ?>">
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
														$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
														$adminid= $admin[0]->id;
														$this->db->where('day',$array[$i]);
														$schedular=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
													

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
																<?php echo form_open("admin/book"); ?>
																<input type="hidden" name="key_id" value="<?php echo $key->id; ?>">
																<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
																<input type='hidden' name='date' value='<?php echo $datePlusFive; ?>'>
																<input  type="submit"  class="btn btn-success"  value="Book" >
																<?php echo form_close(); ?>
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

<div id="message" ></div>

<!-- </div> -->