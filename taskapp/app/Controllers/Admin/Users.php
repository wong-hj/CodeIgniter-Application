<?php

namespace App\Controllers\Admin;

class Users extends \App\Controllers\BaseController
{
    private $model;

    public function __construct() {
        $this->model = new \App\Models\UserModel;
        $this->current_user = service('auth') -> getCurrentUser();
    }

    public function index()
    {

        $users = $this->model->orderBy('id')
                             ->paginate(5);

        return view('Admin/Users/index', [
            'users' => $users,
            'pager' => $this->model->pager
        ]);
    }

    public function show($id)
    {
        $user = $this->getUserOr404($id);

        return view("Admin/Users/show.php", [
            'user' => $user
        ]);
    
    }

    private function getUserOr404($id)
    {
        
        // $task = $this->model->find($id);

        //$task->user_id is the user id as the foreign in task table
        //$user->id shows the current logged in user
        //if both of them arent same, means that the tasks may belong to other user.

        // if($task !== null && ($task->user_id !== $user->id)) {

        //     $task = null;

        // }

        $user = $this->model->where('id', $id)
                            ->first();
        
        //two ways of doing, second one with model
        // $task = $this->model->getTaskByUserID($id, $this->current_user->id);

        if ($user === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User with id $id not found");
        }

        return $user;
    }
}