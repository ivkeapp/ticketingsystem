<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedAdminUser extends Migration
{
	public function up()
	{
		foreach ($this->seedData as $seed ) {
            		$sql = 'INSERT INTO users (email, username, department, password_hash, active) VALUES '.$seed;
            		$this->db->query($sql);
       		}
	}

	public function down()
	{
		foreach ($this->seedData as $seed) {
           		$sql = 'DELETE FROM users WHERE username = "webmaster"';
        		$this->db->query($sql);
        	}
	}
	
	private $seedData = array(
        '("admin@example.com", "webmaster", "1", "$2y$10$kD8C9mJdfpYB9Rgqg6Ag6eZBQPCYrMsJ9qYw.SWzQkizMvryNjMQe", "1")',
        '("ivke90@gmail.com", "administrator", "1", "$2y$10$kD8C9mJdfpYB9Rgqg6Ag6eZBQPCYrMsJ9qYw.SWzQkizMvryNjMQe", "1")',
	);

}
