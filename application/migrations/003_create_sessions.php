<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Name the filename as 001_create_users (LOWERCASE), 
	then the class name should be like this - Migration_Create_users*/
class Migration_Create_Sessions extends CI_Migration {

	public function __construct()
	{
		parent::__construct();
	}

	/*Migration class requires two important functions - 
	UP function && DOWN function*/


	/*The Up Function is run when there is a DB update*/
	public function up(){
		/*Create a ci_sessions table in the up function*/

		$fields = array(
			'session_id VARCHAR(40) DEFAULT \'0\' NOT NULL',
			'ip_address VARCHAR(45) DEFAULT \'0\' NOT NULL',
			'user_agent VARCHAR(120) NOT NULL',
			'last_activity INT(10) unsigned DEFAULT \'0\' NOT NULL',
			'user_data text NOT NULL',
			);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('session_id', TRUE);
		$this->dbforge->create_table('ci_sessions');
	
		$this->db->query('ALTER TABLE `ci_sessions` ADD KEY `last_activity_idx` (`last_activity`)');
	}

	/*The DOWN Function is run when there is a DB rollback*/
	public function down(){
		/*Drop the Users table in the down function*/
		$this->dbforge->drop_table('ci_sessions');
	}

}/* End of file 003_create_sessions.php */
/* Location: ./application/migrations/003_create_sessions.php */