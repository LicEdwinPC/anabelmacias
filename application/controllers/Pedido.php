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

		echo '<pre>';
		print_r($ArrSemana);
		echo '</pre>';
		die();

		if ($ArrSemana['Fecha_inicio']) {
			# code...
		}
		$FInicio = "";

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
		$this->load->model('de_pedidos_model');


		$dataMaPedido = [
			"id_menu" => $this->input->post('id'),
			"FPedido"  => utils::datetime(),
			"id_comensal" => $this->ion_auth->user()->row()->id,
			"FInsert" => utils::datetime(),
			"UInsert" =>  $this->ion_auth->user()->row()->id,
			"Status" => 1,
			"Descripcion" => ""

		];

		

		

		if ($id_ma_pedido = $this->pedidos_model->agregar($dataMaPedido,$this->input->post('id'))) 
		{
			$i=0;
			$y=0;
			if ($this->input->post('comida') > 0) {
				# code...
				$dataPedido = [
					"id_ma_pedido" => $id_ma_pedido,
					"id_detalle_menu"  => $this->input->post('comida'),
					"FInsert" => utils::datetime(),
					"UCreate" =>  $this->ion_auth->user()->row()->id,
					"Status" => 1
		
				];


				if ($this->de_pedidos_model->agregar($dataPedido)) {
					# code...
					$this->results['mensaje'] ="Tu pedido se registró con exito";
					//echo json_encode($this->results);
				}else{
					$this->results['estatus'] = 'error';
					$this->results['mensaje'] = "Surgio un error al ingresar tu pedido, intenta nuevamente";
				}
			}else{
				$i=1;
			}

			if ($this->input->post('postre') > 0) {
				# code...
				$dataPedido = [
					"id_ma_pedido" => $id_ma_pedido,
					"id_detalle_menu"  => $this->input->post('postre'),
					"FInsert" => utils::datetime(),
					"UCreate" =>  $this->ion_auth->user()->row()->id,
					"Status" => 1
		
				];

				if ($this->de_pedidos_model->agregar($dataPedido)) {
					# code...
					$this->results['mensaje'] ="Tu pedido se registró con exito";
				}else{
					$this->results['estatus'] = 'error';
					$this->results['mensaje'] = "Surgio un error al ingresar tu pedido, intenta nuevamente";
				}
			}else{
					$y=1;
			}

			
		}else{
			$this->results['estatus'] = 'error';
			$this->results['mensaje'] = "Surgio un error al ingresar tu pedido, intenta nuevamente";
		}


		
		echo json_encode($this->results);
		
	}
}
