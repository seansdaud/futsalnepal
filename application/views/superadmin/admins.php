<h1 class="heading">Admins</h1>
<?php if(isset($records)): ?>
<table class="table table-hover">
	<?php foreach($records as $row): ?>
  	<tr>
	  <td><?php echo anchor("superAdmin/admin_details/$row->id", $row->username); ?></td>
	  <td><div class="remove"><?php echo anchor("superAdmin/remove_admin/$row->id","<span class='glyphicon glyphicon-remove fav-icon'></span>"); ?></div></td>
	</tr>
<?php endforeach; ?>
<?php else: ?>
	No admins
</table>
<?php endif; ?>
<?php echo $this->pagination->create_links(); ?>