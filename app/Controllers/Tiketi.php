<?php

namespace App\Controllers;

use App\Models\Brands;
use App\Models\Tiketi as ModelsTiketi;
use App\Models\Types;
use App\Models\Log;
use App\Models\User;

class Tiketi extends BaseController
{

    protected $model;
    
    
    public function __construct()
    {
        $this->model = new ModelsTiketi();
    }

	public function index()
	{
        $data['tickets'] = $this->model->getResolvedTickets();
        $data['headline'] = 'Rešeni tiketi';
		return view('tickets/tiketi', $data);
	}

    public function myTickets()
	{
        $data['tickets'] = $this->model->getAllTicketsByStaffOwner(user_id());
        $data['headline'] = 'Moji tiketi';
		return view('tickets/tiketi', $data);
	}

    public function add()
	{
        $typesModel = new Types();
        $usersModel = new User();
        $brandsModel = new Brands();
        $data['types'] = $typesModel->findAll();
        $data['users'] = $usersModel->getUsers();
        $data['brands'] = $brandsModel->findAll();
        $data['headline'] = 'Dodavanje tiketa';
		return view('tickets/add', $data);
	}

    public function delete($id)
    {
        $model = $this->model;
        $deleted = $model->delete($id);
        if($deleted){
            $logModel = new Log();
            $log = [
                'action' => 'Deleted ticket (ID: ' . $id . ').',
                'user' => user_id()
            ];
            $logModel->insert($log);
        }
        return redirect()->back();
    }

    public function solved($id)
    {
        $model = $this->model;
        $added = $model->solved($id);

        if($added){
            //$newTicketId = $model->getInsertID();
            $logModel = new Log();
            $log = [
                'action' => 'Marked ticket ID: ' . $id . ' as resolved.',
                'user' => user_id()
            ];
            //$logModel->transStart();
            $logModel->insert($log);
            //$logModel->transComplete();
        }

        return redirect()->back();
    }

    public function saveNew()
    {
        
    }

    public function UnResolved()
    {
        $data['tickets'] = $this->model->getUnResolvedTickets();
        $data['headline'] = 'Nerešeni tiketi';
		return view('tickets/tiketi', $data);
    }
    
    public function attemptSaveNew()
    {
        if($this->validate([
            'title'         => 'required',
            'model'         => 'required',
            'serial_number' => 'required',
            'description'   => 'required',
            'staff_owner'   => 'numeric'
        ])){
            $model = $this->model;
            
            $tickets = [
                'title' => $this->request->getPost('title'),
                'type' => $this->request->getPost('types'),
                'model' => $this->request->getPost('model'),
                'brand' => $this->request->getPost('brands'),
                'serial_number' => $this->request->getPost('serial_number'),
                'description' => $this->request->getPost('description'),
                'staff_owner' => $this->request->getPost('staff_owner')
            ];
            
            $added = $model->insert($tickets);
            
            if($added){
                $newTicketId = $model->getInsertID();
                $logModel = new Log();
                $log = [
                    'action' => 'Created a new ticket (ID: ' . $newTicketId . ")",
                    'user' => user_id()
                ];
                $logModel->insert($log);
            }
            return redirect()->to('tiketi/unresolved');

        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}