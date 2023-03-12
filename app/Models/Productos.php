<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Productos extends Model
{
    protected $table    = 'productos';
    protected $primaryKey = 'idProducto';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'img', 'modelo', 'marca', 'medida', 'clasificacion','idProducto'];

    public function traer_productos(){
        $query=$this->db->query("select nombre, img, modelo, marca, medida, clasificacion, idProducto from productos");
        return $query->getResultArray();
    }

    public function guardar_producto($param){
        $this->insert($param);
    }

}
?>