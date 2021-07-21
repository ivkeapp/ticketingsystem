<?php

namespace App\Controllers;

use App\Models\Brands;
use App\Models\Service;

class Services extends BaseController
{
	public function index()
	{

        $services = new Service();
        $data['services'] = $services->findServiceBrand();
        $data['headline'] = 'Pretraga servisa';

		return view('auth_services', $data);
	}
}