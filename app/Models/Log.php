<?php

namespace App\Models;

use CodeIgniter\Model;

class Log extends Model{

    protected $table = 'log';
    protected $allowedFields = ['date_added', 'action', 'user'];
    protected $returnType = 'object';

    public function getLogs($id){
        return $this->builder()->select('id, date_added, action, user', false)
        ->where('user = ' . $id)
        ->orderBy('date_added desc') 
        ->get()->getResult();
    }

    public function getResolvedCountFor30Days($id, $department){
        return $this->builder()->select('users.username as username, count(log.id) as count', false)
        ->join('users', 'log.user = users.id')
        ->where('log.user = '.$id.' and log.action like "Marked%" and users.department = ' . $department)
        ->where('date_added >= DATE(NOW()) - INTERVAL 30 DAY')
        ->get()->getResult();
    }

    public function getResolvedCountToday($id, $department){
        return $this->builder()->select('users.username as username, count(log.id) as count', false)
        ->join('users', 'log.user = users.id')
        ->where('log.user = '.$id.' and log.action like "Marked%" and users.department = ' . $department)
        ->where('date_added >= DATE(NOW()) - INTERVAL 1 DAY')
        ->get()->getResult();
    }

}

?>