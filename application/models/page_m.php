<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_m extends MY_Model {

	protected $_table_name = 'pages';
	// protected $_primary_key = 'id';
	// protected $_primary_filter = 'intval';
	protected $_order_by = 'order';
	public $rules = array(
		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'Parent ID', 
			'rules' =>'trim|intval',
			),
		'template' => array(
			'field' => 'title', 
			'label' => 'Template', 
			'rules' =>'trim|required|max_length[25]|xss_clean',
			),
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' =>'trim|required|max_length[100]|xss_clean',
			),
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' =>'trim|required|max_length[100]|url_title|xss_clean|callback__unique_slug', 
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

	/*Lesson 10: Managing pages part-1.
	*Creating a function which returns a new Page
	*/
	public function get_new(){
		/*The following creates an empty class object*/
		$page  = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->order = '';
		$page->body = '';
		$page->parent_id = 0;
		$page->template = 'page';
		return $page;
	}/*End of the get_new function*/

	/*Public function to get Nested pages*/
	public function get_nested (){
		$this->db->order_by("order","asc");
		$pages = $this->db->get('pages')->result_array();
		// dump($pages);
		$array = array();
		foreach ($pages as $page) {
			if ( !$page['parent_id'] ){
    			if(!isset($array[$page['id']]))
        			$array[$page['id']] = $page;
    			else
       				$array[$page['id']] = array_merge($page,$array[$page['id']]);
			}else {
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}/*End of the get_nested method*/

	/*Dynamically get news Archive links*/
	public function get_archive_link(){
		/*We want a single object returned - with template always as news_archive*/
		$page = parent::get_by(array('template' => 'news_archive'), TRUE);
		return isset($page->slug) ? $page->slug : '';

	}/*End of the get_archive_link*/

	/*Save the ordering of pages*/
	/*Takes an array of the order of pages to be saved*/
	public function save_order($pages){
		if(count($pages)){
			foreach ($pages as $order => $page) {
				/*dump($page);*/
				/*Only save the page whose item id is not an empty string*/
				if($page['item_id'] != ''){
					$data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
					/*echo '<pre>'. $this->db->last_query() . '</pre>';*/
				}
			}
		}
	}/*End of the save_order method*/


	/*Listing the Parents along with their childs in the Pages View*/
	public function get_with_parent($id = NULL, $single = FALSE){
		/*Creating two new Columns: p.slug as parent_slug and 2. p.title as parent_title*/
		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
		/*Writing a Join query as a active record style*/
		$this->db->join('pages as p','pages.parent_id = p.id', 'left');
		return parent::get($id, $single);
	}/*End of the get_with_parent method*/

	/*Function to fetch Pages without Parents -> ie., Parent Pages themselves*/
	public function get_no_parents(){
		/*Fetch pages without parents*/
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$pages = parent::get();

		/*Return key => value pair array*/
		$array = array( 0 => 'No Parent');
		if(count($pages)){
			foreach ($pages as $page) {
				$array[$page->id] = $page->title;
			}
		}

		return $array;
	}/*End of the get_no_parents method*/

	/*Finally lets override the delete() of the parent*/
	/*Now that we have child pages: Deleting a page should also take care of its ORPHAN child pages XD*/
	public function delete($id){
		/*1. Delete the current page*/
		parent::delete($id);
		/*2. Set its child pages parent_id value to 0*/
		$this->db->set(array('parent_id' => 0))->where('parent_id', $id)->update($this->_table_name);
	}/*End of the overrided delete()*/

}/* End of file page_m.php */
/* Location: ./application/models/page_m.php */