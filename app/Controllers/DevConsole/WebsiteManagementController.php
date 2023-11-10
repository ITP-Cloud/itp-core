<?php

namespace App\Controllers\DevConsole;

use App\Controllers\BaseController;
use App\Libraries\ITPEngineProxy;
use App\Models\ManagedWebsiteModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use ReallySimpleJWT\Token;

class WebsiteManagementController extends BaseController
{
    private $data;
    private ManagedWebsiteModel $managedWebsiteModel;

    public function __construct()
    {
        $this->data = [];
        $this->managedWebsiteModel = new ManagedWebsiteModel();
    }

    public function getWebsites()
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['websites'] = $this->managedWebsiteModel->where('developer_id', auth()->user()->id)->findAll();

        return view('dev_console/header', $this->data) .
            view('dev_console/websites/index') .
            view('dev_console/footer');
    }

    public function newWebsite()
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('dev_console/header', $this->data) .
            view('dev_console/websites/new_website') .
            view('dev_console/footer');
    }

    public function newWebsiteAJAX()
    {
        if ($this->request->getPost()) {

            // Step 1: Check if website name is taken

            $websiteName = (string) $this->request->getPost('website_name');
            $isTaken = $this->managedWebsiteModel->isNameTaken($websiteName);

            if ($isTaken) {
                return Services::response()
                    ->setJSON(
                        [
                            'success' => false,
                            'message' => 'Message: The provided Website Name is taken 😬. Please pick a different one.<br> Timestamp: ' . date('H:i') . ' hrs.'
                        ]
                    )
                    ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
            }

            // Step 2: Check if uploaded logo is valid

            $input_logo = $this->validate([
                'logo' => [
                    'uploaded[logo]',
                    'mime_in[logo,image/jpg,image/jpeg,image/png]',
                    'max_size[logo,2024]',
                ]
            ]);

            if (!$input_logo) {
                return Services::response()
                    ->setJSON(
                        [
                            'success' => false,
                            'message' => 'Message: The provided Website Logo does not meet our standards. 😬. Please pick a different one that is not more than 2MB and is a png, jpg or jpeg file.<br> Timestamp: ' . date('H:i') . ' hrs.'
                        ]
                    )
                    ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
            }

            // Step 3: Upload the logo

            $websiteLogo = '';
            if ($this->request->getFile('logo')->getPath() != '') {
                $logo = $this->request->getFile('logo');
                $websiteLogo = $logo->getRandomName();
                $logo->move('../public/assets/uploads/', $websiteLogo);
            }


            // Step 4: Save the website

            $previousSiteID = $this->managedWebsiteModel->getInsertID();
            $db = \Config\Database::connect();
            $db->transStart();

            $userPayload = Token::getPayload(auth()->user()->username);
            $websiteName = str_replace(' ', '_', strtolower($websiteName));
            $websiteName = preg_replace('/[^A-Za-z0-9\-]/', '', $websiteName);

            if (
                $this->request->getPost('website_tech_stack') == 'codeigniter4' ||
                'laravel'
            ) {
            }

            $websiteAbsolutePath = '';
            switch ($this->request->getPost('website_tech_stack')) {
                case 'codeigniter4':
                    $websiteAbsolutePath = '/home/' . $userPayload['linuxUsername'] . '/ftp/websites/md_ws_' . $websiteName . '/public';
                    break;
                case 'laravel':
                    $websiteAbsolutePath = '/home/' . $userPayload['linuxUsername'] . '/ftp/websites/md_ws_' . $websiteName . '/public';
                    break;
                default:
                    $websiteAbsolutePath = '/home/' . $userPayload['linuxUsername'] . '/ftp/websites/md_ws_' . $websiteName;
                    break;
            }

            $this->managedWebsiteModel->insert([
                'developer_id' => auth()->user()->id,
                'md_ws_name' => $websiteName,
                'md_ws_logo' => $websiteLogo,
                'md_ws_description' => $this->request->getPost('website_description'),
                'md_ws_type' => 'developer-site',
                'md_ws_tech_stack' => $this->request->getPost('website_tech_stack'),
                'md_ws_vhost_identifier' => 'md_ws_' . $websiteName,
                'md_ws_website_absolute_path' => $websiteAbsolutePath,
            ]);

            $db->transComplete();

            $this->managedWebsiteModel->save([
                'md_ws_id' => $this->managedWebsiteModel->getInsertID(),
                'md_ws_port_number' => $this->managedWebsiteModel->getInsertID() + 8004,
            ]);

            // Step 5: Create the website phyically
            $website = $this->managedWebsiteModel->find($this->managedWebsiteModel->getInsertID());
            ITPEngineProxy::createWebsite([
                'linuxUser' => $userPayload['linuxUsername'],
                'portNumber' => $website['md_ws_port_number'],
                'vhostIdentifier' => $website['md_ws_vhost_identifier'],
                'websiteAbsolutePath' => $websiteAbsolutePath,
            ]);

            // Final Step
            return Services::response()
                ->setJSON(
                    [
                        'success' => true,
                        'message' => 'Message: Congratulation 🥳🥳, your website has been provisioned. Head over to the File Management section and deploy your website.<br> Timestamp: ' . date('H:i') . ' hrs.'
                    ]
                )
                ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
        } else {
            return redirect()->back();
        }
    }

    public function editWebsite()
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('dev_console/header', $this->data) .
            view('dev_console/websites/edit_website') .
            view('dev_console/footer');
    }

    public function editWebsiteAJAX()
    {
        //
    }

    public function deleteWebsite()
    {
        $this->data['page'] = 'websites';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('dev_console/header', $this->data) .
            view('dev_console/websites/delete_website') .
            view('dev_console/footer');
    }

    public function deleteWebsiteAJAX()
    {
        //
    }
}
