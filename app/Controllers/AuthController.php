<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountModel; // Assuming this model exists and is defined
use CodeIgniter\Controller;

class AuthController extends Controller
{
    private static $userModelInstance = null;

    // Fonction singleton pour obtenir une instance unique de UserModel
    private static function getUserModel()
    {
        // Si l'instance n'existe pas encore, la créer
        if (self::$userModelInstance === null) {
            self::$userModelInstance = new UserModel();
        }

        // Retourner l'instance unique
        return self::$userModelInstance;
    }


    public function login()
    {
        return view('login'); // Ensure you have a view called login.php
    }

    public function register()
    {
        return view('register'); // Ensure you have a view called register.php
    }

    public function authenticate()
    {
        $session = session();
        $accountModel = new AccountModel();
    
        // Get the email and password inputs
        $email = $this->request->getVar('text'); // Assuming 'text' is your email input field
        $password = $this->request->getVar('password');
        
    
        // Retrieve user account by email
        $account = $accountModel->getAccountByEmail($email);
    
        if ($account) {
            // Check hashed password match
            if (password_verify($password, $account['password'])) {
                // Password matches; login the user
                $userModel = new UserModel();
                $user = $userModel->find($account['id_user']); // Fetch user details
                
                // Store user information in session
                $sess_data = [
                    'id_user' => $user['id_user'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $account['id_role'],
                    'date_birth' => $user['date_birth'],
                    'adresse' => $user['adresse'],
                    'isLoggedIn' => true,
                ];
                $session->set($sess_data);
                if ($account['id_role'] == 2){
                    return redirect()->to(base_url('notes/student/'.$user['id_user']));
                }else{
                    return redirect()->to(base_url('dashboard'));
                }
 // Redirect to dashboard
            } else {
                // Password is incorrect
                $session->setFlashdata('error', 'Incorrect password');
            }
        } else {
            // User not found
            $session->setFlashdata('error', 'User not found');
        }
    
        return redirect()->to(base_url('login'));
    }

    public function store()
    {
        $userModel = new UserModel();
        $accountModel = new AccountModel();
    
        // Gather user data
        $userData = [
            'name' => $this->request->getVar('name'),
            'date_birth' => $this->request->getVar('date_birth'),
            'email' => $this->request->getVar('email'),
            'adresse' => $this->request->getVar('adresse'),
        ];
    
        // Insert user data into user table
        $userModel->insert($userData);
        $userId = $userModel->insertID();
    
        // Prepare account data with hashed password
        $accountData = [
            'id_user' => $userId,
            'username' => $this->request->getVar('name'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT), // Hashing password
            'id_role' => "2",
        ];
    
        // Insert account data into account table
        if (!$accountModel->insert($accountData)) {
            log_message('error', 'Account not inserted: ' . json_encode($accountModel->errors()));
        }

        return redirect()->to(base_url('login'));
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login')); // Redirect if not logged in
        }
        if ($session->get('role') == 1) {
            $role_name = 'Admin';
        } elseif ($session->get('role') == 2) {
            $role_name = 'Etudiant';
        } elseif ($session->get('role') == 3) {
            $role_name = 'Prof';
        }
        // Pass user data to the dashboard view
        $data = [
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'role' => $role_name,
            'id'=>$session->get('id_user'),
            'note_general'=> $session->get('note_generale'),
        ];

        return view('dashboard', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
    public function profileE()
    {
        // Obtenir l'instance unique de UserModel via la fonction singleton
        $userModel = self::getUserModel();

        // Appeler la méthode profileE() du modèle
        $data = $userModel->profileE();

        // Retourner la vue avec les données
        return view('profileE', $data);
    }
    public function E_update()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $userModel = self::getUserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'adresse' => $this->request->getPost('address'),
            'date_birth' => $this->request->getPost('date_birth')
        ];
        $accountData = [
            'username' => $this->request->getPost('name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        if ($userModel->E_update($session->get('id_user'), $data,$accountData)) {
            
            $session->set([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'date_birth' => $this->request->getPost('date_birth'),
                'adresse' => $this->request->getPost('address'),
            ]);
            return redirect()->to(base_url('profileE'));
        }
    }
}