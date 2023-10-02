<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KycController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function showKyc()
    {
        $this->data['page'] = 'kyc';
        $this->data['title'] = 'KYC | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('auth/kyc/show');
    }

    public function submitKycInfo()
    {
    }

    public function showAwaitingKycVerification()
    {
        $this->data['page'] = 'kyc';
        $this->data['title'] = 'Awaiting Verification | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('auth/kyc/await');
    }
}
