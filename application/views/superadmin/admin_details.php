<div>
	
	<?php 
		if(isset($records)) {

			foreach($records as $row):
				echo $row->username."<br />";
				echo $row->email."<br />";
				echo anchor("superAdmin/remove_admin/$row->id", "Delete");
			endforeach;
		}
		else{
			echo "No Admins";
		}
	?>

</div>