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

	public function getAll(){
		$result= $this->db
		->select('*')
		->from($this->tabla)
		->order_by('fecha_menu','asc')
		->get();

		return $result->result();

	}
}
