<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tickets extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'title'      => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '128',
			],
			'date_added timestamp default current_timestamp',
			'type'       => [
				'type'       	 => 'INT',
				'constraint' 	 => 11,
				'unsigned'   	 => true,
			],
			'model'      => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '128',
			],
			'brand'      => [
				'type'       	 => 'INT',
				'constraint' 	 => 11,
				'unsigned'   	 => true,
			],
			'serial_number'=> [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '256',
			],
			'description' => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '512',
			],
			'staff_owner' => [
				'type'       	 => 'INT',
				'constraint' 	 => 11,
				'unsigned'   	 => true,
			],
			'is_resolved' => [
				'type'       	 => 'INT',
				'constraint' 	 => 1,
				'unsigned'   	 => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('type', 'types', 'id');
		$this->forge->addForeignKey('brand', 'brands', 'id');
		$this->forge->addForeignKey('staff_owner', 'users', 'id');
		$this->forge->createTable('tickets');
	}

	public function down()
	{
		$this->forge->dropTable('tickets');
	}
}
