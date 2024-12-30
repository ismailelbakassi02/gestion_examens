<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;
    protected $accountModel;
    protected $session;

    public function __construct()
    {
        // Initialisation des modèles et de la session
        $this->userModel = new UserModel();
        $this->accountModel = new AccountModel();
        $this->session = session();
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticate()
    {
        $email = $this->request->getVar('text');
        $password = $this->request->getVar('password');
        $account = $this->accountModel->getAccountByEmail($email);

        if ($account && $account['password'] === $password) {
            // Authentification réussie
            $user = $this->userModel->find($account['id_user']);

            $sessionData = [
                'id_user' => $user['id_user'],
                'name' => $user['name'],
                'email' => $email,
                'role' => $account['id_role'],
                'isLoggedIn' => true
            ];

            $this->session->set($sessionData);
            return redirect()->to('/dashboard');
        }

        // Échec de l'authentification
        $this->session->setFlashdata('error', $account ? 'Incorrect password' : 'User not found');
        return redirect()->to('/login');
    }

    public function store()
    {
        $userData = [
            'name' => $this->request->getVar('name'),
            'date_birth' => $this->request->getVar('date_birth'),
            'adresse' => $this->request->getVar('adresse')
        ];

        if ($this->userModel->insert($userData)) {
            $userId = $this->userModel->insertID();
            $accountData = [
                'id_user' => $userId,
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'id_role' => null
            ];

            if (!$this->accountModel->insert($accountData)) {
                log_message('error', 'Account not inserted: ' . json_encode($this->accountModel->errors()));
            }
        }
    }

    public function dashboard()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data = [
            'name' => $this->session->get('name'),
            'email' => $this->session->get('email'),
            'role' => $this->session->get('role')
        ];

        return view('dashboard', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
