<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class DetalleVenta extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'detalle_ventas';
    protected $primaryKey           = 'idDetalle';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['idVenta', 'idProducto','cantidad','total'];
 
    
    public function Traer_Detalle_Venta($idVenta)
    {
        $query = $this->db->query("SELECT dv.*,p.* FROM detalle_ventas dv INNER JOIN productos P ON dv.idProducto = p.idProducto WHERE dv.idVenta = $idVenta");
        return $query->getResultArray();
    }



    
}