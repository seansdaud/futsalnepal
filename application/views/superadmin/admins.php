<div>

	<?php 
		if(isset($records)) {

			foreach($records as $row):
				echo anchor("superAdmin/admin_details/$row->id", $row->username);
				echo "<br />";
			endforeach;
		}
		else{
			echo "No Admins";
		}
		echo $this->pagination->create_links();
	?>

</div>