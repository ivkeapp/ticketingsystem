<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model{

    protected $table = 'authorized_services';
    protected $allowedFields = ['id', 'name', 'date_added'];
    protected $returnType = 'object';

}

?>