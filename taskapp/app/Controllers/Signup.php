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
        // $user = new Signup($this->request->getPost());
            
        if($model -> insert($user)) {

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
}