<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model{

    protected $table = 'users';
    protected $allowedFields = ['id', 'email', 'username', 'firstname', 'lastname', 'password_hash', 'department', 'active'];
    protected $returnType = 'object';

    public function getUsers(){
        return $this->builder()->select('users.id, users.email, users.username, users.firstname,
        users.lastname, auth_groups.name as department, users.active', false)
        ->join('auth_groups', 'users.department = auth_groups.id')
        ->orderBy('users.id asc')
        ->get()->getResult();
    }
 
    public function getUsersByDepartment($department){
        return $this->builder()->select('users.id, users.email, users.username, users.firstname,
        users.lastname, auth_groups.name as department, users.active', false)
        ->join('auth_groups', 'users.department = auth_groups.id')
        ->where('auth_groups.id = '.$department)
        ->orderBy('users.id asc')
        ->get()->getResult();
    }

    public function getUsersIDByDepartment($department){
        return $this->builder()->select('id', false)
        ->where('department = '.$department)
        ->orderBy('id asc')
        ->get()->getResult();
    }

}

?>