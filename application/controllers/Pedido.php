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
		$this->data['Subtitle'] = "Pedidos";
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

	function guardar(){
		$this->load->model('pedidos_model');
		$data = [
			"id_menu" => base64_decode($this->input->post('id')),
			"comida"  => $this->input->post('comida'),
			"postre"  => $this->input->post('postre'),
			"FPedido"  => utils::datetime(),
			"id_comensal" => $this->ion_auth->user()->row()->id,
			"FCreated" => utils::datetime(),
			"UInsert" =>  $this->ion_auth->user()->row()->id,
			"status" => 1

		];

		
		echo "<pre>";
		print_r ($data);
		echo "</pre>";
		die();
		
		if ($this->pedidos_model->agregar($data)) {
			$this->results['mensaje'] ="Tu pedido se registró con exito";
			echo json_encode($this->results);
		}else{
			$this->results['estatus'] = 'error';
			$this->results['mensaje'] = "Surgio un error al ingresar tu pedido, intenta nuevamente";
			echo json_encode($this->results);
		}

		
	}
}
