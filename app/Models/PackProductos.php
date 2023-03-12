<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PackProductos extends Model
{
    protected $table    = 'detalle_paquete';
    protected $returnType = 'array';
    protected $allowedFields = ['cantidad','idPaquete', 'idProducto'];

    public function guardar_paquete($param){
        $this->insert($param);
    }
}
?>