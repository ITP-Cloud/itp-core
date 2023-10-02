<?php

namespace App\Controllers\DevConsole;

use App\Controllers\BaseController;

class DatabaseManagementController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getDatabases()
    {
        $this->data['page'] = 'databases';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('dev_console/header', $this->data) .
            view('dev_console/databases/index') .
            view('dev_console/footer');
    }

    public function newDatabase()
    {
        //
    }

    public function newDatabaseAJAX()
    {
        //
    }

    public function deleteDatabase()
    {
        //
    }

    public function deleteDatabaseAJAX()
    {
        //
    }

    public function getPhpMyAdmin()
    {
        //
    }
}
