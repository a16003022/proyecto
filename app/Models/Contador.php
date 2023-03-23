<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Contador extends Model
{
    protected $table    = 'contador';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['contar'];

    //solo va a traer el contenido de los paquetes activos
    public function contar_contenido() {
    $query = $this->db->query("SELECT *  FROM contador");
    return $query->getNumRows();
    }

    public function guardar_contenido($param){
        $this->insert($param);
    }

}
?>