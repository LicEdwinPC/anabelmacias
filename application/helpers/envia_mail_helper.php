<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if ( ! function_exists('send_email')){
    function send_email($Email,$Titulo,$Mensaje) 
    {
        $ci = & get_instance();
        $ci->load->library('email');
        $Mensaje='<table width="800px" border="0" cellspacing="0" cellpadding="5">
                    <tbody>
                      <tr>
                        <td align="center" valign="top">
                            <img src="http://www.col.gob.mx/assets/img/escudo.png" heigth="100px"/>
                        </td>
                      <tr style="margin-top:30px;">                        
                        <td>'.$Mensaje.'</td>
                      </tr>                      
                    </tbody>
                  </table>';     
        $ci->email->from($ci->email->phpmailer->Username);
        $ci->email->to($Email);
        $ci->email->subject($Titulo);
        $ci->email->message($Mensaje);
        if($ci->email->send()) {
            $ci->session->set_flashdata("emailmsg", 'Correo enviado correctamente.');
        } else {
            $error = $ci->email->print_debugger(array('headers'));
            $ci->session->set_flashdata("emailmsg", 'Error al enviar mensaje de correo electrónico.'.$error);
        }
    }
}