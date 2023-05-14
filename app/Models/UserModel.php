<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users';
    protected $primaryKey           = 'user_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['name','apellido','email', 'password'];
 
    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'user_created_at';
    protected $updatedField         = '';
    protected $deletedField         = '';
 
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
 
    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function ActualizarContra($id, $data)
    {
        $password = $data['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->query("UPDATE users SET password = '" . $password . "' WHERE user_id = '" . $id . "'");
        return $query;
    }

    public function TraerUsuario($email)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        return $query->getResultArray();
    }
}