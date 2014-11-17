<h1 class="heading">News / Create</h1>

<?php echo form_open_multipart('admin/news_post', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Title :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="Enter title here" name="title" value="<?php echo set_value('title'); ?>" required>
		<div class="help-block with-errors"></div>
		<?php echo form_error('title'); ?>
	</div>
</div>

<div class="form-group">
	<LABEL class="col-sm-2 control-label">Choose Image :</LABEL>
	<div class="col-sm-10">
		<input type="file" id="file" name="image" accept="image/gif, image/jpeg, image/png" required/>
		<div class="help-block with-errors"></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Content :</label>
</div>
	<textarea name="content" id="body" class="form-control">
		<?php echo set_value('content'); ?>
	</textarea>
	<script>
        CKEDITOR.replace( 'body' );
    </script>

<div class="submit">
	<button type="submit" class="btn btn-default">Submit</button>
</div>

<?php echo form_close(); ?>