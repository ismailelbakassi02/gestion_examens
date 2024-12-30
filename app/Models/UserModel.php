<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; // Change this if needed
    protected $primaryKey = 'id_user';
    
    protected $allowedFields = ['name', 'date_birth', 'adresse']; // User table fields

    public function getUserByEmail($email)
    {
        return $this->db->table('account')
            ->join('user', 'user.id_user = account.id_user')
            ->where('account.email', $email)
            ->get()
            ->getRowArray();
    }
}