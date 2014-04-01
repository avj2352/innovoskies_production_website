<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
  		/*Load the SUBVIEW - index with the data array*/
		$this->data['subview'] = 'admin/dashboard/index';
		$this->load->view('admin/_layout_main', $this->data);
		
	}/*End of the index function*/

	public function model(){
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
		
	}/*End of the model function*/

}/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */