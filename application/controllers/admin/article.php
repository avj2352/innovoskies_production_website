<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*This controller is on the topic: article authentication: Lesson 7*/
class Article extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_m');
	}

	/*For managing articles, We use the following functions*/
	/*Function to create a new article*/
	/*Lesson09: Managing article part 1*/
	/*index() - Here we fetch all articles from the Database*/
	public function index(){
		$this->data['articles'] = $this->article_m->get();

	/*Load the view with the data array*/	
		$this->data['subview'] = 'admin/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}/*End of the index function*/

	/*Function to edit current article*/
	public function edit($id = NULL){
	/*Lesson09: Managing article part 1*/
	/*edit() - Fetch a article or set a new one*/
		if($id){
			$this->data['article'] = $this->article_m->get($id);
			/*If ID exists, and the article is not FOUND*/
			count($this->data['article']) || $this->data['errors'][] ="article could not be found";

		}else{
			$this->data['article'] = $this->article_m->get_new();
			} 

		/*This is to create a Form validation*/
		/*edit() - Setup the form */
		$rules = $this->article_m->rules;
		/*Do a bit of Hacking into the rules - If we are inserting a new article, Password is required*/
		$this->form_validation->set_rules($rules);

		/*edit() - Process the form*/
		if($this->form_validation->run() == TRUE){
			/*To setup a new method to set of values to be stored properly*/
			 $data = $this->article_m->array_from_post(array('title', 'slug', 'body', 'pubdate'));
			 /*The Save method is already created in the MY_Model.php*/
			 $this->article_m->save($data, $id); 
			 redirect('admin/article');
		}/*End of Form Validation*/

		/*edit() - Load the view with the data array*/
		$this->data['subview'] = 'admin/article/edit';
		$this->load->view('admin/_layout_main', $this->data);

	}/*End of the edit function*/

	public function delete($id){
		/*Lesson 10: To delete the article WITH ID*/
		$this->article_m->delete($id);
		redirect('admin/article');

	}/*End of the delete function*/

}/* End of file article.php */
/* Location: ./application/controllers/article.php */
