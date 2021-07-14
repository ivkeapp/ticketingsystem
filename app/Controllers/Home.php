<?php

namespace App\Controllers;

use App\Models\Tiketi;

class Home extends BaseController
{
	public function index()
	{
		$model = new Tiketi();
		$data['tickets'] = $model->getAllTickets();
		return view('home', $data);
	}
}
