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
    protected $allowedFields        = ['idVenta', 'idUsuario','totalPagar','idDireccion','idTarjeta'];
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

    public function traer_ventas(){
        $query = $this->db->query("
            SELECT ventas.idVenta, users.name, users.apellido, ventas.fecha, datos_usarios.direccion, SUM(detalle_ventas.cantidad) as totalProductos, ventas.totalPagar, tarjetas.numTarjeta
            FROM ventas
            INNER JOIN detalle_ventas ON ventas.idVenta = detalle_ventas.idVenta
            INNER JOIN users ON ventas.idUsuario = users.user_id
            INNER JOIN datos_usarios on ventas.idDireccion = datos_usarios.id
            INNER JOIN tarjetas on ventas.idTarjeta = tarjetas.id
            GROUP BY ventas.idVenta
        ");
        return $query->getResultArray();
    }

}