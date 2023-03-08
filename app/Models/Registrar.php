<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Registrar extends Model
{
    protected $table    = 'paquetes';
    protected $primaryKey = 'idPaquete';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'descripcion', 'contenido', 'fechaInicio','fechaTermino','estado','precio'];

    public function guardar_paquete($param){
        $this->insert($param);
       /* $query=$this->db->query("INSERT INTO paquetes(nombre, contenido, fechaInicio, fechaTermino, estado, precio)
        values('".$param['nombre']."', '".$param['contenido']."', '".$param['fechaInicio']."', '".$param['fechaTermino']."', '".$param['estado']."', '".$param['precio']."')");
        return $query->getResult();*/
    }
}
?>