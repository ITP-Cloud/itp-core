<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegisterController;
use CodeIgniter\Shield\Entities\User;

class RegisterController extends ShieldRegisterController
{
    public function registerView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        return view('auth/register');
    }

    public function createTestUser()
    {
        $users = auth()->getProvider();

        $user = new User([
            'firstname' => 'Aaron',
            'lastname' => 'Mkandawire',
            'phone' => '260977777777',
            'country' => 'Zambia',
            'student_id'  => '123456789',
            'institution' => 'University of Zambia',
            'email'    => 'aaronmk2001@gmail.com',
            'password' => '1234@abcd',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);
    }
}
