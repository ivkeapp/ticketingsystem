<?php

namespace App\Controllers;

use App\Models\DepartmentsUsers;
use App\Models\Groups;
use App\Models\Log;
use App\Models\User;
use Myth\Auth\Password;

class Settings extends BaseController {

    protected $model;

	public function __construct()
	{
		$this->model = new User();
	}

    public function index()
	{
        $userModel = new User();
        $department = new Groups();
        $data['user'] = $userModel->find(user_id());
        $data['departments'] = $department->findAll();
        return view('settings', $data);
    }

    public function update()
	{
        if($this->validate([
            'username' => [
                'label'  => 'korisničko ime',
                'rules'  => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Morate uneti {field}.',
                    'is_unique' => '{field} {value} je zauzeto.'
                ]
            ],
            'name' => [
                'label'  => 'ime',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Morate uneti {field}.'
                ]
            ],
            'surname' => [
                'label'  => 'prezime',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Morate uneti {field}.'
                ]
            ],
            'email' => [
                'label'  => 'email',
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required'    => 'Morate uneti {field}.',
                    'valid_email' => 'Mail adresa {value} nije validna.',
                    'is_unique'   => 'Mail adresa {value} je već u upotrebi.'
                ]
            ],
            'password' => [
                'label'  => 'šifra',
                'rules'  => 'min_length[8]',
                'errors' => [
                    'required' => 'Morate uneti šifru.',
                    'min_length' => 'Šifra mora biti duža od 8 karaktera.'
                ]
            ],
            'pass_confirm' => [
                'label'  => 'potvrda sifre',
                'rules'  => 'matches[password]',
                'errors' => [
                    'required' => 'Morate ponoviti šifru.',
                    'matches' => 'Šifra se mora podudarati.'
                ]
            ],
        ])){
            $model = $this->model;
            
            $password = $this->request->getPost('password');

            if(isset($password) && !empty($password)){
                $staff = [
                    'username'     => $this->request->getPost('username'),
                    'firstname'    => $this->request->getPost('name'),
                    'lastname'     => $this->request->getPost('surname'),
                    //'department'   => $this->request->getPost('department'),
                    'email'        => $this->request->getPost('email'),
                    'password_hash'=> Password::hash($password),
                    'active'       => '1'
                ];
                
                $added = $model->update(user_id(), $staff);
                
                if($added){
                    //$departmentsUsersModel = new DepartmentsUsers();
    
                    //$newStaffId = $model->getInsertID();
    
                    //$departmentUser = [
                    //    'group_id' => $this->request->getPost('department'),
                    //    'user_id'  => $newStaffId,
                    //];
    
                    //$departmentsUsersModel->update($departmentsUsersModel->group_id, $departmentUser);
    
                    $logModel = new Log();
    
                    $log = [
                        'action' => 'Updated a staff data: ' . $this->request->getPost('username') . ' (ID: ' . user_id() . ')',
                        'user' => user_id()
                    ];
                    $logModel->insert($log);
                }
                return redirect()->to(base_url());
            } else {
                $staff = [
                    'username'     => $this->request->getPost('username'),
                    'firstname'    => $this->request->getPost('name'),
                    'lastname'     => $this->request->getPost('surname'),
                    //'department'   => $this->request->getPost('department'),
                    'email'        => $this->request->getPost('email'),
                    'active'       => '1'
                ];
                
                $added = $model->update(user_id(), $staff);
                
                if($added){
                   // $departmentsUsersModel = new DepartmentsUsers();
    
                    //$newStaffId = $model->getInsertID();
    
                    //$departmentUser = [
                     //   'group_id' => $this->request->getPost('department'),
                    //    'user_id'  => $newStaffId,
                    //];
    
                    //$departmentsUsersModel->update($departmentUser);
    
                    $logModel = new Log();
    
                    $log = [
                        'action' => 'Updated a staff data: ' . $this->request->getPost('username') . ' (ID: ' . user_id() . ')',
                        'user' => user_id()
                    ];
                    $logModel->insert($log);
                }
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

}