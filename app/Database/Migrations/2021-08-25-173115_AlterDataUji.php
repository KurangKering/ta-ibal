<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterDataUji extends Migration
{
	const TABLE = "data_uji";

	public function up()
	{
		$this->forge->addColumn(AlterDataUji::TABLE, array(

			'arti_kata' => array(
				'type' => 'TEXT',
			),
			
			'kata_pakar' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			
		));

	}

	public function down()
	{
		$this->forge->dropColumn(DataUjiMigration::TABLE, array('arti_kata', 'kata_pakar'));
	}
}
