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

	public function index(){

		$this->data['title'] = "Tabla de control";
		$this->data['Subtitle'] = "Dashboard";
		$this->data['description'] = "Tabla de control para los pedidos de comida";

		
		

		$this->blade->render('pedidos' . DIRECTORY_SEPARATOR . 'index',$this->data);
	}
}
