<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Contenido extends Model
{
    protected $table    = 'contenido';
    protected $returnType = 'array';
    protected $allowedFields = ['idPaquete','codigo', 'clasificacion'];

    //solo va a traer el contenido de los paquetes activos
    public function traer_paquetes() {
    $query = $this->db->query("SELECT c.codigo, c.idPaquete, c.clasificacion FROM contenido c
        INNER JOIN paquetes p ON c.idPaquete = p.idPaquete WHERE p.estado = 'Activo' AND c.clasificacion ='paquetes'");
    return $query->getResultArray();
    }
    public function guardar_contenido($param){
        $this->insert($param);
    }

    public function actualizar_contenido($param, $idPaquete) {
        $this->set($param);
        $this->where('idPaquete', $idPaquete);
        $this->update();
    }

    public function eliminar_contenido($id) {
        $query=$this->db->query("delete from contenido where idPaquete=$id");
        return $query;
    }

}
?>