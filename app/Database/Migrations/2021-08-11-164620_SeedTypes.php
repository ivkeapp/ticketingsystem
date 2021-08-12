<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedTypes extends Migration
{
	public function up()
	{
		foreach ($this->seedData as $seed ) {
            		$sql = 'INSERT INTO types (name) VALUES '.$seed;
            		$this->db->query($sql);
       		}

	}

	public function down()
	{
		foreach ($this->seedData as $seed) {
			$name = substr($seed, 2, -2);
           		$sql = 'DELETE FROM types WHERE name = \''.$name.'\'';
        		$this->db->query($sql);
        	}

	}
	private $seedData = array(
        '("Notebook")',
        '("Monitor")',
	'("Desktop")',
	'("Tastatura")',
        '("Miš")',
	'("Mobilni telefon")',
	'("Maticna ploca")',
        '("Mikrofon")',
	'("Baterija")',
	'("Diktafon")',
        '("Kamera")',
	'("GPS")',
        '("Dron")',
	'("Elektricni trotinet")',
	);

}
