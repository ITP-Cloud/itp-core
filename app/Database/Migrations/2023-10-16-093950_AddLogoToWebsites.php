<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLogoToWebsites extends Migration
{
    public function up()
    {
        $this->forge->addColumn('managed_websites', [
            'md_ws_logo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'md_ws_name'
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
