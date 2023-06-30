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
		$this->load->model('pedidos_model');
		
		$ArrSemana = utils::semana(date('Y/m/d'));
		$FInicio = "";
		$condicion = 'fecha_menu BETWEEN "'. utils::fecha(date('d/m/Y')). '" and "'.utils::fecha($ArrSemana['Fecha_fin']).'" and status=1';
		$ArrMenus = $this->menu_model->getAll($condicion);

		foreach ($ArrMenus as $key => $row) {
			
			$row->str_fecha = utils::fechalarga($row->fecha_menu);
			$row->detalle = $this->_getDetalle($row->id);
			$row->pedidos = $this->pedidos_model->getByIdComensal($this->ion_auth->user()->row()->id,$row->id);
		}

		$this->data['Menus'] = $ArrMenus;
		$this->data['SemanaInicio'] = utils::fechalarga(utils::fecha($ArrSemana['Fecha_inicio']));
		$this->data['SemanaFin'] = utils::fechalarga(utils::fecha($ArrSemana['Fecha_fin']));
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

		if ($id_ma_pedido = $this->pedidos_model->agregar($dataMaPedido,$this->input->post('id'),$this->ion_auth->user()->row()->id)) 
		{
			$i=0;
			$y=0;
			if ($this->input->post('comida') > 0) {
				# code...
				$dataPedido = [
					"id_ma_pedido" => $id_ma_pedido,
					"id_detalle_menu"  => $this->input->post('comida'),
					"FInsert" => utils::datetime(),
					"UCreate" =>  $this->ion_auth->user()->row()->id
		
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
					"UCreate" =>  $this->ion_auth->user()->row()->id
		
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

	public function concentrado(){
		$this->load->model('de_pedidos_model');
		$this->data['title'] = "Pedidos";
		$this->data['Subtitle'] = "Concentrado de pedidos";
		$this->data['description'] = "Tabla de control para los pedidos de comida";
		$this->data['pedidos'] = $this->de_pedidos_model->getConcentrado();

		$this->blade->render('pedidos' . DIRECTORY_SEPARATOR . 'concentrado',$this->data);





	}
	public function listado()
	{

		$this->load->model('pedidos_model');
		$this->load->model('TipoPlatillo_model');
		$this->load->model('menu_model');
		$this->data['title'] = "Pedidos";
		$this->data['Subtitle'] = "Listado de pedidos";
		$this->data['description'] = "Tabla de control para los pedidos de comida";
		$this->data['pedidos'] = $this->pedidos_model->getPedidos();
		$this->data['tipo_platillo'] = $this->TipoPlatillo_model->getAll();
		$this->data['lstMenu'] = $this->menu_model->LstMenu();

		$this->blade->render('pedidos' . DIRECTORY_SEPARATOR . 'listadoDT',$this->data);




	}

	public function entregas(){
		$this->load->model('de_pedidos_model');
		if ($this->input->post('id_detalle')) {

			$id_detalle = $this->input->post('id_detalle');

			if ($this->de_pedidos_model->entregado($id_detalle)) {
				$this->results['mensaje'] ="Tu pedido se entrego con exito";
			}else{
				$this->results['estatus'] = 'error';
				$this->results['mensaje'] = "Surgio un error al registrar tu entrega, intenta nuevamente";
			}
			

			echo  json_encode($this->results);
			
		}
	}

	public function pendientes(){
		$this->load->model('de_pedidos_model');
		if ($this->input->post('id_detalle')) {

			$id_detalle = $this->input->post('id_detalle');

			if ($this->de_pedidos_model->pendiente($id_detalle)) {
				$this->results['mensaje'] ="Tu pedido se entrego con exito";
			}else{
				$this->results['estatus'] = 'error';
				$this->results['mensaje'] = "Surgio un error al registrar tu entrega, intenta nuevamente";
			}
			

			echo  json_encode($this->results);
			
		}
	}
}
