<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Frontend_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('article_m');
		$this->data['recent_news'] = $this->article_m->get_recent();
		
	}/*End of the contructor method*/

	public function index($id, $slug){
		// dump("Welcome to the Article controller!");
// 		Fetch the article
		$this->db->where('pubdate <=', date('Y-m-d'));
		$this->data['article'] = $this->article_m->get($id);
 		// dump($this->data['article']);


// 		Return a 404 if the article is not found
 		count($this->data['article']) || show_404(uri_string());

// 		Redirect if the slug is incorrect
 		$request_slug=$this->uri->segment(3);
 		$set_slug=$this->data['article']->slug;

 		if ($request_slug !=$set_slug) {
 			redirect('article/'.$this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
 		}

// 		Load the subview and load the main layout
 		$this->data['subview'] = 'article';
 		$this->load->view('_main_layout', $this->data);
	
	}/*End of the Article function*/
}/* End of file Article.php */
/* Location: ./application/controllers/Article.php */