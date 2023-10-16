<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IncreaseUsernameColumnSize extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('users', [
            'username' => [
                'name' => 'username',
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
