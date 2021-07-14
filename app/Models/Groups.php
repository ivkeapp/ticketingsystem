<?php

namespace App\Models;

use CodeIgniter\Model;

class Groups extends Model {
    protected $table = 'auth_groups';
    protected $allowedFields = 'id, name';
    protected $returnType = 'object';
}

?>