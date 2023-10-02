<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class KycController extends BaseController
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function showKyc()
    {
        $this->data['page'] = 'kyc';
        $this->data['title'] = 'KYC | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';
        $this->data['countries'] = $this->getCounties();

        return view('auth/kyc/show', $this->data);
    }

    public function submitKycInfo()
    {
        // Validate Portrait
        $input_portrait = $this->validate([
            'portrait' => [
                'uploaded[portrait]',
                'mime_in[portrait,image/jpg,image/jpeg,image/png]',
                'max_size[portrait,2024]',
            ]
        ]);

        if (!$input_portrait) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate Student ID Doc
        $input_student_id_doc = $this->validate([
            'student_id_doc' => [
                'uploaded[student_id_doc]',
                'mime_in[student_id_doc,image/jpg,image/jpeg,image/png]',
                'max_size[student_id_doc,2024]',
            ]
        ]);

        if (!$input_student_id_doc) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload Portrait
        $portrait_name = '';
        if ($this->request->getFile('portrait')->getPath() != '') {

            if (auth()->user()->avatar != '') {
                unlink('../public/assets/uploads/' . auth()->user()->avatar);
            }

            $portrait = $this->request->getFile('portrait');
            $portrait_name = $portrait->getRandomName();
            $portrait->move('../public/assets/uploads/', $portrait_name);
        }

        // Upload Student ID Doc
        $student_id_doc_name = '';

        if ($this->request->getFile('student_id_doc')->getPath() != '') {

            if (auth()->user()->student_id_doc != '') {
                unlink('../public/assets/uploads/' . auth()->user()->student_id_doc);
            }

            $student_id_doc = $this->request->getFile('student_id_doc');
            $student_id_doc_name = $student_id_doc->getRandomName();
            $student_id_doc->move('../public/assets/uploads/', $student_id_doc_name);
        }

        $user = auth()->user();

        $user->student_id = $this->request->getPost('student_id');
        $user->student_id_document = $student_id_doc_name;
        $user->institution = $this->request->getPost('institution');
        $user->country = $this->request->getPost('country');
        $user->avatar = $portrait_name;
        $user->account_status = 'under review';

        $users = auth()->getProvider();
        $users->save($user);

        return redirect()->to('/kyc/await');
    }

    public function showAwaitingKycVerification()
    {
        $this->data['page'] = 'kyc';
        $this->data['title'] = 'Awaiting Verification | ITP Cloud';
        $this->data['description'] = 'an open source miniature cloud platform for students by students 😏';

        return view('auth/kyc/await', $this->data);
    }


    function getCounties()
    {
        return [
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cabo Verde",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombia",
            "Comoros",
            "Congo (Congo-Brazzaville)",
            "Costa Rica",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czechia (Czech Republic)",
            "Democratic Republic of the Congo (Congo-Kinshasa)",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Eswatini",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Holy See",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Ivory Coast",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Morocco",
            "Mozambique",
            "Myanmar (formerly Burma)",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "North Korea",
            "North Macedonia (formerly Macedonia)",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestine State",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Korea",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Sweden",
            "Switzerland",
            "Syria",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States of America",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe"
        ];
    }
}
