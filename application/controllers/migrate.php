<?php
class Migrate extends CI_Controller {
	function index(){
		$this->load->library('migration');

		if ( ! $this->migration->current('create_table'))
		{
			show_error($this->migration->error_string());
		}
	}
}