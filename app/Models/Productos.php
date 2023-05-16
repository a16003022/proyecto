<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Productos extends Model
{
    protected $table    = 'productos';
    protected $primaryKey = 'idProducto';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'img', 'modelo', 'marca', 'medida', 'precio', 'clasificacion', 'caracteristicas','idProducto'];

    //para el usuario, sólo va a traer los productos que tengan stock
    public function traer_playeras(){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.caracteristicas, p.idProducto, i.cantidad 
            FROM productos p 
            INNER JOIN inventarios i ON p.idProducto = i.idProducto 
            WHERE p.clasificacion = 'Playera' AND i.cantidad >= 1");
        return $query->getResultArray();
    }    

    public function traer_sudaderas(){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.caracteristicas, p.idProducto, i.cantidad 
        FROM productos p 
        INNER JOIN inventarios i ON p.idProducto = i.idProducto 
        WHERE p.clasificacion = 'Sudadera' AND i.cantidad >= 1");
        return $query->getResultArray();
    }

    public function traer_bolsas(){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.caracteristicas, p.idProducto, i.cantidad 
            FROM productos p 
            INNER JOIN inventarios i ON p.idProducto = i.idProducto 
            WHERE p.clasificacion = 'Bolsa' AND i.cantidad >= 1");
        return $query->getResultArray();
    }

    public function buscar_productos($termino_busqueda){
        $query=$this->db->query("SELECT p.nombre, p.img, p.modelo, p.marca, p.medida, p.precio, p.clasificacion, p.idProducto, p.caracteristicas, i.cantidad 
            FROM productos p 
            INNER JOIN inventarios i ON p.idProducto = i.idProducto 
            WHERE i.cantidad >= 1 
            AND (
                p.nombre LIKE '%$termino_busqueda%' 
                OR p.caracteristicas LIKE '%$termino_busqueda%'
                OR p.modelo LIKE '%$termino_busqueda%'
                OR p.marca LIKE '%$termino_busqueda%'
                OR p.medida LIKE '%$termino_busqueda%'
                OR p.clasificacion LIKE '%$termino_busqueda%'
            )");
        return $query->getResultArray();
    }
    
    //para el administrador
    public function traer_productos(){
        $query=$this->db->query("select nombre, img, modelo, marca, medida, precio, clasificacion, caracteristicas, idProducto from productos");
        return $query->getResultArray();
    }

    public function traer_producto($idProducto){
        $query=$this->db->query("select nombre, img, modelo, marca, medida, precio, clasificacion, caracteristicas, idProducto from productos where idProducto=$idProducto");
        return $query->getResultArray();
    }

    public function actualizar_producto($param, $idProducto) {
        $this->set($param);
        $this->where('idProducto', $idProducto);
        $this->update();
    }

    public function guardar_producto($param){
        $this->insert($param);
    }

    public function eliminar_producto($id) {
        $query=$this->db->query("delete from productos where idProducto=$id");
        return $query;
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