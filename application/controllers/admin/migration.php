<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends Admin_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->library('migration');
		/* The Migration library's current() will look for the migrations current version and run it */
		if(!$this->migration->current()){
			show_error($this->migration->error_string());
		}else{
			echo 'Migration Worked!';
			die();
		}
	
	}/*End of the Migration function*/
}/* End of file Migration.php */
/* Location: ./application/controllers/admin/Migration.php */