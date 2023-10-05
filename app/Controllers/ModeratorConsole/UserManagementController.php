<?php

namespace App\Controllers\ModeratorConsole;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserManagementController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getUsers()
    {
        $this->data['page'] = 'users';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['users'] = (new UserModel())->findAll();

        return view('moderator_console/header', $this->data) .
            view('moderator_console/user_management/users') .
            view('moderator_console/footer');
    }

    public function getUser(int $user_id = 0)
    {
        $this->data['page'] = 'users';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['user'] = (new UserModel())->find($user_id);

        return view('moderator_console/header', $this->data) .
            view('moderator_console/user_management/user') .
            view('moderator_console/footer');
    }

    public function getKycApprovals()
    {
        $this->data['page'] = 'kyc';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['users'] = (new UserModel())->where('account_status', 'under_review')->findAll();

        return view('moderator_console/header', $this->data) .
            view('moderator_console/user_management/kyc_approvals') .
            view('moderator_console/footer');
    }

    public function getKycUserDetails(int $user_id = 0)
    {
        $this->data['page'] = 'kyc';
        $this->data['title'] = 'Moderator Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['user'] = (new UserModel())->where('account_status', 'under_review')->find($user_id);

        return view('moderator_console/header', $this->data) .
            view('moderator_console/user_management/kyc_candidate') .
            view('moderator_console/footer');
    }

    public function approveUser(int $user_id = 0)
    {
        //
    }

    public function rejectUser(int $user_id = 0)
    {
        //
    }
}
