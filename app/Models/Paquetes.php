<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Paquetes extends Model
{
    protected $table    = 'paquetes';
    protected $primaryKey = 'idPaquete';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'descripcion', 'fechaInicio','fechaTermino','estado','precio','idPaquete'];

    public function traer_paquetes(){
        $query=$this->db->query("select nombre, descripcion, fechaInicio, fechaTermino, estado, precio, idPaquete from paquetes");
        return $query->getResultArray();
    }

    public function traer_paquete($idPaquete){
        $query=$this->db->query("select nombre, descripcion, fechaInicio, fechaTermino, estado, precio, idPaquete from paquetes WHERE idPaquete = $idPaquete");
        return $query->getResultArray();
    }

    public function guardar_paquete($param){
        $this->insert($param);
    }

    public function actualizar_paquete($param, $idPaquete) {
        $this->set($param);
        $this->where('idPaquete', $idPaquete);
        $this->update();
    }    
}
?>