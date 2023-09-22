<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMoreColumnsToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '14',
            ],
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'student_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true
            ],
            'student_id_document' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'portrait_holding_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'institution' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'account_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'active', 'suspended', 'banned'],
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
