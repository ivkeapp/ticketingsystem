<?php

namespace App\Models;

use CodeIgniter\Model;

class Service extends Model{

    protected $table = 'authorized_services_brands';
    protected $allowedFields = ['id', 'name', 'date_added'];
    protected $returnType = 'object';

    public function findServiceBrand(){
        return $this->builder()->select('brands.name as brand, authorized_services.name as service', false)
        ->join('brands', 'authorized_services_brands.brand = brands.id')
        ->join('authorized_services','authorized_services_brands.service = authorized_services.id')
        ->get()->getResult();
    }

}

?>