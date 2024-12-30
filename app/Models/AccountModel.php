<?php

// app/Models/AccountModel.php
namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'id_account';
    protected $allowedFields = ['id_user', 'id_role', 'email', 'password'];

    // Retrieve account by email
    public function getAccountByEmail($email)
    {
        return $this->where('email', $email)->first(); // Retrieve account by email
    }
}