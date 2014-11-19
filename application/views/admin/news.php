<h1 class="heading">Media/News</h1>

<h2 class="btn btn-default submit btn-log"><?php echo anchor('admin/create_news', 'Create News') ?></h2>

<?php
	if(!empty($news)){
		$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
		$id=$id[0]->id;
		$i=0; 
		$num = $this->db->where('admin_id',$id)->get('news')->num_rows();
		foreach($news as $row): $i++; if($i==1):?>
			<div class="row separator">
				<div class="col-md-4 news-col">
					<div class="admin-news">
						<a href='<?php echo base_url("admin/news_edit/$row->id") ?>' class="tile">
						<?php 
							echo img(array(
										'src'=>'assets/images/news/'.$row->image,
										'class'=>'thumb',
										'height'=> 100,
										'width'=> 180
									));
							echo "<div class='title'>".$row->title."</div>";
						?>
						</a>
						<hr />
						<div class="news-action action">
							<?php
								echo anchor("admin/news_delete/$row->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));
								echo anchor("admin/news_edit/$row->id", "<span class='glyphicon glyphicon-pencil'></span>", array('data-toggle'=>'tooltip', 'title'=>'Edit'));
							?>
						</div>
					</div>
				</div>
		<?php elseif($i == 3): $i = 0; ?>
				<div class="col-md-4 news-col">
					<div class="admin-news">
						<a href='<?php echo base_url("admin/news_edit/$row->id") ?>' class="tile">
						<?php 
							echo img(array(
										'src'=>'assets/images/news/'.$row->image,
										'class'=>'thumb',
										'height'=> 100,
										'width'=> 180
									));
							echo "<div class='title'>".$row->title."</div>";
						?>
						</a>
						<hr />
						<div class="news-action action">
							<?php
								echo anchor("admin/news_delete/$row->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));
								echo anchor("admin/news_edit/$row->id", "<span class='glyphicon glyphicon-pencil'></span>", array('data-toggle'=>'tooltip', 'title'=>'Edit'));
							?>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
				<div class="col-md-4 news-col">
					<div class="admin-news">
						<a href='<?php echo base_url("admin/news_edit/$row->id") ?>' class="tile">
						<?php 
							echo img(array(
										'src'=>'assets/images/news/'.$row->image,
										'class'=>'thumb',
										'height'=> 100,
										'width'=> 180
									));
							echo "<div class='title'>".$row->title."</div>";
						?>
						</a>
						<hr />
						<div class="news-action action">
							<?php
								echo anchor("admin/news_delete/$row->id", "<span class='glyphicon glyphicon-trash'></span>", array('data-toggle'=>'tooltip', 'title'=>'Delete'));
								echo anchor("admin/news_edit/$row->id", "<span class='glyphicon glyphicon-pencil'></span>", array('data-toggle'=>'tooltip', 'title'=>'Edit'));
							?>
						</div>
					</div>
				</div>
		<?php endif;
		endforeach;
		echo "<br />";
		if(($num%3) != 0):
			echo "</div>";
		endif;
		echo $this->pagination->create_links();
	} 
	
?>