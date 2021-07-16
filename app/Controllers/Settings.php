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
        //session()->remove('message');
        $userModel = new User();
        //$department = new Groups();
        $data['user'] = $userModel->find(user_id());
        //$data['departments'] = $department->findAll();
        return view('settings', $data);
    }

    public function update()
	{
        $model = $this->model;

        if($this->validate([
            'username' => [
                'label'  => 'korisničko ime',
                'rules'  => 'required|is_unique[users.username,users.id,'.user_id().']',
                'errors' => [
                    'required' => 'Morate uneti {field}.',
                    'is_unique' => 'Korisničko ime je već u upotrebi'
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
                'rules'  => 'required|valid_email|is_unique[users.email,users.id,'.user_id().']',
                'errors' => [
                    'required'    => 'Morate uneti {field}.',
                    'valid_email' => 'Mail adresa {value} nije validna.',
                    'is_unique'   => 'Mail adresa {value} je već u upotrebi.'
                ]
            ],
            'pass_confirm' => [
                'label'  => 'potvrda sifre',
                'rules'  => 'required_with[password]|matches[password]',
                'errors' => [
                    'required' => 'Morate ponoviti šifru.',
                    'matches' => 'Šifra se mora podudarati.'
                ]
            ],
        ])){
            
            
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
                return redirect()->back()->with('message', 'Podaci su uspešno promenjeni.');
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

                    //session()->set('message', 'Podaci su uspešno promenjeni.');
                }
                return redirect()->back()->with('message', 'Podaci su uspešno promenjeni.');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

}