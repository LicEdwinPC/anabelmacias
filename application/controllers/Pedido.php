<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('message', 'El usuario no tiene permisos para este modulo');
            redirect('auth/login');
        }
    }

	public function index()
	{

		$this->data['title'] = "Tabla de control";
		$this->data['Subtitle'] = "Dashboard";
		$this->data['description'] = "Tabla de control para los pedidos de comida";

		$this->load->model('menu_model');
		
		$ArrSemana = utils::semana(date('Y/m/d'));

		$condicion = 'fecha_menu BETWEEN "'. utils::fecha($ArrSemana['Fecha_inicio']). '" and "'.utils::fecha($ArrSemana['Fecha_fin']).'" and status=1';
		
		
		$ArrMenus = $this->menu_model->getAll($condicion);

		foreach ($ArrMenus as $key => $row) {
			
			# code...
			$row->str_fecha = utils::fechalarga($row->fecha_menu);
			$row->detalle = $this->_getDetalle($row->id);
		}

		$this->data['Menus'] = $ArrMenus;

		
		$this->data['SemanaInicio'] = utils::fechalarga(utils::fecha($ArrSemana['Fecha_inicio']));
		$this->data['SemanaFin'] = utils::fechalarga(utils::fecha($ArrSemana['Fecha_fin']));

		// echo '<pre>';
		// print_r($this->data);
		// echo '</pre>';
		// die();

		$this->blade->render('pedidos' . DIRECTORY_SEPARATOR . 'index',$this->data);
	}

	function _getDetalle($id = 0){
		$this->load->model('detalle_menu_model');

		$ArrDetalle = array();
		return $ArrDetalle = $this->detalle_menu_model->detalle($id);
		
	}
}
