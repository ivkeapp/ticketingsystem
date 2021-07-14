<?php

namespace App\Controllers;

use App\Models\Tiketi;
use App\Models\User;

class ITServis extends BaseController
{
	public function index()
	{

		$userModel = new User();
		$ticketsModel = new Tiketi();

		$data['usersAll'] = $userModel->getUsersByDepartment('3');
		$data['usersIds'] = $userModel->getUsersIDByDepartment('3');
		$data['tickets'] = array();
		foreach($data['usersIds'] as $id){
			array_push($data['tickets'], $ticketsModel->getTicketsByStaffOwner($id->id));
		}
		return view('itservis', $data);
	}
}
