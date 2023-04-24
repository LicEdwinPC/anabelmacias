<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class menu_model extends CI_Model
{

	public $tabla;
    public function __construct()
    {
        $this->tabla = 'ma_menus';
        parent::__construct();
    }


	public function agregar($dataContent = array())
    {
        $this->db->set('FAct', utils::datetime());
        $this->db->set('IdUserCreated', $this->ion_auth->user()->row()->id);
        $insert_id = ($this->db->insert($this->tabla, $dataContent) == true) ? $this->db->insert_id() : false;
       
        return $insert_id;
    }

	public function eliminar($id_menu = 0){

		if ($id_menu != 0) {
			$CadenaSQL = "DELETE FROM ".$this->tabla." WHERE id=".$id_menu;

			if($this->db->query($CadenaSQL)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function getAll($condicion = null)
	{
		if ($condicion != null) {
			$this->db->where($condicion);
			# code...
		}else{
			$this->db->where('1=1');
		}
		
		$result= $this->db
		->select('*')
		->from($this->tabla)
		->order_by('fecha_menu','asc')
		->get();

		return $result->result();

	}

	public function getMenus($condicion = null){
		if ($condicion != null) {
			$this->db->where($condicion);
			# code...
		}else{
			$this->db->where('1=1');
		}

		$result= $this->db
		->select('ma_menus.id,ma_menus.fecha_menu,ma_menus.NoPlatillos,ma_menus.status,de_menu.id as id_detalle,de_menu.id_tipo,de_menu.descripcion')
		->from($this->tabla)
        ->join('de_menu', 'de_menu.id_ma_menu = ma_menus.id')
		->get();

		return $result->result();



	}
}
