<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataUjiMigration extends Migration
{
	const TABLE = "data_uji";

	public function up()
	{
		$this->forge->addField(array(

			'id' => array(
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			),
			'kata' => array(
				'type' => 'TEXT',
			),
			'kata_stemmed' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'ketemu' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'null' => TRUE,
			),
		));

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable(DataUjiMigration::TABLE);
	}

	public function down()
	{
		$this->forge->dropTable(DataUjiMigration::TABLE);
	}
}
