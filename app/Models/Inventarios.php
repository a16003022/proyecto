<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Inventarios extends Model
{
    protected $table    = 'inventarios';
    protected $returnType = 'array';
    protected $allowedFields = ['idProducto', 'nombre', 'cantidad'];

    public function traer_inventario($idProducto){
        $query=$this->db->query("SELECT idProducto, nombre, cantidad from inventarios WHERE idProducto = $idProducto");
        return $query->getResultArray();
    }

    public function producto_inventario(){
        $query=$this->db->query("SELECT p.nombre, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.idProducto, i.cantidad 
        FROM productos p 
        INNER JOIN inventarios i ON p.idProducto = i.idProducto");
        return $query->getResultArray();
    }

    public function insertar_inventario($param){
        $this->insert($param);
    }

    public function actualizar_inventario($cantidad, $idProducto){
        $query = $this->db->query("UPDATE inventarios SET cantidad = $cantidad WHERE idProducto = $idProducto");
        return $query;
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