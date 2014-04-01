<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Name the filename as 001_create_users (LOWERCASE), 
	then the class name should be like this - Migration_Create_users*/
class Migration_Create_articles extends CI_Migration {

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
				'auto_increment' => TRUE,
				),
			'title'=>array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'slug' =>array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'pubdate' =>array(
				'type' => 'DATE',
				),
			'body' =>array(
				'type' => 'TEXT',
				),
			'created' =>array(
				'type' => 'DATETIME',
				),
			'modified' =>array(
				'type' => 'DATETIME',
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('articles');
	}

	/*The DOWN Function is run when there is a DB rollback*/
	public function down(){
		/*Drop the Users table in the down function*/
		$this->dbforge->drop_table('articles');
	}

}/* End of file 005_create_articles.php */
/* Location: ./application/migrations/005_create_articles.php */