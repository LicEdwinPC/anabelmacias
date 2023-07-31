<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class de_pedidos_model extends CI_Model
{

	public $tabla;
    public function __construct()
    {
        $this->tabla = 'de_pedidos';
        parent::__construct();
    }


	public function agregar($dataContent = array())
    {

		

		$this->db->select('id');
		$this->db->where('id_ma_pedido',$dataContent['id_ma_pedido']);
		$this->db->where('id_detalle_menu',$dataContent['id_detalle_menu']);
		$result = $this->db->get($this->tabla);
		
		if ($result->num_rows() <= 0){
			$insert_id = ($this->db->insert($this->tabla, $dataContent) == true) ? $this->db->insert_id() : false;
		}else{
			$insert_id = false;
		}
       
        return $insert_id;
    }

	public function addByPedido($dataContent = array()){
		$insert_id = ($this->db->insert($this->tabla, $dataContent) == true) ? $this->db->insert_id() : false;
		return $insert_id;
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

	public function getConcentrado($condicion=''){
		if ($condicion != null) {
			$this->db->where($condicion);
			# code...
		}

		$result= $this->db
		->select("de_pedidos.*,de_menu.descripcion as platillo, ma_menus.fecha_menu, ma_menus.Status,COUNT(de_pedidos.id_detalle_menu) as no_pedidos, ca_tipo_platillo.descripcion as tipoPlatillo, ca_tipo_platillo.id as idTipoP")
		->from($this->tabla)
        ->join('ma_pedidos', 'ma_pedidos.id = de_pedidos.id_ma_pedido','left')
		->join('de_menu', 'de_pedidos.id_detalle_menu = de_menu.id')
		->join('ma_menus', 'de_menu.id_ma_menu = ma_menus.id')
		->join('ca_tipo_platillo', 'de_menu.id_tipo = ca_tipo_platillo.id','left')
		->where('ma_menus.Status',1)
		->group_by('de_pedidos.id_detalle_menu')
		->order_by('ma_menus.fecha_menu','DESC')
		->get();

		return $result->result();

	}
	
	public function entregado($id=0)
	{
		if ($id != 0) {
			$CadenaSQL = "Update ".$this->tabla." SET Status = 1  WHERE id=".$id;
			if($this->db->query($CadenaSQL)){
				return TRUE;
			}else{
				return FALSE;
			}
		}

	}

	public function pendiente($id=0)
	{
		if ($id != 0) {
			$CadenaSQL = "Update ".$this->tabla." SET Status = 0  WHERE id=".$id;
			if($this->db->query($CadenaSQL)){
				return TRUE;
			}else{
				return FALSE;
			}
		}

	}
}
