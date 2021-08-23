<?php

namespace App\Controllers;

use App\Models\Log;
use App\Models\Tiketi;
use App\Models\User;

class ITServis extends BaseController
{
	public function index()
	{

		$userModel = new User();
		$ticketCount = new Log();
		
		$data['usersIds'] = $userModel->getUsersIDByDepartment('3');
		$data['tCounters'] = array();
		$data['tCountersToday'] = array();

		foreach($data['usersIds'] as $id){
			array_push($data['tCounters'], $ticketCount->getResolvedCountFor30Days($id->id, 3));
			array_push($data['tCountersToday'], $ticketCount->getResolvedCountToday($id->id, 3));
		}

		return view('itservis', $data);
	}
}
