<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function new()
    {
        return view("Signup/new");
    }

    public function create()
    {
        $user = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel;

        $user->startActivation();
        // $user = new Signup($this->request->getPost());
            
        if($model -> insert($user)) {

            $this->sendActivationEmail($user);
            return redirect()->to("/signup/success");
                             
            
        } else {

            // dd($model->errors());
            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', 'Invalid Data')
                             ->withInput();
        }
    }

    public function success()
    {
        return view("Signup/success");
    }

    public function sendActivationEmail($user) 
    {
        $email = service('email');

        $email->setTo($user->email);

        $email->setSubject('Account Activation');

        $message = view('Signup/activation_email.php', [
            "token" => $user->token
        ]);

        $email->setMessage($message);
        
        $email->send();

        
    }

    public function activate($token)
    {
        $model = new \App\Models\UserModel;

        $model->activateByToken($token);

        return view('Signup/activated');
    }
}