<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class load_files
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function load_js($data='', $controlador = '',$stringjs = '')
	{	
		/*Cargamos archivos en la variable data*/
		$archivos   = "<script type='text/javascript'> var site_url ='".base_url('index.php')."'; </script>";
		$archivos   .= "<script src='".trim(base_url('assets/js/customjs.js'))."' type='text/javascript'></script>";
		if ($stringjs != '') {
			$archivos   .= $stringjs;
		}
		if ($controlador == '' || $controlador == 'Portal') {
			
			if($data['menu_fixed'] == 1) {
		 		$archivos  .= "<script src='".trim(base_url('assets/js/menu-fixed-top.js'))."' charset='utf-8' type='text/javascript'></script>";
			}else{
				$archivos  .= '';
			}
		
		}else{
			if ($data['menu_fixed'] == 1) {
			 		$archivos  .= "<script src='".trim(base_url('assets/js/menu-fixed-top-dpcias.js'))."' type='text/javascript'></script>";
				}else{
				
			$archivos  .= '';
			}
						
		}

		##Edwin 07-01-2019
		$archivos  .= "<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js' type='text/javascript'></script> ";  
                
		$archivos  .= "<script src='".base_url('assets/js/jquery.validate.min.js')."' type='text/javascript'></script>";
		$archivos  .= "<script src='".base_url('assets/js/additional-methods.js')."' type='text/javascript'></script>";
		$archivos  .= "<script src='https://www.google.com/recaptcha/api.js'></script>";
		$archivos  .= "<script src='".base_url('assets/js/enviar-email.js')."' type='text/javascript'></script>";
		$archivos  .= "<script src='".base_url('assets/js/busquedageneral.js')."' type='text/javascript'></script>";
		$archivos  .= "<script src='".base_url('assets/js/destacados.js')."' type='text/javascript'></script>";
		
		return  $archivos;
	}

	public function load_css()
	{
		/*Cargamos archivos*/
		$archivos = "<link rel='stylesheet' type='text/css' href='".base_url('assets/css/customcss.css')."'>";
		return  $archivos;
		
	}
	
	public function cargarCss()
	{
		/*Cargamos archivos*/
		$archivos = "<link rel='stylesheet' type='text/css' href='".base_url('assets/css/customcss.css')."'>";
		return  $archivos;
		
	}

}

/* End of file load_css_js.php */
/* Location: ./application/libraries/load_css_js.php */
