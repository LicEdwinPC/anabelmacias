<?php

if( ! function_exists('_error')) {
    function _error($string){
        $CI =& get_instance();
        $tipo = 'error';
        $mensajes = $CI->session->userdata('mensaje');
        if($mensajes == false){
            $mensajes = array('error'=>array(),'info'=>array(),'warning'=>array(),'success'=>array());
        }  else if (!array_key_exists($tipo, $mensajes)) {
            $mensajes = array($tipo); 
        }

        if (!in_array($string, $mensajes[$tipo])) {
            $mensajes[$tipo][] = $string;
            $CI->session->set_userdata('mensaje',$mensajes);
        }
        return TRUE;
    }
}
   
if( ! function_exists('_info')) {    
    function _info($string){
        $CI =& get_instance();
        $tipo = 'info';
        $mensajes = $CI->session->userdata('mensaje');
        if($mensajes == false){
            $mensajes = array('error'=>array(),'info'=>array(),'warning'=>array(),'success'=>array());
        }  else if (!array_key_exists($tipo, $mensajes)) {
            $mensajes = array($tipo); 
        }

        if (!in_array($string, $mensajes[$tipo])) {
            $mensajes[$tipo][] = $string;
            $CI->session->set_userdata('mensaje',$mensajes);
        }
        return TRUE;
    }
}
    
if( ! function_exists('_success')) {
    function _success($string){
        $CI =& get_instance();
        $tipo = 'success';
        $mensajes = $CI->session->userdata('mensaje');
        if($mensajes == false){
            $mensajes = array('error'=>array(),'info'=>array(),'warning'=>array(),'success'=>array());
        }  else if (!array_key_exists($tipo, $mensajes)) {
            $mensajes = array($tipo); 
        }

        if (!in_array($string, $mensajes[$tipo])) {
            $mensajes[$tipo][] = $string;
            $CI->session->set_userdata('mensaje',$mensajes);
        }
        return TRUE;
    }
}
 
if( ! function_exists('_warning')) {
    function _warning($string){
        $CI =& get_instance();
        $tipo = 'warning';
        $mensajes = $CI->session->userdata('mensaje');
        if($mensajes == false){
            $mensajes = array('error'=>array(),'info'=>array(),'warning'=>array(),'success'=>array());
        }  else if (!array_key_exists($tipo, $mensajes)) {
            $mensajes = array($tipo); 
        }

        if (!in_array($string, $mensajes[$tipo])) {
            $mensajes[$tipo][] = $string;
            $CI->session->set_userdata('mensaje',$mensajes);
        }
        return TRUE;
    }
}
?>