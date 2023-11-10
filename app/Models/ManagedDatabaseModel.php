<?php

namespace App\Models;

use CodeIgniter\Model;

class ManagedDatabaseModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'managed_databases';
    protected $primaryKey       = 'md_db_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'developer_id',
        'md_db_name'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'md_db_created_at';
    protected $updatedField  = 'md_db_updated_at';
    protected $deletedField  = 'md_db_deleted_at';

    function isNameTaken(string $database_name = ''): bool
    {
        $count = $this
            ->where('md_db_name', $database_name)
            ->countAllResults();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllDatabases()
    {
        return
            $this->select('managed_databases.*, users.firstname, users.lastname')
            ->join('users', 'managed_databases.developer_id = users.id')
            ->findAll();
    }

    public function getAllDatabasesFor(int $developer_id)
    {
        return
            $this->select('managed_databases.*, users.firstname, users.lastname')
            ->join('users', 'managed_databases.developer_id = users.id')
            ->where('developer_id', $developer_id)
            ->findAll();
    }
}
