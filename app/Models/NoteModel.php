<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entity\Note;


class NoteModel extends Model
{
    protected $table      = 'notes';
    protected $primaryKey = 'id_note';

    protected $allowedFields = ['note', 'id_etudiant', 'id_matiere'];
    protected $returnType     = Note::class;


    public function getAllNotes() {
        return $this->findAll();
    }

    public function getNotesByStudent($id_etudiant) {
        return $this->where('id_user', $id_etudiant)->findAll();
    }


    public function getNotesBySubject($id_matiere) {
        return $this->where('id_matiere', $id_matiere)->findAll();
    }


    public function getNoteByStudentSubject($id_etudiant, $id_matiere){
        return $this->where(['id_user' => $id_etudiant, 'id_matiere' => $id_matiere])->findAll();
    }
    
    
}
