<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class CreateModeratorAccount extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();

        $user = new User([
            'firstname' => 'Aaron',
            'lastname' => 'Mkandawire',
            'phone' => '260977777777',
            'country' => 'Zambia',
            'student_id'  => '00000000',
            'institution' => 'Zambia University College of Technology',
            'email'    => 'aaronmkandawire44@outlook.com',
            'password' => '1234@abcd',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());
        $user->addGroup('superadmin');
        $user->activate();
    }
}
