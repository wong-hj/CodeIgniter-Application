<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
    private $models;

    public function __construct() {
        $this->model = new \App\Models\TaskModel;
    }
    public function index()
    {
        // $data = [
        //     ["id" => 1, "description" => "First Task"],
        //     ["id" => 2, "description" => "Second Task"]
        // ]; 

        $data = $this->model->findAll();
        
        // dd($data);
        
        return view("Tasks/index.php", ["tasks" => $data]);
    }

    public function show($id) 
    {
        
        $task = $this->model->find($id);

        return view("Tasks/show.php", [
            'task' => $task
        ]);
    }

    public function new()
    {

        $task = new Task;

        return view("Tasks/new.php", [
            'task' => $task
        ]);
    }

    public function create()
    {
        
        $task = new Task($this->request->getPost());

        if($this->model -> insert($task)) {

            return redirect()->to("/tasks/show/{$this->model->insertID}")
                             ->with('info', 'Task Created Successfully');

        } else {

            // dd($model->errors());
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid Data')
                             ->withInput();
        }
        
    }

    public function edit($id)
    {
        
        $task = $this->model->find($id);

        return view("Tasks/edit.php", [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        
        $task = $this->model->find($id);

        $task->fill($this->request->getPost());
        
        if (! $task->hasChanged()) {

            return redirect()->back()
                             ->with('warning', 'Nothing to Update')
                             ->withInput();

        }
        if ($this->$model->save($task)) {

            return redirect()->to("/tasks/show/$id")
                             ->with('info', 'Task Updated Successfully');
        } else {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid Data')
                             ->withInput();
        }
        
    }
}