<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'         => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'date_added timestamp default current_timestamp',
			'action'     => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '256',
			],
			'user'       => [
				'type'       	 => 'INT',
				'constraint' 	 => 10,
				'unsigned'   	 => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user', 'users', 'id');
		$this->forge->createTable('log');
	}

	public function down()
	{
		$this->forge->dropTable('log');
	}
}
