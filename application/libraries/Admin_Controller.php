<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*The Admin Controller to check for the Login Page and the User authentication*/
class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = 'Innovoskies';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');

		/*This will take care of the History to ensure 
		that the back button doesnt let you go to the login page*/
		/*Also takes care of the never ending loop*/
		$exception_uris = array(
			'admin/user/logout',
			'admin/user/login',
			);

		if(in_array(uri_string(), $exception_uris) == FALSE){
			if($this->user_m->loggedin() == FALSE){
			redirect('admin/user/login');
			}/*End of the if loggedin*/
		}/*End of the if in_array*/


	}/*End of the constructor*/

}/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */