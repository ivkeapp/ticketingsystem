<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginActivity extends Model{

    protected $table = 'auth_logins';
    protected $allowedFields = ['ip_address', 'email', 'user_id', 'date', 'success'];
    protected $returnType = 'object';

    public function getLogin($id){
        return $this->builder()->select('ip_address, email, user_id, date', false)
        ->where('user_id = ' . $id)
        ->orderBy('date desc')
        ->limit('1')
        ->get()->getResult();
    }

}

?>