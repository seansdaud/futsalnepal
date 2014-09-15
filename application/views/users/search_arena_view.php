	<h1>Search Arena</h1>
	<?php echo form_open('user_controller/find_arena') ?>
	<select id="find_arena" name="find_arena" >
	  <option value="Pokhara">Pokhara</option>
	  <option value="kathmandu">Kathmandu</option>
	  <option value="Chitwan">Chitwan</option>
	  <option value="Biratnagar">Biratnagar</option>
	</select>
	<p>
		<input type="submit" value="search" />
	</p>
	<?php echo form_close(); ?>

	<?php if(!empty($records)): foreach($records as $row): ?>
		<div>Arena:<?php echo $row->arena; ?></div>
		<div>Price:<?php echo $row->price; ?></div>
		<div>Location:<?php echo $row->location." ".$row->city; ?></div></br>
	<?php endforeach;?>
	<?php else : ?>
		<h4>No arenas exist</h4>

	<?php endif; ?>

	<?php echo anchor("user_controller/form_login", 'login'); ?>
	<?php echo anchor("user_controller/form_signup", 'signup'); ?>
