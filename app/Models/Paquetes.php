<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Paquetes extends Model
{
    protected $table    = 'paquetes';
    protected $primaryKey = 'idPaquete';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'descripcion', 'contenido', 'fechaInicio','fechaTermino','estado','precio','idPaquete'];

    public function traer_paquetes(){
        $query=$this->db->query("select nombre, descripcion, contenido, fechaInicio, fechaTermino, estado, precio, idPaquete from paquetes");
        return $query->getResultArray();
    }
}
?>