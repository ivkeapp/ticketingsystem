<?php

namespace App\Controllers;

use App\Models\DepartmentsUsers;
use App\Models\Groups;
use App\Models\Log;
use App\Models\User;
use Myth\Auth\Password;

class Staff extends BaseController
{

	protected $model;

	public function __construct()
	{
		$this->model = new User();
	}

	public function index()
	{
        $data['users'] = $this->model->getUsers();
		return view('staff/staff', $data);
	}

	public function add()
	{
        $groupModel = new Groups();
		$data['users'] = $this->model->findAll();
        $data['departments'] = $groupModel->findAll();
		return view('staff/add', $data);
	}

	public function saveNew()
    {
        
    }
    
    public function delete($id)
    {
        $model = $this->model;
        $data = $model->find($id);
        $deleted = $model->delete($id);

        if($deleted){
            //$deletedTicketId = $model->getDeleteID();
            $logModel = new Log();
            if($data){
                $log = [
                    'action' => 'Deleted a staff user ' . $data->firstname . ' ' . $data->lastname . ', (ID: ' . $data->id . ')',
                    'user' => user_id()
                ];
                $logModel->insert($log);
            } else {
                $log = [
                    'action' => 'Attempted deleting staff with id (' . $id . ') which doesn\'t exist',
                    'user' => user_id()
                ];
                $logModel->insert($log);
            }
            
        }

        return redirect()->to('staff');
    }

    public function attemptSaveNew()
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
                'rules'  => 'required|min_length[8]|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Morate uneti šifru.',
                    'min_length' => 'Šifra mora biti duža od 8 karaktera.',
                    'alpha_numeric_punct' => 'Šifra može imati samo alfanumeričke karatkere i _?%&*-+=:.!$#~'
                ]
            ],
            'pass_confirm' => [
                'label'  => 'potvrda sifre',
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'Morate ponoviti šifru.',
                    'matches' => 'Šifra se mora podudarati.'
                ]
            ],
            // 'username'      => 'required|is_unique[users.username]',
            // 'name'          => 'required',
            // 'surname'       => 'required',
            // 'email'         => 'required|valid_email|is_unique[users.email]',
            // 'password'      => 'required|min_length[8]',
            // 'pass_confirm'  => 'required|matches[password]',

        ])){
            $model = $this->model;
            
            $password = $this->request->getPost('password');

            $staff = [
                'username'     => $this->request->getPost('username'),
                'firstname'    => $this->request->getPost('name'),
                'lastname'     => $this->request->getPost('surname'),
                'department'   => $this->request->getPost('department'),
                'email'        => $this->request->getPost('email'),
                'password_hash'=> Password::hash($password),
                'active'       => '1'
            ];
            
            $added = $model->insert($staff);
            
            if($added){
                $departmentsUsersModel = new DepartmentsUsers();

                $newStaffId = $model->getInsertID();

                $departmentUser = [
                    'group_id' => $this->request->getPost('department'),
                    'user_id'  => $newStaffId,
                ];

                $departmentsUsersModel->insert($departmentUser);

                $logModel = new Log();

                $log = [
                    'action' => 'Created a new staff user: ' . $this->request->getPost('username') . ' (ID: ' . $newStaffId . ')',
                    'user' => user_id()
                ];
                $logModel->insert($log);
            }
            return redirect()->to('staff');

        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
