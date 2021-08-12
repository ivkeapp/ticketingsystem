<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedBrands extends Migration
{
	public function up()
	{
		foreach ($this->seedData as $seed ) {
            		$sql = 'INSERT INTO brands (name) VALUES '.$seed;
            		$this->db->query($sql);
       		}

	}

	public function down()
	{
		foreach ($this->seedData as $seed) {
			$name = substr($seed, 2, -2);
           		$sql = 'DELETE FROM brands WHERE name = \''.$name.'\'';
        		$this->db->query($sql);
        	}

	}
	private $seedData = array(
        '("Dell")',
        '("HP")',
	'("Acer")',
	'("Cooler Master")',
        '("BenQ")',
	'("Samsung")',
	'("Huawei")',
        '("Xiaomi")',
	'("iRobot")',
	'("Verbatim")',
        '("Sony")',
	'("DJI")',
	);

}
