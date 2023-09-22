<?php

namespace App\Controllers\DevConsole;

use App\Controllers\BaseController;

class DevConsoleController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index()
    {
        $this->data['page'] = 'home';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('dev_console/header', $this->data) .
            view('dev_console/index') .
            view('dev_console/footer');
    }
}
