<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Inventarios extends Model
{
    protected $table    = 'inventarios';
    protected $returnType = 'array';
    protected $allowedFields = ['idProducto', 'clasificacion', 'cantidad'];

    public function traer_inventario($idProducto){
        $query=$this->db->query("SELECT idProducto, clasificacion, cantidad from inventarios WHERE idProducto = $idProducto");
        return $query->getResultArray();
    }

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