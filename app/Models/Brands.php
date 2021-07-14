<?php

namespace App\Models;

use CodeIgniter\Model;

class Brands extends Model {
    protected $table = 'brands';
    protected $allowedFields = 'id, name';
    protected $returnType = 'object';
}

?>