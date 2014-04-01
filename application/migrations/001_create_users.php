<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Name the filename as 001_create_users (LOWERCASE), 
	then the class name should be like this - Migration_Create_users*/
class Migration_Create_users extends CI_Migration {

	public function __construct()
	{
		parent::__construct();
	}

	/*Migration class requires two important functions - 
	UP function && DOWN function*/


	/*The Up Function is run when there is a DB update*/
	public function up(){
		/*Create a Users table in the up function*/
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'email'=>array(
				'type' => 'VARCHAR',
				'constraint' => '100'
				),
			'password' =>array(
				'type' => 'VARCHAR',
				'constraint' => '128'
				),
			'name' =>array(
				'type' => 'VARCHAR',
				'constraint' => '100'
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
		 
	}

	/*The DOWN Function is run when there is a DB rollback*/
	public function down(){
		/*Drop the Users table in the down function*/
		$this->dbforge->drop_table('users');
	}

}/* End of file 001_create_users.php */
/* Location: ./application/migrations/001_create_users.php */