<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*The FrontEnd controller to display the menu of the website for any user*/
class Frontend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		/*Load stuff from page_m*/
		$this->load->model('page_m');
		$this->load->model('article_m');
	

		/*Fetch Navigation*/
		$this->data['menu'] = $this->page_m->get_nested();
		$this->data['news_archive_link'] = $this->page_m->get_archive_link();
	}

	public function index()
	{
		
	}

}/* End of file Frontend_Controller.php */
/* Location: ./application/controllers/Frontend_Controller.php */