<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentsUsers extends Model{

    protected $table = 'auth_groups_users';
    protected $allowedFields = ['group_id', 'user_id'];
    protected $returnType = 'object';



}

?>