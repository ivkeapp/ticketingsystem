<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		// add new identity info
		$fields = [
			'firstname'      => ['type' => 'VARCHAR', 'constraint' => 63, 'after' => 'username'],
			'lastname'       => ['type' => 'VARCHAR', 'constraint' => 63, 'after' => 'firstname'],
			'department'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'after' => 'lastname'],
		];
		//$this->forge->addForeignKey('department', 'auth_groups', 'id');
		$this->forge->addColumn('users', $fields);
	}

	public function down()
	{
		// drop new columns
		$this->forge->dropColumn('users', 'firstname');
		$this->forge->dropColumn('users', 'lastname');
		$this->forge->dropColumn('users', 'department');
	}
}