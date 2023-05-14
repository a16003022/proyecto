<?php namespace App\Models;
  
use CodeIgniter\Model;

class Cupones extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'cupones';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['idUsuario','codigo','descuento','usado'];
    
 

            public function obtenerCupon($cupon)
                {
                    $this->select('*');
                    $this->where('codigo', $cupon);
                    $query = $this->get();
                    return $query->getResultArray();
                }

                // public function obtenerCupones(){
                //     $query=$this->db->query("select * from cupones");
                //     return $query->getResultArray();
                // }
            
                public function obtenerCupones(){
                    $query=$this->db->query("SELECT c.*,u.* FROM cupones c INNER JOIN users u ON c.idUsuario = u.user_id");
                    return $query->getResultArray();
                }

                public function actualizarCupon($cupon, $usado)
                {
                    $this->where('codigo', $cupon);
                    $this->set('usado', $usado);
                    $this->update();
                    return true;
                }
                
                public function BuscarCupon($id)
                {
                    $this->select('*');
                    $this->where('id', $id);
                    $query = $this->get();
                    return $query->getResultArray();
                }

        public function eliminarCupon($id)
                {
                    $this->where('id', $id);
                    $this->delete();
                    return true;
                }


}