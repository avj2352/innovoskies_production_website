<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends MY_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'name';
	/*This follows the CI form validation conventions, the properties 
		that need to be defined for validation to happen successfully
	*/
	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' =>'trim|required|valid_email|callback__email_exists|xss_clean',
			),
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' =>'trim|required',
		));

	public $rules_admin = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' =>'trim|required|xss_clean',
		),
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' =>'trim|required|valid_email|callback__unique_email|xss_clean',
			),
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' =>'trim|matches[password_confirm]',
		),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm Password', 
			'rules' =>'trim|matches[password]',
		),
		);
	protected $_timestamp = FALSE;

	public function __construct()
	{
		parent::__construct();
		
	}/*End of constructor*/

	/*Lesson 10: Managing User part-2.
	*Creating a function which returns a new User
	*/
	public function get_new(){
		/*The following creates an empty class object*/
		$user  = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}/*End of the get_new function*/

	/*Create a login function */
	public function login(){
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
			), TRUE);
		/*If we donot find any email ID, then the $user will be any empty array*/

		if(count($user)){
			/*User array exists, therefore the user can login*/
			$data = array(
				'name' => $user->name,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
				);
			$this->session->set_userdata($data);
		}

	}/*End of login function*/

	/*Create a logout function. It will kill the current user session */
	public function logout(){
		  /*Equally simple. Simply destroy the any session created*/
		  $this->session->sess_destroy();
	}/*End of logout function*/

	/*Create a loggedin function. It will check if the user is currently logged in */
	public function loggedin(){
		  /*Its easy to check if the user is logged in. all we have to do is
		  check if the loggedin is set to TRUE*/
		return (bool) $this->session->userdata('loggedin');  

	}/*End of loggedin function*/

		/*Create a hash function. It will only hash the user's password and is called in login */
	public function hash($string){
		/*What it basically does is this:
		*1. use the hash function and the sha512 to encrypt the password - 128 chars long
		*2. Use the string as second parameter, but the string will be sorted with the encrpytion_key
		*/
		  return hash('sha512', $string . config_item('encryption_key'));

	}/*End of hash function*/

}/* End of file  */
/* Location: ./application/models/user_m */