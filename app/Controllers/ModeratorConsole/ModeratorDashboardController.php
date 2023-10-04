<?php

namespace App\Controllers\ModeratorConsole;

use App\Controllers\BaseController;

class ModeratorDashboardController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
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

        return view('moderator_console/header', $this->data) .
            view('moderator_console/websites') .
            view('moderator_console/footer');
    }

    public function getWebsite(int $website_id = 0)
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('moderator_console/header', $this->data) .
            view('moderator_console/website') .
            view('moderator_console/footer');
    }

    public function getDatabases()
    {
        $this->data['page'] = 'databases';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('moderator_console/header', $this->data) .
            view('moderator_console/databases') .
            view('moderator_console/footer');
    }

    public function getDatabase(int $database_id = 0)
    {
        $this->data['page'] = 'databases';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('moderator_console/header', $this->data) .
            view('moderator_console/database') .
            view('moderator_console/footer');
    }
}
