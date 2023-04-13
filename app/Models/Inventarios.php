<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Inventarios extends Model
{
    protected $table    = 'inventarios';
    protected $returnType = 'array';
    protected $allowedFields = ['idProducto', 'clasificacion', 'cantidad'];

    public function insertar_inventario($param){
        $this->insert($param);
    }

    public function agregar_inventario($cantidad, $idProducto){
        $query = $this->db->query("UPDATE inventarios SET cantidad = cantidad+$cantidad WHERE idProducto = $idProducto");
        return $query;
    }

    public function restar_inventario($cantidad, $idProducto){
        $query = $this->db->query("UPDATE inventarios SET cantidad = cantidad-$cantidad WHERE idProducto = $idProducto");
        return $query;
    }
}
?>