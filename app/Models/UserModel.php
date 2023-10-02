<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Models\UserModel as ModelsUserModel;

class UserModel extends ModelsUserModel
{
    protected $allowedFields    = [
        'username',
        'firstname',
        'lastname',
        'phone',
        'country',
        'student_id',
        'student_id_document',
        'portrait_holding_id',
        'institution',
        'account_status',
        'active',
        'last_active'
    ];
}
