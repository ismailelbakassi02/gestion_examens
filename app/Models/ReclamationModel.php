<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entity\Reclamation;

class ReclamationModel extends Model
{
    protected $table            = 'reclamations';
    protected $primaryKey       = 'id_reclamation';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['note', 'id_module', 'id_note','id_user','commentaire','etat'];
    // protected $returnType     = Note::class;

    public function getReclamationById($id){
        return $this->where('id_reclamation', $id)->asArray()->first();
    }
    public function getReclamationById_etudiant($id_etu){
        return $this->where('id_user', $id_etu)->findAll();
    }

}
