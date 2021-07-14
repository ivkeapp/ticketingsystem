<?php

namespace App\Models;

use CodeIgniter\Model;

class Log extends Model{

    protected $table = 'log';
    protected $allowedFields = ['action', 'user'];
    protected $returnType = 'object';

    public function getLogs($id){
        return $this->builder()->select('id, date_added, action, user', false)
        ->where('user = ' . $id)
        ->orderBy('date_added desc') 
        ->get()->getResult();
    }

}

?>