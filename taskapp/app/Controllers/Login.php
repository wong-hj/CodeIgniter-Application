<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function new()
    {
        return view("Login/new");
    }

    public function create()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $auth = service('auth');

        if($auth->login($email, $password)) {

            $redirect_url = session('redirect_url') ?? '/'; //if there is no requested url then it will return null (??) which will go to homepage (/).

            unset($_SESSION['redirect_url']);

            return redirect()->to($redirect_url)
                                 ->with('info', 'User Successfully Login.');

        } else {
            return redirect()->back()
                             ->withInput()
                             ->with('warning', 'Invalid Login');
        }

    }

    public function delete()
    {
        
        service('auth')->logout();

        return redirect()->to("/login/showLogoutMessage");
    }

    public function showLogoutMessage()
    {
        return redirect()->to("/")
                         ->with("info", "Log out Successfully.");
    }



}