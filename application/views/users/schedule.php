<?php 
$date = new DateTime();
$timestamp= $date->getTimestamp();
$dw = date( "w", $timestamp); 
print_r($dw+1)?>

<?php foreach ($admin as $admins ):?>
<?php echo $admins->username; ?>
</br>
Price table
			<table class="table" border="4">
										<tr>
											<td>Time</td>
											<td>sunday</td>
											<td>monday</td>
											<td>tuesday</td>
											<td>wednesday</td>
											<td>thrusday</td>
											<td>friday</td>
											<td>saturday</td>
										</tr>


							<?php foreach ($schedular as $keys ): ?>
												<?php if ($keys->admin_id== $admins->id) :?>
														<?php $time=$keys->time_diff; ?>
														<input type='hidden' name='diff' value='<?php echo $time; ?>'>
												<?php endif; ?>
							<?php endforeach; ?>
													<?php $i=0; ?>
													<?php $j=0; ?>
													<?php $c=0; ?>
														<?php foreach ($schedular as $key ): ?>
														<?php if ($key->admin_id== $admins->id) :?>
														<?php $i++;?>
														<?php $c++;?>
														<?php if($i==1) : ?>
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td ><span><?php echo $key->price; ?>
																<h5 class="btn btn-danger log-btn color">
																	<?php  echo anchor("futsalnepal/book/$key->id","Book"); ?>
																</h5>
																</span>
															</td>
														<?php elseif ($i==7): ?>
																<td ><span><?php echo $key->price; ?>
																<h5 class="btn btn-danger log-btn color">
																	<?php  echo anchor("futsalnepal/book/$key->id","Book"); ?>
																</h5>
																</span></td>
																</tr>
																<?php $i=0; ?>
																<?php $j++;?>
														<?php elseif ($i<8) : ?>
															<td ><span><?php echo $key->price; ?>
																<h5 class="btn btn-danger log-btn color">
																	<?php  echo anchor("futsalnepal/book/$key->id","Book"); ?>
																</h5>
																</span></td>
														<?php endif; ?>

													<?php endif; ?>
										<?php endforeach; ?>

</table>
<?php endforeach; ?>
</div>
