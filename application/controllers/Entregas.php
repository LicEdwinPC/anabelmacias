<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Entregas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in() ) {
            $this->session->set_flashdata('message', 'El usuario no tiene permisos para este modulo');
            redirect('auth/login');
        }elseif(!$this->ion_auth->is_repartidor()){
			$this->session->set_flashdata('message', 'El usuario no tiene permisos para este modulo');
            redirect('auth/login');
		}
    }

	public function index()
	{
		$this->data['title'] = "Entregas";
		$this->data['Subtitle'] = "Listado de pedidos para entregar";
		$this->data['description'] = "Tabla de control para entrega de pedidos";		

		$this->blade->render('pedidos' . DIRECTORY_SEPARATOR . 'entregas',$this->data);

	}

	function getLstpedidos()
	{
		$this->load->model('pedidos_model');
		$this->load->model('TipoPlatillo_model');
		$condicion = "ma_menus.fecha_menu = '2023-05-30'";
		// $condicion = "ma_menus.fecha_menu = ".date('Y-m-d');

		if($ArrPedidos = $this->pedidos_model->getPedidosEntrega($condicion)){
			
			$this->results['data'] = $ArrPedidos;
        	echo json_encode($this->results);
		}
	}

	function getLstPedidosEntregados()
	{
		$this->load->model('pedidos_model');
		$this->load->model('TipoPlatillo_model');
		$condicion = "ma_menus.fecha_menu = '2023-05-30'";
		// $condicion = "ma_menus.fecha_menu = ".date('Y-m-d');

		if($ArrPedidos = $this->pedidos_model->getPedidosEntregaEntregados($condicion)){
			
			$this->results['data'] = $ArrPedidos;
        	echo json_encode($this->results);
		}
	}

	function PedidosEntregados(){
		$this->data['title'] = "Entregas";
		$this->data['Subtitle'] = "Listado de pedidos entregados";
		$this->data['description'] = "Tabla de control de pedidos entregados";		

		$this->blade->render('pedidos' . DIRECTORY_SEPARATOR . 'entregados',$this->data);
	}

	
}
