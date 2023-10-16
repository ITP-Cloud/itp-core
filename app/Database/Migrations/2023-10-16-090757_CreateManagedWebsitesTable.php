<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateManagedWebsitesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'md_ws_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'developer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'md_ws_name' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'md_ws_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'md_ws_type' => [
                'type' => 'ENUM',
                'constraint' => ['developer-site', 'system-site'],
                'default' => 'developer-site'
            ],
            'md_ws_tech_stack' => [
                'type' => 'ENUM',
                'constraint' => ['plain', 'standard_php', 'codeigniter4', 'laravel', 'node'],
                'default' => 'plain'
            ],
            'md_ws_port_number' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'md_ws_vhost_identifier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'md_ws_website_absolute_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'md_ws_created_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'md_ws_updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'md_ws_deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('md_ws_id', true);
        $this->forge->addForeignKey('developer_id', 'users', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('managed_websites');
    }

    public function down()
    {
        //
    }
}
