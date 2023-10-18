<?php

namespace App\Controllers\ModeratorConsole;

use App\Controllers\BaseController;
use App\Models\ManagedDatabaseModel;
use App\Models\ManagedWebsiteModel;

class ModeratorDashboardController extends BaseController
{
    private array $data;
    private ManagedWebsiteModel $websiteModel;
    private ManagedDatabaseModel $databaseModel;

    public function __construct()
    {
        $this->data = [];
        $this->websiteModel = new ManagedWebsiteModel();
        $this->databaseModel = new ManagedDatabaseModel();
    }

    public function index()
    {
        $this->data['page'] = 'moderator_console';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('moderator_console/header', $this->data) .
            view('moderator_console/index') .
            view('moderator_console/footer');
    }

    public function getWebsites()
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['websites'] = $this->websiteModel->getAllWebsites();

        return view('moderator_console/header', $this->data) .
            view('moderator_console/websites') .
            view('moderator_console/footer');
    }


    public function getDatabases()
    {
        $this->data['page'] = 'databases';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['databases'] = $this->databaseModel->getAllDatabases();

        return view('moderator_console/header', $this->data) .
            view('moderator_console/databases') .
            view('moderator_console/footer');
    }
}
