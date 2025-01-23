<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoteModel;
use App\Models\ModuleModel;
use App\Models\UserModel;
use App\Models\ReclamationModel;

class ReclamationController extends BaseController
{
    public function reclamer($id_etu,$id_note)
    {

        $session = session();
        if (!$session->get('isLoggedIn') ) {
            return redirect()->to(base_url('login'));
        }
        if ($session->get('id_user')!=$id_etu) {
            return redirect()->to(base_url('dashboard'));
        }


    $noteModel = new NoteModel();
    $moduleModel = new ModuleModel();
    $userModel=new UserModel();
    $data["note"]=$noteModel->getNoteById($id_note);
    
        
    $data["etudiant"]=$userModel->getUserById($id_etu);


     $data["module"]=$moduleModel->getModuleName($data["note"]["id_module"]);


     return view('reclamation',$data);


    }

    public function store(){
        $reclamationModel = new ReclamationModel();

        // Validate the form data
        // $validation = $this->validate([
        //     'module'      => 'required|numeric',
        //     'note'        => 'required|numeric',
        //     'commentaire' => 'required|string|max_length[255]',
        // ]);

        // if (!$validation) {
        //     // Redirect back with validation errors
        //     return redirect()->back()->with('errors', $this->validator->getErrors());
        // }

        // Retrieve form data
        $data = [
            'id_module'   => $this->request->getPost('module_id'),
            'id_note' =>$this->request->getPost('note_id'),
            'id_user'     => session('id_user'), 
            'commentaire' => $this->request->getPost('commentaire'),
            'etat'=>"En attent",
        ];
// Save the data to the database
    $reclamationModel->save($data);
        return redirect()->to(base_url('dashboard'));
      
        
    }

    public function index()
    {

        $session = session();
        if (!$session->get('isLoggedIn') ) {
            return redirect()->to(base_url('login'));
        }
  

        $id_user=$session->get('id_user');
  $moduleModel=new ModuleModel();
    $reclamationModel=new ReclamationModel();
    $data["reclamations"]=$reclamationModel->getReclamationById_etudiant($id_user);
    foreach ($data['reclamations'] as &$reclamation) {
        $module = $moduleModel->getModuleName($reclamation['id_module']);
        $reclamation['module_name'] = $module->nom_module;}
        return view('reclamation_list',$data);
     


    }
}
