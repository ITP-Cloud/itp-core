<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRejectedAccountStatus extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('users', [
            'account_status' => [
                'name' => 'account_status',
                'type' => 'ENUM',
                'constraint' => ['pending', 'under_review', 'active', ' rejected', 'suspended', 'banned'],
                'default' => 'pending',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
