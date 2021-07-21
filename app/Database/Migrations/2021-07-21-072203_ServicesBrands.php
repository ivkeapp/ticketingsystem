<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServicesBrands extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'service'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'brand'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
		]);
		$this->forge->addForeignKey('service', 'authorized_services', 'id');
		$this->forge->addForeignKey('brand', 'brands', 'id');
		$this->forge->createTable('authorized_services_brands');
	}

	public function down()
	{
		$this->forge->dropTable('authorized_services_brands');
	}
}
