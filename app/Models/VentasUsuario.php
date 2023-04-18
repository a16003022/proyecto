<?php namespace App\Models;
  
use CodeIgniter\Model;

class VentasUsuario extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'ventas';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['idVenta', 'idUsuario','totalPagar','idDireccion','numTarjeta'];
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'fecha';
    protected $updatedField         = '';
    protected $deletedField         = '';
 

    public function TraerVenta($idVenta)
    {
        $query = $this->db->query("SELECT v.*,du.*, u.* FROM ventas v INNER JOIN datos_usarios du ON v.idDireccion = du.id INNER JOIN users u ON v.idUsuario = u.user_id WHERE v.idVenta = $idVenta");
        return $query->getResultArray();
    }

    public function BorrarDireccion($id)
    {
        $query = $this->db->query("DELETE FROM datos_usarios WHERE id = $id");
        return $query;
    }

}