<?php

namespace App\Controllers;

use App\Models\ManagedWebsiteModel;
use CodeIgniter\Shield\Entities\User;

class Home extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index()
    {

        if (auth()->loggedIn()) {
            if (auth()->user()->inGroup('superadmin')) {
                return redirect()->to('moderator-console');
            } else {
                return redirect()->to('console');
            }
        }

        $this->data['page'] = 'home';
        $this->data['title'] = 'ITP Cloud | Official Homepage';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('templates/header', $this->data) .
            view('index') .
            view('templates/footer');
    }

    public function getWebsites(): string
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Websites | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['websites'] = (new ManagedWebsiteModel())->getAllWebsites();

        return view('templates/header', $this->data) .
            view('websites') .
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
