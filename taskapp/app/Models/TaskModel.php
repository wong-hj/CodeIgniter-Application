<!-- TaskModel controls the db of task and perform tasks like setting allowed editing fields
validation rules, validation messages and some other functions that related to the db.-->

<?php 

namespace App\Models;

class TaskModel extends \CodeIgniter\Model
{
    protected $table = 'task';
    protected $allowedFields = ['description', 'user_id'];

    protected $returnType = 'App\Entities\Task';
    
    // set validation rules for description input to be required.
    protected $validationRules = [
        'description' => 'required'
    ];

    // set custom error message.
    protected $validationMessages = [
        'description' => [
            'required' => "Please Fill in the blank."
        ]
    ];

    // paginate the tasks shown.
    // show all relevant records with the criteria where user_id is same as the current session user id
    // set the pagination limit to 5, so only maximum of 5 records shown in a page.
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