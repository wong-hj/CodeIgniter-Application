<?php

namespace App\Controllers\Admin;

use App\Entities\User;

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

    public function new()
    {

        $user = new User;

        return view("Admin/Users/new.php", [
            'user' => $user
        ]);
    }

    public function create()
    {
        
        $user = new User($this->request->getPost());


        // $task->user_id = $this->current_user->id;

        if($this->model -> protect(false)-> insert($user)) {

            return redirect()->to("/admin/users/show/{$this->model->insertID}")
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
        
        $user = $this->getUserOr404($id);

        return view("Admin/Users/edit.php", [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        
        $user = $this->getUserOr404($id);

        $post = $this->request->getPost();


        if(empty($post['password'])) {

            $this->model->disablePasswordValidation();

            unset($post['password']);
            unset($post['password_confirmation']);

        }

        $user->fill($post);
        
        if (! $user->hasChanged()) {

            return redirect()->back()
                             ->with('warning', 'Nothing to Update')
                             ->withInput();

        }
        if ($this->model-> protect(false) ->save($user)) {

            return redirect()->to("/admin/users/show/$id")
                             ->with('info', 'User Records Updated Successfully');
        } else {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid Data')
                             ->withInput();
        }
        
    }

    public function delete($id)
    {
        $user = $this->getUserOr404($id);

        if($this->request->getMethod() === 'post') {
            $this->model->delete($id);

            return redirect()->to("/admin/users")
                             ->with('delete', 'User Deleted Successfully');
        }

        return view('Admin/Users/delete', [
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