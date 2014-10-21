<div class="panel-body">
	<?php echo form_open("admin/custom_book_schedule"); ?>
		<div class="form-group ">
			<label for="user">Player Name:</label>
		</div>
		<div class="form-group ">
			<input type="text" name="user" id="user" class="form-control" placeholder="Type Name" required >
		</div>
		<div class="form-group ">
			<label for="phn">Phone Number:</label>
		</div>
		<div class="form-group ">
			<input type="text" name="phn" id="phn" class="form-control" placeholder="Type Phone Number" >
		</div>	
		<div class="form-group ">
			<input type ="submit" value="Book" class="btn btn-primary">
			</br>
	</div>
	<?php echo form_close(); ?>
</div>
