<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login()
    {
        $data = [
            'defaultEmail'    => 'test@example.com',
            'defaultPassword' => 'motdepasse123'
        ];

        return view('login/login', $data);
    }
}
