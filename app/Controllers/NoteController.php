<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoteModel;
use CodeIgniter\Controller;
use App\Models\ModuleModel;
use App\Models\UserModel;

class NoteController extends BaseController
{

    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        $noteModel = new NoteModel();
        $data['notes'] = $noteModel->getAllNotes();
        return view('note', $data);
    }

    public function showByStudent($id_etudiant) {
        $session = session();
        if (!$session->get('isLoggedIn') ) {
            return redirect()->to(base_url('login'));
        }
        if ($session->get('id_user')!=$id_etudiant ) {
            return redirect()->to(base_url('dashboard'));
        }
       
        $noteModel = new NoteModel();
        $moduleModel = new ModuleModel();
        $userModel=new UserModel();
        $session= session();
        $data["name"]=$session->get('name');
        $data['notes'] = $noteModel->getNotesByStudent($id_etudiant);

        $totalNotes = 0;
        $noteCount = 0;


        foreach ($data['notes'] as &$note) {

            $module = $moduleModel->getModuleName($note->id_module);
            
            

            if ($module) {
                $note->module_name = $module->nom_module;
                $prof_id=$module->id_user;
                $prof= $userModel->getUserById($prof_id);
                
                if ($prof) {
                    $note->prof_name = $prof->name;
                } else {
                    $note->prof_name = 'Unknown Professor';
                }
            } else {
                $note->module_name = 'Unknown Module';
            }

            //note Générale
            $totalNotes+=$note->note;
            $noteCount++;
        }
        $note_G=$noteCount > 0 ? $totalNotes / $noteCount : 0;
        $session ->set(['note_generale'=>$note_G]);
        $data["note_generale"]=$note_G;

        return view('note', $data); 
    }
    public function getModuleProf(){
        $session = Session();
        $id = $session->get('id_user');
        $moduleModel = new ModuleModel();
        $modules = $moduleModel->where('id_user', $id)->findAll();

        return view('note', ['modules' => $modules,'name' => $session->get('name')]);
    }
    
}
