<?php foreach ($admin as $admins ):?>
<?php echo $admins->username; ?>
</br>
Price table
			<table border="4">
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
														<?php if ($keys->admin_id== $admins->id) :?>
														<?php $i++;?>
														<?php $c++;?>
														<?php if($i==1) : ?>
															<tr>
															<td name='time'><?php echo $key->start_time; ?>--<?php echo $key->end_time; ?></td>
															<td ><span><?php echo $key->price; ?></span></td>
														<?php elseif ($i==7): ?>
																<td ><span><?php echo $key->price; ?></span></td>
																</tr>
																<?php $i=0; ?>
																<?php $j++;?>
														<?php elseif ($i<8) : ?>
															<td ><span><?php echo $key->price; ?></span></td>
														<?php endif; ?>

													<?php endif; ?>
										<?php endforeach; ?>

</table>
<?php endforeach; ?>