<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_m extends MY_Model {

	protected $_table_name = 'articles';
	// protected $_primary_key = 'id';
	// protected $_primary_filter = 'intval';
	protected $_order_by = 'pubdate desc,  id desc';
	protected $_timestamp = TRUE;

	/*The Exact length of MySQL Date string is 10 characters*/
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication Date', 
			'rules' =>'trim|required|exact_length[10]|xss_clean',
			),
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' =>'trim|required|max_length[100]|xss_clean',
			),
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' =>'trim|required|max_length[100]|url_title|xss_clean|',
			),
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' =>'trim|required',
			),
		);
	// protected $_timestamp = FALSE;

	public function __construct()
	{
		parent::__construct();
		
	}/*End of constructor*/

	/*Lesson 10: Managing articles part-1.
	*Creating a function which returns a new Page
	*/
	public function get_new(){
		/*The following creates an empty class object*/
		$article  = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		return $article;
	}/*End of the get_new function*/

	/*
	*setting a pubdate function to YYYY-MM-DD
	*/
	public function set_published(){
		
		$this->db->where('pubdate <=', date('Y-m-d'));
		
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}/*End of the set_published method*/

	/*Get recent articles on the sidebar*/
	public function get_recent($limit = 3){
		$limit = (int) $limit;

	}/*End of the get_recent method*/

}/* End of file article_m.php */
/* Location: ./application/models/article_m.php */