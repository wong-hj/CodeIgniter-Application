<?php 

namespace App\Models;

class TaskModel extends \CodeIgniter\Model
{
    protected $table = 'task';
    protected $allowedFields = ['description', 'user_id'];

    protected $returnType = 'App\Entities\Task';
    
    protected $validationRules = [
        'description' => 'required'
    ];

    protected $validationMessages = [
        'description' => [
            'required' => "Please Fill in the blank."
        ]
    ];

    public function paginateTasksByUserID($id)
    {
        return $this->where('user_id', $id)
                    ->paginate(5);
    }

    //this function filters out all the tasks with the current user signed in and the task id clicked.
    public function getTaskByUserID($id, $user_id)
    {
        return $this->where('id', $id)
                    ->where('user_id', $user_id)
                    ->first();
    }
}

?>