<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateManagedDatabasesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'md_db_id' => [
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
            'md_db_name' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'md_db_created_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'md_db_updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'md_db_deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('md_db_id', true);
        $this->forge->addForeignKey('developer_id', 'users', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('managed_databases');
    }

    public function down()
    {
        //
    }
}
