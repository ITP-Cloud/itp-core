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
}
