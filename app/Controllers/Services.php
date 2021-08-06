<?php

namespace App\Controllers;

use App\Models\Brands;
use App\Models\Log;
use App\Models\Service;
use App\Models\ServiceModel;

class Services extends BaseController
{
	public function index()
	{

        $services = new Service();
        $data['services'] = $services->findServiceBrand();
        $data['headline'] = 'Pretraga servisa';

		return view('service/auth_services', $data);
	}

	public function add()
	{
		return view('service/add');
	}


	public function attemptSaveNew()
    {
        if($this->validate([
            'name' => [
                'label'  => 'ime servisa',
                'rules'  => 'required|alpha_space|min_length[2]|max_length[20]',
                'errors' => [
                    'required'   => 'Morate uneti {field}.',
                    'alpha_space'  => '{field} ne može imate date karaktere.',
                    'min_length' => '{field} ne može imati manje od 3 karaktera.',
                    'max_length' => '{field} ne može imati više od 20 karaktera.'
				],
            ]
        ])){
            $model = new ServiceModel();

            $service = [
                'name'     => $this->request->getPost('name'),
            ];
            
            $added = $model->insert($service);
			$newServiceId = $model->getInsertID();
            
            if($added){
                $logModel = new Log();

                $log = [
                    'action' => 'Added new authorized service: ' . $this->request->getPost('name') . ' (ID: ' . $newServiceId . ')',
                    'user' => user_id()
                ];
                $logModel->insert($log);
            }
            return redirect()->back()->with('message', 'Uspešno dodat servis.');

        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

}