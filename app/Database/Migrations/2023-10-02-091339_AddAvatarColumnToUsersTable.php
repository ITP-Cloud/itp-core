<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAvatarColumnToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'username'
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
