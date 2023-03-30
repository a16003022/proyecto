<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Listas extends Model
{
    protected $table    = 'listas';
    protected $returnType = 'array';
    protected $allowedFields = ['idLista','idUsuario','nombre','idProducto','precio','img'];

    // public function crear_lista(){
    //     $this->insert($param);
    // }

    public function traer_lista($user_id){
        $query=$this->db->query("SELECT * FROM listas WHERE idUsuario = $user_id");
        return $query->getResultArray();
    }

    public function eliminar_Producto_lista($idProducto,$idUsuario){
        $query = $this->db->query("DELETE FROM listas WHERE idProducto = $idProducto AND idUsuario = $idUsuario");
        return $query;
    }

    public function AgregarALista(){
        $this->insert($param);
    }
    
    public function EliminarLista($idUsuario){
        $query = $this->db->query("DELETE FROM listas WHERE idUsuario = $idUsuario ");
        return $query;
    }

}
?>