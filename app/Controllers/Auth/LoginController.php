<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLoginController;

class LoginController extends ShieldLoginController
{

    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        helper('form');

        return view('auth/login');
    }
}
