<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class detalle_menu_model extends CI_Model
{

	public $tabla;
    public function __construct()
    {
        $this->tabla = 'de_menu';
        parent::__construct();
    }


	public function agregar($dataContent = array())
    {
       
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

	public function getAll(){
		$result= $this->db
		->select('de_menu.*,ma_menus.fecha_menu')
		->from($this->tabla)
        ->join('ma_menus', 'de_menu.id_ma_menu = ma_menus.id')
		->get();

		return $result->result();

	}
}
