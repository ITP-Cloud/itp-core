<?php

namespace App\Controllers\DevConsole;

use App\Controllers\BaseController;
use App\Models\ManagedDatabaseModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

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

        return view('dev_console/header', $this->data) .
            view('dev_console/databases/index') .
            view('dev_console/footer');
    }

    public function newDatabase()
    {
        if ($this->request->is('post')) {

            // Step 1: Check if database name is taken

            $databaseName = (string) $this->request->getPost('database_name');
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
