<h1 class="heading">News / Edit</h1>

<?php echo form_open_multipart('admin/news_edit_post',  array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
<?php if(!empty($records)): foreach($records as $rows): ?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Title :</label>
		<div class="col-sm-10">
			<input type="text" name="title" class="form-control" value="<?php echo $rows->title; ?>" required>
			<div class="help-block with-errors"></div>
			<?php echo form_error('title'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Image :</label>
		<div class="col-sm-10">
			<div>
				<img id="imagePreview1" src='<?php echo base_url("assets/images/news/$rows->image"); ?>' width="180px" height="180px">
				<img id="imagePreview" width="120px" height="120px">
			</div>
			<div class="choose">
				<button class="btn btn-default changeImage">Change</button>
				<input type="file" class="btn imageFile" id="uploadImage" name="image" accept="image/gif, image/jpeg, image/png">
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Content :</label>
	</div>
		<textarea name="content" id="body" class="form-control">
			<?php echo $rows->content; ?>
		</textarea>
		<script>
	        CKEDITOR.replace( 'body' );
	    </script>

	<input type="hidden" name="id" value="<?php echo $rows->id; ?>">
	<?php endforeach; ?>

	<div class="submit">
		<button type="submit" class="btn btn-default">Update</button>
	</div>

<?php echo form_close(); ?>

<?php else: ?>

<h4>Please select your <a href="<?php echo base_url("admin/news"); ?>">news</a> to edit</h4>

<?php endif; ?>