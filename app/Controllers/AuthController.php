<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AccountModel; // Assuming this model exists and is defined
use CodeIgniter\Controller;

class AuthController extends Controller
{
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
            // Check plaintext password match
            if ($account['password'] === $password) {
                // Password matches; login the user
                $userModel = new UserModel();
                $user = $userModel->find($account['id_user']); // Fetch user details
    
                // Store user information in session
                $sess_data = [
                    'id_user' => $user['id_user'],
                    'name' => $user['name'],
                    'email' => $email,
                    'role' => $account['id_role'], // This could also be null
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
    
        // Prepare account data without password hashing
        $accountData = [
            'id_user' => $userId,
            'username' => $this->request->getVar('name'),
            'password' => $this->request->getVar('password'),
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

        // Pass user data to the dashboard view
        $data = [
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'role' => $session->get('role'),
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