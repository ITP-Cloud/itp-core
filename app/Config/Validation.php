<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    //--------------------------------------------------------------------
    // Rules For Registration
    //--------------------------------------------------------------------
    public $registration = [
        'firstname' => [
            'label' =>  'First Name',
            'rules' => 'required',
        ],
        'lastname' => [
            'label' =>  'Last Name',
            'rules' => 'required',
        ],
        'phone' => [
            'label' =>  'Phone',
            'rules' => 'required|numeric|min_length[10]|max_length[14]|is_unique[users.phone]',
        ],
        'email' => [
            'label' => 'Auth.email',
            'rules' => [
                'required',
                'max_length[254]',
                'valid_email',
                'is_unique[auth_identities.secret]',
            ],
        ],
        'password' => [
            'label' => 'Auth.password',
            'rules' => 'required|strong_password',
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];

    // 'student_id' => [
    //     'label' =>  'Student ID',
    //     'rules' => 'required|numeric|min_length[5]|max_length[20]|is_unique[users.student_id]',
    // ],
    // 'institution' => [
    //     'label' =>  'Institution',
    //     'rules' => 'required|trim',
    // ],
    // 'country' => [
    //     'label' =>  'Country',
    //     'rules' => 'required',
    // ],
}
