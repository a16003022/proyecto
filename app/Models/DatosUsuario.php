<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class DatosUsuario extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'datos_usarios';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['idUsuario', 'direccion','CP','estado','ciudad','telefono'];
 

    public function Traerdirecciones($user_id)
    {
        $query = $this->db->query("SELECT * FROM datos_usarios WHERE idUsuario = $user_id");
        return $query->getResultArray();
    }

    public function BorrarDireccion($id)
    {
        $query = $this->db->query("DELETE FROM datos_usarios WHERE id = $id");
        return $query;
    }

    
}