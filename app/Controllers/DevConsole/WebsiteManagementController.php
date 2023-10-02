<?php

namespace App\Controllers\DevConsole;

use App\Controllers\BaseController;

class WebsiteManagementController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getWebsites()
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('dev_console/header', $this->data) .
            view('dev_console/websites/index') .
            view('dev_console/footer');
    }

    public function getWebsite()
    {
        //
    }

    public function newWebsite()
    {
        //
    }

    public function newWebsiteAJAX()
    {
        //
    }

    public function editWebsite()
    {
        //
    }

    public function editWebsiteAJAX()
    {
        //
    }

    public function deleteWebsite()
    {
        //
    }

    public function deleteWebsiteAJAX()
    {
        //
    }
}
