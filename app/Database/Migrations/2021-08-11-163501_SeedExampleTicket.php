<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedExampleTicket extends Migration
{
	public function up()
	{
		foreach ($this->seedData as $seed ) {
            		$sql = 'INSERT INTO tickets (title, type, model, brand, serial_number, description, staff_owner, is_resolved) VALUES '.$seed;
            		$this->db->query($sql);
       		}

	}

	public function down()
	{
		//TODO: improve bad assumption that its a first ticket
		$sql = 'DELETE FROM tickets WHERE id = 1';
        	$this->db->query($sql);
	}

	private $seedData = array(
        '("Example title", "1", "Example Model", "1", "Example serial no", "Example fault description", "1", "0")',
        '("Resolved example title", "1", "Example Model", "1", "Resolved example serial no", "Resolved example fault description", "1", "1")',
	);

}
