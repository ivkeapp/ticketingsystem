<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Brands extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '128',
			],
			'date_added' => [
				'type'       => 'TIMESTAMP',
				'default' => 'current_timestamp()',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('brands');
	}

	public function down()
	{
		$this->forge->dropTable('brands');
	}
}
