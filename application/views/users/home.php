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
<?php foreach ($schedule as $schedules ): ?>
	<?php if ($schedules->admin_id== $admins->id) :?>
<tr>
	<td>
	<?php  echo $schedules->start_time;?>--<?php echo $schedules->end_time; ?>
	</td>
	<td><?php echo $schedules->sunday_price; ?><input type="button" value="Book" ></td>
	<td><?php echo $schedules->monday_price; ?><input type="button" value="Book" ></td></td>
	<td><?php echo $schedules->tuesday_price; ?><input type="button" value="Book" ></td></td>
	<td><?php echo $schedules->wednesday_price; ?><input type="button" value="Book" ></td></td>
	<td><?php echo $schedules->thrusday_price; ?><input type="button" value="Book" ></td></td>
	<td><?php echo $schedules->friday_price; ?><input type="button" value="Book" ></td></td>
	<td><?php echo $schedules->saturday_price; ?><input type="button" value="Book" ></td></td>
</tr>
<?php endif; ?>
<?php endforeach; ?>
</table>
<?php endforeach; ?>