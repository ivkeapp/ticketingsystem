<?php

namespace App\Controllers;

use App\Models\Log;
use App\Models\Tiketi;
use App\Models\User;

class Logistika extends BaseController
{
	public function index()
	{
		$userModel = new User();
		$ticketCount = new Log();
		
		$data['usersIds'] = $userModel->getUsersIDByDepartment('2');
		$data['tCounters'] = array();
		$data['tCountersToday'] = array();

		foreach($data['usersIds'] as $id){
			array_push($data['tCounters'], $ticketCount->getResolvedCountFor30Days($id->id, 2));
			array_push($data['tCountersToday'], $ticketCount->getResolvedCountToday($id->id, 2));
		}
		
		return view('logistika', $data);
	}
}
