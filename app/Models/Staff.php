<?php

namespace App\Models;

use CodeIgniter\Model;

class Staff extends Model{

    protected $table = 'staff';
    protected $allowedFields = ['name', 'department', 'user_id'];
    

}

?>