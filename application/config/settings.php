<?php defined('BASEPATH') or exit('No direct script access allowed');

#------------------------------------------------------------
# PRODUCCION
#------------------------------------------------------------
$config['produccion'] = array(
    'desarrollo'    => false,
    'host'          => '',
    'site_url'      => '',
    'bd_hostname'   => 'localhost',
    'bd_database'   => '', //nombre sugerido
    'bd_user'       => '',
    'bd_password'   => '',

    // Repositorio de archivos
    'ftp_hostname'  => '',
    'ftp_user'      => '',
    'ftp_password'  => '',

);

#------------------------------------------------------------
# DESARROLLO
#------------------------------------------------------------
$config['desarrollo'] = array(
    'desarrollo'    => true,
    'host'          => 'localhost/anabelmacias',
    'bd_hostname'   => 'localhost',
    'bd_database'   => 'anabelmacias',
    'bd_user'       => 'root',
    'bd_password'   => '',
    'site_url'      => '',
    // Repositorio de archivos pruebas
    'ftp_hostname'  => '2',
    'ftp_user'      => '',
    'ftp_password'  => '',

);

return (object) $config;
