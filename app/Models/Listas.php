<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Listas extends Model
{
    protected $table    = 'listas';
    protected $returnType = 'array';
    protected $allowedFields = ['idLista','idUsuario','idProducto'];
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'fecha';
    protected $updatedField         = '';
    protected $deletedField         = '';
    // public function crear_lista(){
    //     $this->insert($param);
    // }

    public function traer_lista($user_id){
        $query=$this->db->query("SELECT l.*,p.* FROM listas l INNER JOIN productos p ON l.idProducto = p.idProducto WHERE l.idUsuario = $user_id");
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

    public function contar_contenido_Lista($user_id) {
        $query = $this->db->query("SELECT * FROM listas WHERE idUsuario = $user_id ");
        return $query->getNumRows();
    }

}
?>