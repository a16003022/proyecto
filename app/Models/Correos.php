<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Correos extends Model
{
    protected $table    = 'users';
    protected $returnType = 'array';
    protected $allowedFields = ['name','email', 'password'];

    public function traerCorreo($email) {
        $escapedEmail = $this->db->escape($email);
        $query = $this->db->query("SELECT * FROM users WHERE email = $escapedEmail");
        return $query->getResultArray();
    }
    
    
    
}
?>