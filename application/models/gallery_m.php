<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_m extends MY_Model {

	protected $_table_name = 'gallery';
	// protected $_primary_key = 'id';
	// protected $_primary_filter = 'intval';
	protected $_order_by = 'pubdate desc,  id desc';
	// protected $_timestamp = TRUE;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication Date', 
			'rules' =>'trim|required|exact_length[10]|xss_clean',
			),
		'title' => array(
			'field' => 'title', 
			'label' => 'Image Title', 
			'rules' =>'trim|required|max_length[25]|xss_clean',
			),
		'path' => array(
			'field' => 'path', 
			'label' => 'Image Source', 
			'rules' =>'trim|xss_clean',
			),
		'category' => array(
			'field' => 'category', 
			'label' => 'Category', 
			'rules' =>'trim|required|max_length[25]|xss_clean',
			),
		'description' => array(
			'field' => 'description', 
			'label' => 'Descripiton', 
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
		$gallery  = new stdClass();
		$gallery->title = '';
		$gallery->path = '';
		$gallery->pubdate = date('Y-m-d');
		$gallery->category = '';
		$gallery->description = '';
		return $gallery;
	}/*End of the get_new function*/


	/*Dynamically get news Archive links*/
	// public function get_gallery_link($image_title){
		/*We want a single object returned - with template always as news_archive*/
		// $gallery = parent::get_by(array('title' => $image_title), TRUE);
		// return isset($gallery->path) ? $page->path : '';

	// }/*End of the get_archive_link*/

	/*Finally lets override the delete() of the parent*/
	/*Now that we have child pages: Deleting a page should also take care of its ORPHAN child pages XD*/
	public function delete($id){
		parent::delete($id);
	}/*End of the overrided delete()*/

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

	/*Overriding the MY_Model array_from_post method to include full path of file*/
		public function array_from_post($fields){
		/*create a new Array and stores the POST data inside each of its associative array*/
		$data = array();
		foreach($fields as $field){
			if($field == 'path'){
				$path = $this->config->item('server_root');
            //Get the uploaded file metadata into an array
                        $upload_data = $this->upload->data();
                        // var_dump($upload_data); die();
                        $upload_data['file_name']!='' ? $file = $upload_data['file_name'] : $file = '';
                        $data[$field] = $file;
                        // var_dump($data); die();
			}else{
				$data[$field] = $this->input->post($field);
			}
		}/*End of foreach*/
			// var_dump($data); die();
		return $data;
	}/*End of the array_from_post method*/

}/* End of file gallery_m.php */
/* Location: ./application/models/gallery_m.php */