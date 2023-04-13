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

        $this->session->set_flashdata('message', 'Esto es un mensaje para mostrar');

        // $this->data['menus'] = array(['title' => 'Comida: Ceviche de camarón','start' =>]);


        $this->blade->render('menu' . DIRECTORY_SEPARATOR . 'index', $this->data);
    }

    public function agregar()
    {
        echo "entro";
        die();
    }
}
