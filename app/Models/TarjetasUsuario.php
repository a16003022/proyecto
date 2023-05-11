<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class TarjetasUsuario extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tarjetas';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['idUsuario', 'numTarjeta','NombreTarjeta','FechaTarjeta','Tipo'];
 

    public function TraerTarjetas($user_id)
    {
        $query = $this->db->query("SELECT * FROM tarjetas WHERE idUsuario = $user_id");
        return $query->getResultArray();
    }

    public function TraerTarjeta($Tarjetaid)
    {
        $query = $this->db->query("SELECT * FROM tarjetas WHERE id = $Tarjetaid");
        return $query->getResultArray();
    }


    
}