<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Name the filename as 001_create_users (LOWERCASE), 
	then the class name should be like this - Migration_Create_users*/
class Migration_Parent_id_to_pages extends CI_Migration {

	public function __construct()
	{
		parent::__construct();
	}

	/*Migration class requires two important functions - 
	UP function && DOWN function*/


	/*The Up Function is run when there is a DB update*/
	public function up(){ 
		/*Create a Users table in the up function*/
		$fields = (array(
			'parent_id'=>array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 0,
				),
			));
		$this->dbforge->add_column('pages', $fields);
	}

	/*The DOWN Function is run when there is a DB rollback*/
	public function down(){
		/*Drop the Users table in the down function*/
		$this->dbforge->drop_column('pages', 'parent_id');
	}

}/* End of file 004_parent_id_to_pages.php */
/* Location: ./application/migrations/004_parent_id_to_pages.php */