<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PackProductos extends Model
{
    protected $table    = 'detalle_paquete';
    protected $returnType = 'array';
    protected $allowedFields = ['cantidad','idPaquete', 'idProducto'];

    public function guardar_paquete($param){
        $this->insert($param);
    }

    public function getProductosRelacionados($idPaquete)
    {
        $builder = $this->db->table('detalle_paquete');
        $builder->select('*');
        $builder->join('productos', 'productos.idProducto = detalle_paquete.idProducto');
        $builder->where('idPaquete', $idPaquete);
        $result = $builder->get()->getResultArray();
    
        if (empty($result)) {
            return []; // Retorna un array vacío si no se encontraron productos relacionados
        }
    
        return $result;
    }
    
}
?>