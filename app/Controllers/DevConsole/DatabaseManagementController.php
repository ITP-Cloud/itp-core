<?php

namespace App\Controllers\DevConsole;

use App\Controllers\BaseController;
use App\Libraries\ITPEngineProxy;
use App\Models\ManagedDatabaseModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use ReallySimpleJWT\Token;

class DatabaseManagementController extends BaseController
{
    private array $data;
    private ManagedDatabaseModel $databaseModel;

    public function __construct()
    {
        $this->data = [];
        $this->databaseModel = new ManagedDatabaseModel();
    }

    public function getDatabases()
    {
        $this->data['page'] = 'databases';
        $this->data['title'] = 'Developer Console | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['databases'] = $this->databaseModel->getAllDatabasesFor(auth()->user()->id);
        $this->data['userPayload'] = Token::getPayload(auth()->user()->username);

        return view('dev_console/header', $this->data) .
            view('dev_console/databases/index') .
            view('dev_console/footer');
    }

    public function newDatabase()
    {
        $userPayload = Token::getPayload(auth()->user()->username);

        if ($this->request->is('post')) {
            // Step 0: Validate input
            $validation = \Config\Services::validation();
            $validation->setRule('database_name', 'Database name', 'required|max_length[30]|min_length[3]|alpha');

            if ($validation->withRequest($this->request)->run() == false) {
                return Services::response()
                    ->setJSON(
                        [
                            'success' => false,
                            'message' => 'Message: The provided Database Name is invalid 😬. Make sure that the name is between 3 and 30 characters, and has letters only.<br> Timestamp: ' . date('H:i') . ' hrs.'
                        ]
                    )
                    ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
            }

            // Step 1: Check if database name is taken

            $databaseName = (string) $this->request->getPost('database_name');
            $databaseName = strtolower($databaseName);
            $databaseName = $userPayload['dbUsername'] . '_' . $databaseName;
            $isTaken = $this->databaseModel->isNameTaken($databaseName);

            if ($isTaken) {
                return Services::response()
                    ->setJSON(
                        [
                            'success' => false,
                            'message' => 'Message: The provided Database Name is taken 😬. Please pick a different one.<br> Timestamp: ' . date('H:i') . ' hrs.'
                        ]
                    )
                    ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
            }

            // Step 2: Index database

            $this->databaseModel->insert([
                'developer_id' => auth()->user()->id,
                'md_db_name'   => $databaseName
            ]);

            // Step 3: Create database on Engine
            ITPEngineProxy::createDatabase([
                'databaseName' => $databaseName,
            ]);

            // Final Step
            return Services::response()
                ->setJSON(
                    [
                        'success' => true,
                        'message' => 'Message: Congratulation 🥳🥳, your database has been provisioned.<br> Timestamp: ' . date('H:i') . ' hrs.'
                    ]
                )
                ->setStatusCode(ResponseInterface::HTTP_ACCEPTED);
        }
    }

    public function synchronizeDatabases()
    {
        $db = \Config\Database::connect();
        $userPayload = Token::getPayload(auth()->user()->username);
        $databases = $db->query('SHOW DATABASES')->getResultArray();

        foreach ($databases as $database) {
            // filter by databases having the prefix of the user's username
            if (strpos($database['Database'], $userPayload['dbUsername']) !== false) {
                // check if the database is already indexed
                $isIndexed = $this->databaseModel->isNameTaken($database['Database']);
                if (!$isIndexed) {
                    $this->databaseModel->insert([
                        'developer_id' => auth()->user()->id,
                        'md_db_name'   => $database['Database']
                    ]);
                }
            }
        }

        return redirect()->to('console/databases');
    }

    public function deleteDatabase()
    {
        //
    }

    public function deleteDatabaseAJAX()
    {
        //
    }
}
