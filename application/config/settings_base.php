<?php defined('BASEPATH') or exit('No direct script access allowed');

#------------------------------------------------------------
# PRODUCCION
#------------------------------------------------------------
$config['produccion'] = array(
    'desarrollo'    => false,
    'host'          => '',

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
    'host'          => 'localhost/ThemeBase',
    'bd_hostname'   => 'localhost',
    'bd_database'   => 'themebasedb',
    'bd_user'       => 'root',
    'bd_password'   => '',
    'site_url'      => '',

    // Repositorio de archivos pruebas
    'ftp_hostname'  => '2',
    'ftp_user'      => '',
    'ftp_password'  => '',

);

#------------------------------------------------------------
# TESTING
#------------------------------------------------------------
$config['testing'] = array(
    'desarrollo'    => false,
    'host'          => '10.10.20.134:8081/colibecas',
    'bd_hostname'   => '10.10.20.134',
    'bd_database'   => 'COLIBECAS_Drllo',
    'bd_user'       => 'desarrollo.ddad',
    'bd_password'   => 'C0rr4l@2022',
    'site_url'      => '',

    // Repositorio de archivos pruebas
    'ftp_hostname'  => '2',
    'ftp_user'      => '',
    'ftp_password'  => '',

);

return (object) $config;
