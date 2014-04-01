<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data  = array();	
	public function __construct(){
		parent::__construct();
		$this->data['errors'] = array();
		$this->data['meta_title'] = 'Innovoskies';
		$this->data['meta_title'] = 'Innovoskies';
		$this->data['site_name'] = config_item('site_name');
	}

	public function index(){
		dump("Welcome to the MY_Controller controller!");
	
	}/*End of the MY_Controller function*/
}/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */