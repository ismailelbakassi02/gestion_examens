<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user'; // Change this if needed
    
    /**
     * The primary key of the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';
    
    /**
     * Allowed fields for insert/update operations.
     *
     * @var array
     */
    protected $allowedFields = ['name', 'date_birth', 'email', 'adresse']; 

    /**
     * Fetch a user by their email.
     *
     * @param string $email
     * @return array|null
     */
    public function getUserByEmail(string $email): ?array
    {
        $builder = $this->db->table($this->table); 
        $builder->join('account', 'user.id_user = account.id_user');
        $builder->where('account.email', $email);
        
        $result = $builder->get()->getRowArray();
        
      
        return $result ?: null;
    }
    public function getUserById($id)
    {
        return $this->where('id_user', $id)->first();
    }
}
