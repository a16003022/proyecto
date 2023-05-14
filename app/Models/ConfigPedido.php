<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ConfigPedido extends Model
{
    protected $table    = 'config_pedido';
    protected $returnType = 'array';
    protected $allowedFields = ['TotalPagar', 'Envio'];

    public function traer_configPedido(){
        $query=$this->db->query("SELECT * from config_pedido");
        return $query->getResultArray();
    }


    //al desconectar la sesión, el carrito se vacía automáticamente
    public function borrar_todo() {
        $this->db->table($this->table)->truncate();
    }
    
}
?>