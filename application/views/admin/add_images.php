<?php
	if($this->db->get_where('album',array('id'=>$this->uri->segment(3)))->num_rows()==1){
		$admin_id = $this->db->select('admin_id')->get_where('album',array('id'=>$this->uri->segment(3)))->result();
		$admin_id=$admin_id[0]->admin_id;
		$admin=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
		$admin=$admin[0]->id;

	if($admin_id==$admin):
?>
		<?php echo form_open_multipart('admin/add_images/', array('data-toggle'=>'validator'))?>
		
		<div class="form-group">
			<div><label for="file">Add image's</label></div>
			<input type="file" id="file" name="image[]" multiple="multiple" accept="image/gif, image/jpeg, image/png" required/>
			<div class="help-block with-errors"></div>
		</div>

		<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">

		<input type="submit" class="btn btn-default" value="Add Images" >

	<?php echo form_close(); ?>


	<?php $i=0; 
		$num = $this->db->get_where('image',array('album_id'=>$this->uri->segment(3)))->num_rows();
		foreach($album as $photos): $i++; if($i==1):?>
			<div class="row separator">
				<div class="col-md-4 news-col">
					<a class="example-image-link thumb" height="200" width="250" href="<?php echo base_url('assets/images/album/'.$photos->image); ?>" data-lightbox="example-set" >
					<img class="example-image" height="200" width="250" src="<?php echo base_url('assets/images/album/'.$photos->image); ?>" alt=""/></a>
					<div class="delete img-dlt">
						<?php  echo anchor("admin/delete_image/$photos->id","<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
					</div>						
				</div>
		<?php elseif($i == 3): $i = 0; ?>
				<div class="col-md-4 news-col">
					<a class="example-image-link thumb" height="200" width="250" href="<?php echo base_url('assets/images/album/'.$photos->image); ?>" data-lightbox="example-set" >
					<img class="example-image" height="200" width="250" src="<?php echo base_url('assets/images/album/'.$photos->image); ?>" alt=""/></a>
					<div class="delete img-dlt">
						<?php  echo anchor("admin/delete_image/$photos->id","<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
					</div>
				</div>
			</div>
		<?php else: ?>
				<div class="col-md-4 news-col">
					<a class="example-image-link thumb" height="200" width="250" href="<?php echo base_url('assets/images/album/'.$photos->image); ?>" data-lightbox="example-set" >
					<img class="example-image" height="200" width="250" src="<?php echo base_url('assets/images/album/'.$photos->image); ?>" alt=""/></a>
					<div class="delete img-dlt">
						<?php  echo anchor("admin/delete_image/$photos->id","<span class='glyphicon glyphicon glyphicon-trash'></span>"); ?>
					</div>
				</div>
		<?php endif;
		endforeach;
		echo "<br />";
		if(($num%3) != 0):
			echo "</div>";
		endif;
		else:?>
			<h1 class="heading">Add image to your album</h1>
			Please select your <a href="<?php echo base_url('admin/album'); ?>">album</a> to add images to.
		<?php endif;
	} 
	else{ ?>
			<h1 class="heading">Add image to your album</h1>
			Please select your <a href="<?php echo base_url('admin/album'); ?>">album</a> to add images to.
		<?php }?>
	
		
	