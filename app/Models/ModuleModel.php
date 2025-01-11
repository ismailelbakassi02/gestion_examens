<?php

namespace App\Models;

use App\Entity\Module;
use CodeIgniter\Model;


class ModuleModel extends Model
{
    protected $table      = 'module';
    protected $primaryKey = 'id_module';

    protected $allowedFields = ['module_name', 'description'];
    protected $returnType     = Module::class;

    public function getModuleName($id_module) {
        return $this->where('id_module', $id_module)->first(); 
    }
}
