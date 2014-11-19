<h1 class="heading">Media / Videos</h1>

<?php echo $this->session->flashdata('feedback');?>

<?php echo form_open('admin/add_video', array('data-toggle'=> 'validator')); ?>
	<h1>ADD VIDEO</h1>
	<div class="form-group">
		<input type="text" name="name" id="name" class="form-control" maxlength="35" placeholder="Video topic" required>
	</div>
	<div class="form-group">
		<textarea name="video" id="video" class="form-control" placeholder="youtube-video-url (e.g.http://www.youtube.com/watch?v=1r3CqVxk9so)" required></textarea>
		<div class="help-block with-errors"></div>
	</div>

    <div class="submit">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>
<?php echo form_close(); ?>
	<div class="row-separator"
		<div class="row">
		<?php if(!empty($video)): foreach($video as $row):?>
			<div class="col-md-4">
					<?php echo $row->name."</br>"; ?>
					<iframe width="200" height="200" src="//www.youtube.com/embed/<?php echo $row->video; ?>" frameborder="0" allowfullscreen></iframe> 
			 		<?php echo anchor("admin/delete_video/$row->id", "<span class='glyphicon glyphicon glyphicon-trash'></span>");?> 
			</div>
			<?php endforeach;?>
		</div>

	</div>

	<?php else : ?>
		<h4>No videos</h4>

	<?php endif;?>
