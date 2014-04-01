<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Name the filename as 006_add_template_to_pages (LOWERCASE), 
	then the class name should be like this - Migration_add_template_to_pages*/
class Migration_Add_template_to_pages extends CI_Migration {

	public function __construct()
	{
		parent::__construct();
	}

	/*Migration class requires two important functions - 
	UP function && DOWN function*/


	/*The Up Function is run when there is a DB update*/
	public function up(){
		$fields = array(
			'template'=>array(
				'type' => 'VARCHAR',
				'constraint' => 25,
				),
			);
		$this->dbforge->add_column('pages', $fields);
	}

	/*The DOWN Function is run when there is a DB rollback*/
	public function down(){
		/*Drop the Users table in the down function*/
		$this->dbforge->drop_column('pages', 'template');
	}

}/* End of file 006_add_template_to_pages.php */
/* Location: ./application/migrations/006_add_template_to_pages.php */