<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('generarSql')) {    
    function generarSql($sql){
        $CI =& get_instance();
        $CI->load->library('encryption');
        $encrypted_string = $CI->encryption->encrypt($sql);
        return base64_encode($encrypted_string);
    }
}