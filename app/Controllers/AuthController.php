<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
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
                    'isLoggedIn' => true,
                ];
                $session->set($sess_data);
                return redirect()->to('/dashboard'); // Redirect to dashboard
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
            'Email' => $this->request->getVar('email'),
            'adresse' => $this->request->getVar('adresse'),
        ];
    
        // Insert user data into user table
        $userModel->insert($userData);
        $userId = $userModel->insertID(); // Get last inserted user ID
    
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
            $role_name = 'admin';
        } elseif ($session->get('role') == 2) {
            $role_name = 'User';
        } elseif ($session->get('role') == 3) {
            $role_name = 'guest';
        }
        // Pass user data to the dashboard view
        $data = [
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'role' => $role_name,
        ];

        return view('dashboard', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}