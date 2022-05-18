<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
    private $models;

    private $current_user;

    public function __construct() {
        $this->model = new \App\Models\TaskModel;
        $this->current_user = service('auth') -> getCurrentUser();
    }
    public function index()
    {
        // $data = [
        //     ["id" => 1, "description" => "First Task"],
        //     ["id" => 2, "description" => "Second Task"]
        // ]; 
        
        $data = $this->model->paginateTasksByUserID($this->current_user->id);
        
        // dd($data);
        
        return view("Tasks/index.php", [
            "tasks" => $data,
            "pager" => $this->model->pager
        ]);
    }

    public function show($id) 
    {
        
        $task = $this->getTaskOr404($id);

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


        $task->user_id = $this->current_user->id;

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
        
        $task = $this->getTaskOr404($id);

        return view("Tasks/edit.php", [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        
        $task = $this->getTaskOr404($id);

        $post = $this->request->getPost();
        unset($post['user_id']);


        $task->fill($post);
        
        if (! $task->hasChanged()) {

            return redirect()->back()
                             ->with('warning', 'Nothing to Update')
                             ->withInput();

        }
        if ($this->model->save($task)) {

            return redirect()->to("/tasks/show/$id")
                             ->with('info', 'Task Updated Successfully');
        } else {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid Data')
                             ->withInput();
        }
        
    }

    public function delete($id)
    {
        $task = $this->getTaskOr404($id);

        if($this->request->getMethod() === 'post') {
            $this->model->delete($id);

            return redirect()->to("/tasks")
                             ->with('delete', 'Task Deleted Successfully');
        }

        return view('Tasks/delete', [
            'task' => $task
        ]);
    }

    private function getTaskOr404($id)
    {
        
        // $task = $this->model->find($id);

        //$task->user_id is the user id as the foreign in task table
        //$user->id shows the current logged in user
        //if both of them arent same, means that the tasks may belong to other user.

        // if($task !== null && ($task->user_id !== $user->id)) {

        //     $task = null;

        // }
        
        //two ways of doing, second one with model
        $task = $this->model->getTaskByUserID($id, $this->current_user->id);

        if ($task === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
        }

        return $task;
    }
}