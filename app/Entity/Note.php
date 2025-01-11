<?php
namespace App\Entity;

use CodeIgniter\Entity\Entity;

class Note extends Entity {
    protected $id_note;
    protected $note;
    protected $id_etudiant;
    protected $id_matiere;
}

?>
