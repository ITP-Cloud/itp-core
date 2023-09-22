<?php

namespace App\Controllers;

use CodeIgniter\Shield\Entities\User;

class Home extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index(): string
    {
        $this->data['page'] = 'home';
        $this->data['title'] = 'ITP Cloud | Official Homepage';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('templates/header', $this->data) .
            view('index') .
            view('templates/footer');
    }

    public function about(): string
    {
        $this->data['page'] = 'home';
        $this->data['title'] = 'About | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('templates/header', $this->data) .
            view('index') .
            view('templates/footer');
    }
}
