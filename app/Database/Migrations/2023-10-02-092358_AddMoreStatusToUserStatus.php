<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMoreStatusToUserStatus extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('users', [
            'account_status' => [
                'name' => 'account_status',
                'type' => 'ENUM',
                'constraint' => ['pending', 'under_review', 'active', 'suspended', 'banned'],
                'default' => 'pending',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
