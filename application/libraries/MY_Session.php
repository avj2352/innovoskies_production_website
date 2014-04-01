<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session {

	public function __construct()
	{
		parent::__construct();
	}

	public function sess_update()
	{
		/*The Trick is to only updat the session if its not an AJAX request*/
		/*We can if we are dealing with AJAX requests by Listening to the HTTP_X_REQUESTED_WITH server variable*/
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest'){
			/*Then we know that this is not an AJAX call*/
			parent::sess_update();
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */