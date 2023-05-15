<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Productos extends Model
{
    protected $table    = 'productos';
    protected $primaryKey = 'idProducto';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'img', 'modelo', 'marca', 'medida', 'precio', 'clasificacion','idProducto'];

    //para el usuario, sólo va a traer los productos que tengan stock
    public function traer_playeras(){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.idProducto, i.cantidad 
            FROM productos p 
            INNER JOIN inventarios i ON p.idProducto = i.idProducto 
            WHERE p.clasificacion = 'Playera' AND i.cantidad >= 1");
        return $query->getResultArray();
    }    

    public function traer_sudaderas(){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.idProducto, i.cantidad 
        FROM productos p 
        INNER JOIN inventarios i ON p.idProducto = i.idProducto 
        WHERE p.clasificacion = 'Sudadera' AND i.cantidad >= 1");
        return $query->getResultArray();
    }

    public function traer_bolsas(){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.idProducto, i.cantidad 
            FROM productos p 
            INNER JOIN inventarios i ON p.idProducto = i.idProducto 
            WHERE p.clasificacion = 'Bolsa' AND i.cantidad >= 1");
        return $query->getResultArray();
    }

    //para el administrador
    public function traer_productos(){
        $query=$this->db->query("select nombre, img, modelo, marca, medida, precio, clasificacion, idProducto from productos");
        return $query->getResultArray();
    }

    public function traer_producto($idProducto){
        $query=$this->db->query("select nombre, img, modelo, marca, medida, precio, clasificacion, idProducto from productos where idProducto=$idProducto");
        return $query->getResultArray();
    }

    public function guardar_producto($param){
        $this->insert($param);
    }

    public function buscar($searchTerm)
{
  return $this->db->table('productos')
    ->like('nombre', $searchTerm)
    ->orLike('marca', $searchTerm)
    ->get()
    ->getResult();
}

}
?>