<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        // $data = [
        //     ["id" => 1, "description" => "First Task"],
        //     ["id" => 2, "description" => "Second Task"]
        // ]; 

        $model = new \App\Models\TaskModel;
        $data = $model->findAll();
        
        // dd($data);
        
        return view("Tasks/index.php", ["tasks" => $data]);
    }

    public function show($id) 
    {
        $model = new \App\Models\TaskModel;
        $task = $model->find($id);

        return view("Tasks/show.php", [
            'task' => $task
        ]);
    }
}