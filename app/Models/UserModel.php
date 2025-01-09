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
    protected $allowedFields = ['name', 'date_birth', 'email', 'adresse']; // Ensure consistent casing

    /**
     * Fetch a user by their email.
     *
     * @param string $email
     * @return array|null
     */
    public function getUserByEmail(string $email): ?array
    {
        $builder = $this->db->table($this->table); // Use the $table property for consistency
        $builder->join('account', 'user.id_user = account.id_user');
        $builder->where('account.email', $email);
        
        $result = $builder->get()->getRowArray();
        
        // Return null if no user is found
        return $result ?: null;
    }
    public function profileE()
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
        return [
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'adresse' => $session->get('adresse'),
            'date_birth' => $session->get('date_birth'),
            'role' => $role_name,
        ];
    }
    public function E_update($userId, array $data, array $accountData)
    {
        $accountModel = new AccountModel();

        $user = $this->find($userId);
        if (!$user) {
            return false;
        }
        if($this->update($userId, $data) && $accountModel->where('id_user', $userId)->set($accountData)->update()){
        // $this->update($userId, $data);
        // $accountModel->where('id_user', $userId)->set($accountData)->update();
            return true;
        }else {
            return false;
        }
    }
}
