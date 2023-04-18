<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class TipoPlatillo_model extends CI_Model
{

	public $tabla;
    public function __construct()
    {
        $this->tabla = 'ca_tipo_platillo';
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

	public function getAll(){
		$result= $this->db
		->select('*')
		->from($this->tabla)
		->order_by('descripcion','asc')
		->get();

		return $result->result();

	}
}
