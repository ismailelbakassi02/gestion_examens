<?php

namespace App\Controllers;
use App\Models\ModuleModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ModuleController extends BaseController
{
    public function index()
    {

    }
    public function getModuleName($id_module) {
        $moduleModel = new ModuleModel();
        $module = $moduleModel->getModuleName($id_module);  
        if ($module) {
            return $module['nom_module'];
        } else {
            return "Module not found";
        }
    }
}
