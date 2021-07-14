<?php

namespace App\Controllers;

use App\Models\Log;
use App\Models\LoginActivity;

class Activity extends BaseController
{

    protected $model;

	public function __construct()
	{
		$this->model = new Log();
	}


    public function index()
	{
		$loginActivityModel = new LoginActivity();
        $data['logs'] = $this->model->getLogs(user_id());
		$data['login'] = $loginActivityModel->getLogin(user_id());
		return view('log', $data);
	}
}