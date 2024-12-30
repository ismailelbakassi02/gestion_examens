<?php

// app/Models/AccountModel.php
namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'id_account';
    protected $allowedFields = ['id_user', 'id_role', 'username', 'password'];

    // Retrieve account by email
    public function getAccountByEmail($email)
    {
        return $this->where('username', $email)->first(); // Retrieve account by email
    }
}