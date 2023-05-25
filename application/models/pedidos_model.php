<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class pedidos_model extends CI_Model
{

	public $tabla;
    public function __construct()
    {
        $this->tabla = 'ma_pedidos';
        parent::__construct();
    }


	public function agregar($dataContent = array(),$id_ma_menu=0)
    {

		// echo '<pre>';
		// print_r($dataContent);
		// echo '</pre>';
		// die();

		if ($id_ma_menu > 0) {


			$this->db->select('id');
			$this->db->where('id_menu',$id_ma_menu);
			$result = $this->db->get($this->tabla);
			
			if ($result->num_rows() > 0){
				return $id_ma_menu;
			}else{
				$insert_id = ($this->db->insert($this->tabla, $dataContent) == true) ? $this->db->insert_id() : false;
				return $insert_id;
			}	

		}

		
       
       
    }

	public function eliminar($id = 0){

		if ($id != 0) {
			$CadenaSQL = "DELETE FROM ".$this->tabla." WHERE id=".$id;

			if($this->db->query($CadenaSQL)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function getAll($condicion = null){

		
		if ($condicion != null) {
			$this->db->where($condicion);
			# code...
		}else{
			$this->db->where('1=1');
		}

		$result= $this->db
		->select('de_menu.*,ma_menus.fecha_menu')
		->from($this->tabla)
        ->join('ma_menus', 'de_menu.id_ma_menu = ma_menus.id')
		->get();

		return $result->result();

	}

	public function detalle($id_ma_menu= 0){
		
		$result= $this->db
		->select('*')
		->from($this->tabla)
		->where('id_ma_menu',$id_ma_menu)
		->get();

		return $result->result();
	}

	public function getByIdComensal($id=0,$id_menu=0){
		$result= $this->db
		->select('ma_pedidos.id_menu,de_pedidos.id,de_pedidos.id_detalle_menu,ma_pedidos.FPedido,ma_pedidos.id_comensal')
		->from($this->tabla)
        ->join('de_pedidos', 'ma_pedidos.id = de_pedidos.id_ma_pedido')
		->where('ma_pedidos.id_comensal='.$id)
		->where('ma_pedidos.id_menu='.$id_menu)
		->order_by('ma_pedidos.id_menu','ASC')
		->get();

		return $result->result();
	}
}
