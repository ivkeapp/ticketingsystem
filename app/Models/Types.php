<?php

namespace App\Models;

use CodeIgniter\Model;

class Types extends Model {
    protected $table = 'types';
    protected $allowedFields = 'name';
    protected $returnType = 'object';
}

?>