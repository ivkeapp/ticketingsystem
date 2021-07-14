<?php

namespace App\Controllers;

use App\Models\Tiketi;
use App\Models\User;

class Logistika extends BaseController
{
	public function index()
	{
		$userModel = new User();
		$ticketsModel = new Tiketi();

		$data['usersAll'] = $userModel->getUsersByDepartment('2');
		$data['usersIds'] = $userModel->getUsersIDByDepartment('2');
		
		$data['tickets'] = array();
		$data['ticketscount'] = array();

		foreach($data['usersIds'] as $id){
			array_push($data['tickets'], $ticketsModel->getTicketsByStaffOwner($id->id));
			array_push($data['ticketscount'], $ticketsModel->getTicketCountToday($id->id));
		}
		
		return view('logistika', $data);
	}
}
