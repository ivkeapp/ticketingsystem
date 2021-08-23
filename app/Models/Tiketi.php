<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiketi extends Model{

    protected $table = 'tickets';
    protected $allowedFields = ['title', 'type', 'model', 'brand', 'serial_number', 'description', 'staff_owner', 'is_resolved'];
    protected $returnType = 'object';
    
    public function solved($id){
        return $this->builder()->set('is_resolved', '1')
        ->where('id = ' . $id)
        ->update();
    }

    public function getAllTickets(){
        return $this->builder()->select('tickets.id, tickets.title, tickets.date_added, types.name as type,
        tickets.model, brands.name as brand, tickets.serial_number, tickets.description, users.username as staff_owner, users.id as staff_id, 
        tickets.is_resolved', false)
        ->join('types', 'tickets.type = types.id')
        ->join('users','tickets.staff_owner = users.id')
        ->join('brands', 'tickets.brand = brands.id')
        ->orderBy('tickets.date_added desc')
        ->get()->getResult();
    }

    public function getResolvedTickets(){
        return $this->builder()->select('tickets.id, tickets.title, tickets.date_added, types.name as type,
        tickets.model, brands.name as brand, tickets.serial_number, tickets.description, users.username as staff_owner, users.id as staff_id, 
        tickets.is_resolved', false)
        ->join('types', 'tickets.type = types.id')
        ->join('users','tickets.staff_owner = users.id')
        ->join('brands', 'tickets.brand = brands.id')
        ->where('tickets.is_resolved = 1')
        ->orderBy('tickets.id asc')
        ->get()->getResult();
    }

    public function getUnResolvedTickets(){
        return $this->builder()->select('tickets.id, tickets.title, tickets.date_added, types.name as type,
        tickets.model, brands.name as brand, tickets.serial_number, tickets.description, users.username as staff_owner, users.id as staff_id, 
        tickets.is_resolved', false)
        ->join('types', 'tickets.type = types.id')
        ->join('users','tickets.staff_owner = users.id')
        ->join('brands', 'tickets.brand = brands.id')
        ->where('tickets.is_resolved = 0')
        ->orderBy('tickets.id asc')
        ->get()->getResult();
    }

    public function getTicketsByStaffOwner($staffOwner){
        return $this->builder()->selectCount('id')
        ->where('staff_owner = ' . $staffOwner)
        ->where('date_added >= DATE(NOW()) - INTERVAL 30 DAY')
        ->get()->getResult();
    }

    public function getTicketCountToday($staffOwner){
        return $this->builder()->selectCount('id')
        ->where('staff_owner = ' . $staffOwner)
        ->where('date_added >= DATE(NOW()) - INTERVAL 1 DAY')
        ->get()->getResult();
    }

    public function getAllTicketsByStaffOwner($staffOwner){
        return $this->builder()->select('tickets.id, tickets.title, tickets.date_added, types.name as type,
        tickets.model, brands.name as brand, tickets.serial_number, tickets.description, users.username as staff_owner, users.id as staff_id, 
        tickets.is_resolved', false)
        ->join('types', 'tickets.type = types.id')
        ->join('users','tickets.staff_owner = users.id')
        ->join('brands', 'tickets.brand = brands.id')
        ->orderBy('tickets.date_added desc')
        ->where('staff_owner = ' . $staffOwner)
        ->get()->getResult();
    }
}

?>