<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PackProductos extends Model
{
    protected $table    = 'detalle_paquete';
    protected $returnType = 'array';
    protected $allowedFields = ['idPaquete', 'idProducto'];

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

    public function guardarRelacion($idPaquete, $idProducto) {
        // Verificar si ya existe una relación entre el paquete y el producto
        $builder = $this->db->table($this->table);
        $builder->where('idPaquete', $idPaquete);
        $builder->where('idProducto', $idProducto);
        $query = $builder->get();
        $result = $query->getRow();
    
        // Si no existe la relación, insertar un nuevo registro
        if (!$result) {
            $data = [
                'idPaquete' => $idPaquete,
                'idProducto' => $idProducto
            ];
            $this->insert($data);
        }
    }
    
    public function eliminarRelacion($idPaquete, $idProducto) {
        $builder = $this->db->table($this->table);
        $builder->where('idPaquete', $idPaquete);
        $builder->where('idProducto', $idProducto);
        $builder->delete();
    }
  
    public function eliminarTodasRelaciones($idPaquete) {
        $builder = $this->db->table($this->table);
        $builder->where('idPaquete', $idPaquete);
        $builder->delete();
        }
}
?>