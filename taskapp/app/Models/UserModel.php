<?php 

namespace App\Models;

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

    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data){
        if (isset($data['data']['password'])) {

            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);

        }

        return $data;
    }
    
}

?>