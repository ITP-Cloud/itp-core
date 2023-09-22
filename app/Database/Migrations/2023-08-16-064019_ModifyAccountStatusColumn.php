<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyAccountStatusColumn extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('users', [
            'account_status' => [
                'name' => 'account_status',
                'type' => 'ENUM',
                'constraint' => ['pending', 'active', 'suspended', 'banned'],
                'default' => 'pending',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
