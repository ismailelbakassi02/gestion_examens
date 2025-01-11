<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoteModel;
use CodeIgniter\Controller;
use App\Models\ModuleModel;

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

        $data['notes'] = $noteModel->getNotesByStudent($id_etudiant);

        $totalNotes = 0;
        $noteCount = 0;


        foreach ($data['notes'] as &$note) {

            $module = $moduleModel->getModuleName($note->id_module);

            if ($module) {
                $note->module_name = $module->nom_module;
            } else {
                $note->module_name = 'Unknown Module';
            }

            //note Générale
            $totalNotes+=$note->note;
            $noteCount++;
        }
        $data["note_generale"]=$noteCount > 0 ? $totalNotes / $noteCount : 0;

        return view('note', $data); 
    }
}
