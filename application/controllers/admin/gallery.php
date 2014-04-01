<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*This controller is on the topic: page authentication: Lesson 7*/
class Gallery extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_m');
		$config = array(
                    'upload_path' => APPPATH . '../img/gallery',
                    'allowed_types' => 'jpg|jpeg|png',
                    'max_size' => 2000,
                    'overwrite' => TRUE
                );
        /*Calling the Upload library and passing the $config array*/
        $this->load->library('upload', $config);
	}

	/*For managing pages, We use the following functions*/
	/*Function to create a new Page*/
	/*Lesson09: Managing Page part 1*/
	/*index() - Here we fetch all pages from the Database*/
	public function index(){
		$this->data['artworks'] = $this->gallery_m->get();

	/*Load the view with the data array*/	
		$this->data['subview'] = 'admin/gallery/index';
		$this->load->view('admin/_layout_main', $this->data);
	}/*End of the index function*/

	/*Function to edit current page*/

	/*Chapter 13: AJAX*/
	/*We need two function to handle Ajax*/
	/*This is where we order the pages*/

	public function edit($id = NULL){
	/*Lesson09: Managing page part 1*/
	/*edit() - Fetch a page or set a new one*/
		if($id){
			$this->data['artwork'] = $this->gallery_m->get($id);
			/*If ID exists, and the page is not FOUND*/
			count($this->data['artwork']) || $this->data['errors'][] ="Artwork could not be found";

		}else{
			$this->data['artwork'] = $this->gallery_m->get_new();
			}


			/*Pages for the dropdown*/
		// dump($this->data['pages_no_parents']);   

		/*This is to create a Form validation*/
		/*edit() - Setup the form */
		$rules = $this->gallery_m->rules;
		/*Do a bit of Hacking into the rules - If we are inserting a new page, Password is required*/
		$this->form_validation->set_rules($rules);
		/*edit() - Process the form*/
		/*Check if the Files Upload has an issues*/
		if($this->form_validation->run() && $this->upload->do_upload('path')) {
				// var_dump($check_file_upload);
				// var_dump($this->upload->do_upload('path'));
			/*To setup a new method to set of values to be stored properly*/			                
			 $data = $this->gallery_m->array_from_post(array('pubdate', 'title', 'path', 'category', 'description'));
			 /*The Save method is already created in the MY_Model.php*/
			 $this->gallery_m->save($data, $id); 
			 redirect('admin/gallery');
		}else if($this->form_validation->run() && !$this->upload->do_upload('path')){
				$this->data['wrong_file'] = 'Wrong File Type';
		}
		/*End of Form Validation*/

		/*edit() - Load the view with the data array*/
		$this->data['subview'] = 'admin/gallery/edit';
		$this->load->view('admin/_layout_main', $this->data);

	}/*End of the edit function*/

	public function delete($id){
		/*Lesson 10: To delete the page WITH ID*/
		$this->gallery_m->delete($id);
		redirect('admin/gallery');

	}/*End of the delete function*/

	/*This is being called inside of the page_m ->$rules_admin array*/
	public function _unique_slug($str){
		/*The way we set this is up is similar to is_unique() of CI*/
		/*Except we check for an Exception*/
		/*_unique_email() - This is only called in the Edit page form*/
		/*Do not Validate if the the slug already exists*/
		/*UNLESS its the slug for the currently updated page*/
		$id = $this->uri->segment(4);
		$page = $this->db->where('slug', $this->input->post('slug'));
		/*We should look for the email as unique, only except for the current page*/
		/*If we donot have a page ID then ignore this line*/
		!$id || $this->db->where('id !=', $id);
		$page = $this->page_m->get();
		/*If the page is found*/
		if(count($page)){
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}/*End of the custom callback: _unique_email method*/

}/* End of file page.php */
/* Location: ./application/controllers/admin/page.php */