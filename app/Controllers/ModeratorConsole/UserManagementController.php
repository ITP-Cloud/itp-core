<?php

namespace App\Controllers\ModeratorConsole;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use ReallySimpleJWT\Token;

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

    public function approveUser()
    {
        if ($this->request->getPost()) {

            // Verify Moderator Password
            $credentials = [
                'email'    => auth()->user()->email,
                'password' => $this->request->getPost('password')
            ];

            $validCreds = auth()->check($credentials);

            if (!$validCreds->isOK()) {
                return Services::response()
                    ->setJSON(
                        [
                            'success' => false,
                            'message' => 'Log: The password is <span class="text-danger">Incorrect</span> 😬. Please try again.<br> Timestamp: ' . date('H:i') . ' hrs.'
                        ]
                    )
                    ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
            }

            // Approve User Registration
            $user_id           = (int) $this->request->getPost('user_id');
            $secureUserPayload = $this->generateSecureUserPayloadForUser($user_id);

            return Services::response()
                ->setJSON(
                    [
                        'success' => true,
                        'message' => 'Log: User <span class="text-success">account successfully created</span>. The corresponding system accounts have been initialized too.<br> Timestamp: ' . date('H:i') . ' hrs.',
                        'secureUserPayload' => Token::getPayload($secureUserPayload),
                    ]
                )
                ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
            die();

            $db = \Config\Database::connect();
            $db->transStart();

            $users = auth()->getProvider();
            $user = $users->findById($user_id);
            $user->fill([
                'account_status' => 'active',
                'username' => $secureUserPayload,
            ]);
            $users->save($user);

            $db->transComplete();
        } else {
            return redirect()->back();
        }
    }

    public function declineUserAndRequestResubmission()
    {
        if ($this->request->getPost()) {
            $credentials = [
                'email'    => auth()->user()->email,
                'password' => $this->request->getPost('password')
            ];

            $validCreds = auth()->check($credentials);

            if (!$validCreds->isOK()) {
                return redirect()->back()->with('error', $validCreds->reason());
            }


            // Reject User Registration
            $users = auth()->getProvider();

            $user = $users->findById($this->request->getPost('user_id'));
            $user->fill([
                'account_status' => 'pending',
                'student_id' => '',
                'student_id_document' => '',
                'institution' => '',
                'country' => '',
                'avatar' => '',
            ]);
            $users->save($user);

            unlink('../public/assets/uploads/' . auth()->user()->student_id_doc);
            unlink('../public/assets/uploads/' . auth()->user()->avatar);


            // Notify user about action
            $email = \Config\Services::email();

            $email->setFrom('itp@gulanistores.com', 'ITP Cloud Moderator');
            $email->setTo($user->email);

            $email->setSubject('KYC Failure');
            $email->setMessage(view('auth/emails/kyc_failure'));

            $email->send();
        }
    }

    private function generateSecurePassword()
    {
        $password = '';
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$^()_-=+;:,.?';

        for ($i = 0; $i < 16; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }

        return $password;
    }

    private function generateSecureUserPayloadForUser(int $user_id = 0): string
    {
        $linux_username = 'itp_user_' . $user_id;
        $linux_password = $this->generateSecurePassword();

        $ftp_username = $linux_username;
        $ftp_password = $linux_password;

        $db_username = $linux_username;
        $db_password = $this->generateSecurePassword();

        $file_browser_username = $linux_username;
        $file_browser_password = $this->generateSecurePassword();
        $file_browser_base_path = '/home/' . $linux_username . '/ftp/websites';


        $user_payload = [
            'linuxUsername' => $linux_username,
            'linuxPassword' => $linux_password,
            'ftpUsername' => $ftp_username,
            'ftpPassword' => $ftp_password,
            'dbUsername' => $db_username,
            'dbPassword' => $db_password,
            'fileBrowserUsername' => $file_browser_username,
            'fileBrowserPassword' => $file_browser_password,
            'fileBrowserPort' => '',
            'fileBrowserBasePath' => $file_browser_base_path
        ];

        $secret = env('userTokenSecret');
        $token = Token::customPayload($user_payload, $secret);

        // echo $token;
        // echo '<br>';
        // dd(Token::getPayload($token));
        return $token;
    }
}
