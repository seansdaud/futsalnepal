<div id="show">
<?php $attributes = array( 'id' => 'myform');
echo form_open("admin/update_schedule",$attributes); ?>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<div id="time"></div>
<div id="id"></div>
<div id="result"></div>
<div id="submit"></div>
<div id="message"></div>
<?php echo form_close(); ?>
</div>