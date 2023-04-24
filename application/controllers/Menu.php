<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'El usuario no tiene permisos para este modulo');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->data['title'] = "Menus";
        $this->data['Subtitle'] = "Agregar el menu mensualmente para los comensales";
        $this->data['description'] = "";

        // $this->session->set_flashdata('message', 'Esto es un mensaje para mostrar');

        // $ArrDatos = $this->_getTodo();
		
		$this->data['fechas_inhabiles'] = $this->_getFechasInhabiles();
		// $this->data['datos'] =  json_encode($ArrDatos);

		// print_r($this->data['fechas_inhabiles']);
		// die();


		//Combo tipo de platillo.
		// $this->data['LstTipoPlatillo'] = $this->_getTipoPlatillo();

        $this->blade->render('menu' . DIRECTORY_SEPARATOR . 'index', $this->data);
    }

	function _getTipoPlatillo(){
		$this->load->model("TipoPlatillo_model");

		if ($ArrDatos = $this->TipoPlatillo_model->getAll()) {
			return $ArrDatos;
		}
	}

	function _getFechasInhabiles(){
		$this->load->model('menu_model');
		$Arrdatos = $this->menu_model->getAll();
		$ArrFechas = array();
		foreach ($Arrdatos as $key => $row) {
			$ArrFechas[$key] =  utils::aFecha($row->fecha_menu,true);
		}
		
		return json_encode($ArrFechas);
	}

	function datosMenu(){
		$this->load->model('detalle_menu_model');
		$Arrdatos = $this->detalle_menu_model->getAll();

		foreach ($Arrdatos as $key => $row) {
			$ArrComida[$key]['id'] = $row->id;
			// $ArrComida[$key]['url'] = site_url('menu/delete?id=').base64_encode($row->id);
			$ArrComida[$key]['title'] = $row->descripcion;
			$ArrComida[$key]['start'] = $row->fecha_menu;
			$ArrComida[$key]['tipo'] = $row->id_tipo;
			if ($row->id_tipo == 1) {
				# code...
				$ArrComida[$key]['className'] = "fc-event-solid-danger fc-event-light fc-x";
			}else{
				$ArrComida[$key]['className'] = "fc-event-solid-info fc-event-light fc-x";
			}
			
			$ArrComida[$key]['description'] = $row->descripcion;
		}

		
		echo  json_encode($ArrComida);
	}

	function _getTodo(){
		$this->load->model('menu_model');

		$Arrdatos = $this->menu_model->getAll();

		$ArrComida = array();
		$ArrPostre = array();
		$ArrAll = array();
		foreach ($Arrdatos as $key => $row) {
			$ArrComida[$key]['id'] = $row->id;
			// $ArrComida[$key]['url'] = site_url('menu/delete?id=').base64_encode($row->id);
			$ArrComida[$key]['title'] = $row->comida;
			$ArrComida[$key]['start'] = $row->fecha_menu;
			$ArrComida[$key]['className'] = "fc-event-solid-danger fc-event-light";
			$ArrComida[$key]['description'] = $row->comida;
		}

		foreach ($Arrdatos as $key => $row) {
			$ArrPostre[$key]['id'] = $row->id;
			// $ArrPostre[$key]['url'] = site_url('menu/delete?id=').base64_encode($row->id);
			$ArrPostre[$key]['title'] = $row->postre;
			$ArrPostre[$key]['start'] = $row->fecha_menu;
			$ArrPostre[$key]['className'] = "fc-event-solid-info fc-event-light";
			$ArrPostre[$key]['description'] = $row->postre;
		}

		return $ArrAll = array_merge($ArrPostre,$ArrComida);
		
	}

    public function agregar()
    {
		$this->load->model('menu_model');
		$this->load->model('detalle_menu_model');

		$this->form_validation->set_rules('fecha_menu', 'Fecha del registro', 'required|trim');
		$this->form_validation->set_rules('comida', 'Comida', 'required|trim');
		$this->form_validation->set_rules('postre', 'Postre', 'required|trim');

	
        if ($this->form_validation->run() == true) {

			$dataMenu = [
				'fecha_menu' => utils::cfecha($this->input->post('fecha_menu')),
				'IdUserCreated' => $this->ion_auth->user()->row()->id,
				'FCreated' => utils::datetime(),
				'Status' => 1
			];


			if($IdMenu = $this->menu_model->agregar($dataMenu)){
				
				if ($IdMenu > 0) {

					
					$dataComida = [
						'id_ma_menu' => $IdMenu,
						'id_tipo' => 1,
						'descripcion' => trim($this->input->post('comida')),
						'IdUserCreated' => $this->ion_auth->user()->row()->id,
						'FCreated' => utils::datetime()
					];

					$dataPostre = [
						'id_ma_menu' => $IdMenu,
						'id_tipo' => 2,
						'descripcion' => trim($this->input->post('postre')),
						'IdUserCreated' => $this->ion_auth->user()->row()->id,
						'FCreated' => utils::datetime()
					];

					if ($this->detalle_menu_model->agregar($dataComida) && $this->detalle_menu_model->agregar($dataPostre)) {
						$this->results['mensaje'] = "Tu registro ha sido agregado con exito";
						echo json_encode($this->results);
					}
				}
				
			}else{
				$this->results['estatus'] = 'error';
				$this->results['mensaje'] = "Surgio un problema al insertar el registro, intenta nuevamente";
				echo json_encode($this->results);
			}
		
		}else{
			$this->results['estatus'] = 'error';
			$this->results['mensaje'] = "Los datos no son validos, intenta nuevamente";
			echo json_encode($this->results);
		}
    }

	public function delete(){
		$this->load->model('detalle_menu_model');
		if ($this->input->post('id') && $this->input->post('id') > 0) {
			# code...
			
			if ($this->detalle_menu_model->eliminar($this->input->post('id'))) {
				$this->results['mensaje'] = "Tu registro ha sido eliminado con exito";
				echo json_encode($this->results);
			}else{
				$this->results['estatus'] = 'error';
				$this->results['mensaje'] = "Surgio un error al intentar eliminar el menu, intenta nuevamente";
				echo json_encode($this->results);
			}

		}else{
			$this->results['estatus'] = 'error';
			$this->results['mensaje'] = "Los parametros proporcionados no son validos, intenta nuevamente";
			echo json_encode($this->results);
		}
	}
}
