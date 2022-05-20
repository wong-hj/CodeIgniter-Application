<?php 

namespace App\Models;

// Model for user 

class UserModel extends \CodeIgniter\Model
{
    protected $table = 'user';
    protected $allowedFields = ['name', 'email', 'password'];

    protected $returnType = 'App\Entities\User';
    
    protected $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required|matches[password]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => "The Email is taken."
        ],
        'password_confirmation' => [
            'required' => 'Please Re-Enter the password to confirm.',
            'matches' => 'Please enter the same password.'
        ]

    ];

    protected $useTimestamps = true;


    // beforeInsert is used to call function before the data is inserted into the database
    protected $beforeInsert = ['hashPassword'];


    // hashPassword function is to hash password entered by user to make the site and db more secure.
    protected function hashPassword(array $data){
        // check if password is entered in registration page, if it is then run following code
        if (isset($data['data']['password'])) {

            // set value to insert in column password_hash with the password_hash() function in Ci4
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            //unset the originial written password
            unset($data['data']['password']);

        }
        
        //return the $data with the password hashed. 
        return $data;
    }
    
    public function findByEmail($email) 
    {
        return $this->where('email', $email)
                    ->first();
    }
}

?>