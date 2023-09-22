<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class MoveColumnsInUsersTable extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('users', 'created_at');
        $this->forge->dropColumn('users', 'updated_at');
        $this->forge->dropColumn('users', 'deleted_at');

        $this->forge->addColumn('users', [
            'created_at' => [
                'type'       => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
