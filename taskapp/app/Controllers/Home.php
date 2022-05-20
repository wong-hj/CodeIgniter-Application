<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view("Home/index.php");
    }

    public function testEmail()
    {
        $email = service('email');

        $email->setTo('wonghorngjun@hotmail.com');

        $email->setSubject('A test Email');

        $email->setMessage('<h1>Hello World</h1>');

        if($email->send()) {

            echo 'Message Sent.';
        } else {
            echo $email->printDebugger();
        }
    }
}
