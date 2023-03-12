<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Contenido extends Model
{
    protected $table    = 'contenido';
    protected $returnType = 'array';
    protected $allowedFields = ['idPaquete','codigo'];

    //solo va a traer el contenido de los paquetes activos
    public function traer_paquetes() {
    $query = $this->db->query("SELECT c.codigo, c.idPaquete FROM contenido c
        INNER JOIN paquetes p ON c.idPaquete = p.idPaquete AND p.estado = 'Activo'");
    return $query->getResultArray();
    }

    public function guardar_contenido($param){
        $this->insert($param);
    }

}
?>