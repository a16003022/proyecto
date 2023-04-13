<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Carrito extends Model
{
    protected $table    = 'carrito';
    protected $returnType = 'array';
    protected $allowedFields = ['idProducto', 'nombre', 'precio', 'stock', 'cantidad'];

    public function traer_carrito(){
        $query=$this->db->query("select idProducto, nombre, precio, stock, cantidad from carrito");
        return $query->getResultArray();
    }

    public function eliminar_del_carrito($idProducto){
        $query = $this->db->query("DELETE FROM carrito WHERE idProducto = $idProducto");
        return $query;
    }

    public function contar_contenido() {
        $query = $this->db->query("SELECT * FROM carrito");
        return $query->getNumRows();
    }

    public function guardar_contenido($param){
        $this->insert($param);
    }

    //al desconectar la sesión, el carrito se vacía automáticamente
    public function borrar_todo() {
        $this->db->table($this->table)->truncate();
    }
    
}
?>