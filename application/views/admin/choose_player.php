<div class="panel-body">
	<?php echo form_open("admin/pre_book_schedule"); ?>
		<div class="form-group ">
			<label for="username">Provide valid Username:</label>
		</div>
		<div class="form-group ">
			<input type="text" name="user" class="form-control" placeholder="Choose User" id="searchmem" required>
			</br>
			<input type="hidden" id="base_url1" value="<?php echo base_url(); ?>">
			<input type ="submit" value="Book" id="btn_book" class="btn btn-primary">
			</br>
	</div>
	<?php echo form_close(); ?>
</div>
<div id="display"></div>
<div class="id"></div>
