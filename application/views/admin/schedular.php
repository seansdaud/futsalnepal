
<h1 class="heading">Create Schedule</h1>
<div class="panel-body"> 
	<?php $attributes = array( 'id' => 'myform');
	echo form_open("admin/add_schedule",$attributes); ?>
		<div >
			<label for="start_time">Starting Time:</label>
		</div>
		<div class="form-group">
			 <input  name="start_time" type="text" id="start_time" size="8" required>
		</div>
		<div>
			<label for="end_time">Ending Time:</label>
		</div>
		<div class="form-group">
			 <input name="end_time" type="text" size="8" required>
		</div>
		<div class="submit">
			 <input name="create" type="button"  class="btn btn-primary"  value="Create Schedule" required>
		</div>
		<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
		
		<div id="time"></div>
		<div id="checked"></div>
		<div id="result"></div>
		<div id="submit" ></div>
	<?php echo form_close(); ?>
</div>
