<div class="show">
	<?php
		date_default_timezone_set("Asia/Katmandu"); 

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
 <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="1"><a href="#1" role="tab" data-toggle="tab">Sunday</a></li>
  <li class="2"><a href="#2" role="tab" data-toggle="tab">Monday</a></li>
  <li class="3"><a href="#3" role="tab" data-toggle="tab">Tuesday</a></li>
  <li class="4"><a href="#4" role="tab" data-toggle="tab">Wednesday</a></li>
  <li class="5"><a href="#5" role="tab" data-toggle="tab">Thrusday</a></li>
   <li class="6"><a href="#6" role="tab" data-toggle="tab">Friday</a></li>
    <li class="7"><a href="#7" role="tab" data-toggle="tab">Saturday</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<?php for ($i=1; $i < 8 ; $i++):?>
		<?php if($i==$day): ?>                                                                                             
	 		 <div class="tab-pane fade in active" id="<?php echo $i; ?>">  
	 		 	      
					<div class='showdate date_get<?php echo $i;?>'></div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
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
														$this->db->where('day',$i);
														$schedular=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
														 ?>
										

														<?php foreach ($schedular as $key ): ?>

									
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td>
																<?php if($key->book_status>0): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" Not Booked" ></div>
															<?php endif; ?>
															</td>
															<td>
																<?php if($key->book_status>0): ?>
																<?php  $bookin=$this->db->where('id', $key->book_status)->get('booking')->result();
																	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
															
																<div>
																	<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->name; ?>" >

																</div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" NOne" ></div>
															<?php endif; ?>
															</td>
															<td>
																<div>
																	Rs.<?php echo $key->price; ?>
																</div>
															</td>
															<td>
																<?php if($key->book_status>0): ?>
																<?php  $bookin=$this->db->where('id', $key->book_status)->get('booking')->result();
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
														<?php endforeach; ?>
						</table>
					</div>
	 		 </div>
		<?php else: ?>
			<div class="tab-pane fade " id="<?php echo $i; ?>">
			<div class='showdate date_get<?php echo $i;?>'></div>     
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
														$this->db->where('day',$i);
														$schedular=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
													

														 ?>
										

														<?php foreach ($schedular as $key ): ?>

									
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td>
																<?php if($key->book_status>0): ?>
																<div><input  type="button"  class="btn btn-primary"  value="Booked" ></div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" Not Booked" ></div>
															<?php endif; ?>
															</td>
															<td>
																<?php if($key->book_status>0): ?>
																<?php  $bookin=$this->db->where('id', $key->book_status)->get('booking')->result();
																	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
															
																<div>
																	<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->name; ?>" >

																</div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" NOne" ></div>
															<?php endif; ?>
															</td>
															<td>
																<div>
																	Rs.<?php echo $key->price; ?>
																</div>
															</td>
															<td>
																<?php if($key->book_status>0): ?>
																<?php  $bookin=$this->db->where('id', $key->book_status)->get('booking')->result();
																	$user= $this->db->where('id', $bookin[0]->user_id)->get('user')->result();
																?>
															
																<div>
																	<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->contactno; ?>" >

																</div>
															<?php else: ?>
																<div><input  type="button"  class="btn btn-danger"  value=" NOne" ></div>
															<?php endif; ?>
															</td>
														<?php endforeach; ?>
						</table>
					</div>
			</div>
		<?php endif; ?>
<?php endfor; ?>

  

</div>
