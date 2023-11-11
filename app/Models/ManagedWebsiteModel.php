<?php

namespace App\Models;

use CodeIgniter\Model;

class ManagedWebsiteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'managed_websites';
    protected $primaryKey       = 'md_ws_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'developer_id',
        'md_ws_name',
        'md_ws_logo',
        'md_ws_description',
        'md_ws_type',
        'md_ws_tech_stack',
        'md_ws_port_number',
        'md_ws_vhost_identifier',
        'md_ws_website_absolute_path'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'md_ws_created_at';
    protected $updatedField  = 'md_ws_updated_at';
    protected $deletedField  = 'md_ws_deleted_at';

    function isNameTaken(string $website_name = ''): bool
    {
        $count = $this
            ->where('md_ws_name', $website_name)
            ->countAllResults();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllWebsites()
    {
        return
            $this->select('managed_websites.*, users.firstname, users.lastname')
            ->join('users', 'managed_websites.developer_id = users.id')
            ->findAll();
    }

    public function searchWebsites(string $query = '')
    {
        return
            $this->select('managed_websites.*, users.firstname, users.lastname')
            ->join('users', 'managed_websites.developer_id = users.id')
            ->like('md_ws_name', $query)
            ->orLike('md_ws_port_number', $query)
            ->findAll();
    }
}
