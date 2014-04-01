<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*Base Model Class to define all the Generic CRUD Functionalities*/
class MY_Model extends CI_Model {

/*The following should be the basic variables for a basic Model*/
	protected $_table_name = '';
	protected $_primary_key = 'id';
//$_primary_filter is a method passed on as a property
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_timestamp = FALSE;	
	public $rules = array();

	public function __construct()
	{
		parent::__construct();
		
	}/*End of constructor*/

	/*Function to get all the records of a particular table, OR depending upon the primary key*/
	/*The get function will take one mandatory variable, one optional $single variable*/
	public function get($id = NULL, $single = FALSE){
		if($id != NULL){
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
	/*If single variable is set to TRUE, while calling the function, just get one record*/
		}else if($single == TRUE){
			$method = 'row';
		}else{
			$method = 'result';
		}
		/*Finally we need to order the fetched rows*/
		/*if db is already ordered, then a variable will be set - $this->db->ar_orderby*/
		if(!count($this->db->ar_orderby)){
			/*If its empty, then WE will do the order*/
			$this->db->order_by($this->_order_by);	
		}
		return $this->db->get($this->_table_name)->$method();
	}/*End of the get() function*/

	/*The get_by function will take one mandatory variable - $where, one optional - $single variable*/
	public function get_by($where, $single = FALSE){ 
		$this->db->where($where);
	/*Calls the above function BUT according to active records, will filter using the where command*/
		return $this->get(NULL, $single);
	}/*End of the get_by function*/

        /*The Idea is that if you are passing an ID, then its an update, else its an Insert query*/
	public function save($data, $id = NULL){
            /*If the time_Stamp variable is true then we will create now date variable*/
            if($this->_timestamp == TRUE){
                $now = date('Y-m-d H:i:s');
                $id || $data['created'] = $now;
                $data['modified'] = $now;
            }
		/*The Idea behind setting ID as parameter is because:*/
			/*1. If the ID is NULL, then its a save*/
			/*2. If we need to update a record, we can pass in the ID as second parameter*/
            if($id === NULL){
        /*Just to ensure, if a primary key is passed inside the Data, lets set it to NULL*/
                !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
                $this->db->set($data);
                $this->db->insert($this->_table_name);
                $id = $this->db->insert_id();
            }
            //Update
            else{
                $filter = $this->_primary_filter;
                $id = $filter($id);
                $this->db->set($data);
                $this->db->where($this->_primary_key, $id);
                $this->db->update($this->_table_name);
            }
            
            return $id;
		
	}/*End of the save function*/

	public function delete($id){
	     $filter = $this->_primary_filter;
             
             $id = $filter($id);
             
             /*For security, we will check if we donot have a valid ID/ then dont delete anything*/
             if(!$id){
                 return FALSE;
             }
               
             $this->db->where($this->_primary_key, $id);
             $this->db->limit(1);
             $this->db->delete($this->_table_name);
             
	}/*End of the delete function*/

	/*Lesson 10: Creating a new method to save the data*/
	public function array_from_post($fields){
		/*create a new Array and stores the POST data inside each of its associative array*/
		$data = array();
		foreach($fields as $field){
			$data[$field] = $this->input->post($field);
		}/*End of foreach*/
		return $data;
	}/*End of the array_from_post method*/

}/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
