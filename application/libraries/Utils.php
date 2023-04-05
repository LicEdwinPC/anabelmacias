<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class utils
{

    public static function pre($arr, $exit = true)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        if ($exit) {
            exit();
        };
    }

    public static function aHora($date, $hrs = true)
    {
        //valida si viene vacío.
        if ($date == "" or $date == "0000-00-00 00:00:00") {
            return false;
        }
        //convierte la fecha a timestamp
        $date = strtotime($date);
        return ($hrs == TRUE) ? date("G:i", $date) . " hrs" : date("h:i A");
    }

    public static function json_validator($data = null)
    {
        if (!empty($data)) {
            @json_decode($data);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return false;
            }
        }
        return true;
    }

    public static function generarContrasena($largo)
    {
        $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $cadena_base .= '0123456789';
        //$cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';

        $password = '';
        $limite = strlen($cadena_base) - 1;

        for ($i = 0; $i < $largo; $i++)
            $password .= $cadena_base[rand(0, $limite)];

        return $password;
    }


    public static function bytesToSize($bytes, $precision = 2)
    {
        $kilobyte = 1024;
        $megabyte = $kilobyte * 1024;
        $gigabyte = $megabyte * 1024;
        $terabyte = $gigabyte * 1024;

        if (($bytes >= 0) && ($bytes < $kilobyte)) {
            return $bytes . ' B';
        } elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
            return round($bytes / $kilobyte, $precision) . ' KB';
        } elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
            return round($bytes / $megabyte, $precision) . ' MB';
        } elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
            return round($bytes / $gigabyte, $precision) . ' GB';
        } elseif ($bytes >= $terabyte) {
            return round($bytes / $terabyte, $precision) . ' TB';
        } else {
            return $bytes . ' B';
        }
    }

    public static function datetime()
    {
        return date('Y-m-d H:i:s');
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        return $date->setTimezone(new DateTimeZone('America/Mexico_City'))->format('Y-m-d H:i:s.u');
    }

    public static function eliminarDobleEspacios($cadena)
    {
        $limpia    = "";
        $parts    = array();

        // divido la cadena con todos los espacios q haya
        $parts = explode(" ", $cadena);

        foreach ($parts as $subcadena) {
            // de cada subcadena elimino sus espacios a los lados
            $subcadena = trim($subcadena);

            // luego lo vuelvo a unir con un espacio para formar la nueva cadena limpia
            // omitir los que sean unicamente espacios en blanco
            if ($subcadena != "") {
                $limpia .= $subcadena . " ";
            }
        }
        $limpia = trim($limpia);

        return $limpia;
    }

    public static function encodeDate($fecha)
    {
        if (strlen($fecha) > 9) {
            $fecha = str_replace('/', '-', $fecha);
            $format = 'Y-m-d';
            $d = DateTime::createFromFormat($format, $fecha);
            if ($d && $d->format($format) == $fecha) {
                return $d->format('Y-m-d');
            } else {
                $format = 'd-m-Y';
                $d = DateTime::createFromFormat($format, $fecha);
                if ($d && $d->format($format) == $fecha) {
                    return $d->format('Y-m-d');
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    public static function decodeDate($fecha)
    {
        if (strlen($fecha) > 9) {
            $fecha = str_replace('/', '-', $fecha);
            $format = 'd-m-Y';
            $d = DateTime::createFromFormat($format, $fecha);
            if ($d && $d->format($format) == $fecha) {
                return $d->format('d-m-Y');
            } else {
                $format = 'Y-m-d';
                $d = DateTime::createFromFormat($format, $fecha);
                if ($d && $d->format($format) == $fecha) {
                    return $d->format('d/m/Y');
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    public static function aFecha($date, $small_format = FALSE, $tipo = false)
    {

        //valida si viene vacío.
        if (strlen(trim($date)) == 0 or $date == "0000-00-00 00:00:00") {
            return '';
        }

        //convierte la fecha a timestamp
        $date = strtotime($date);

        //extrae el mes.
        $mes = date('m', $date);

        if ($small_format) {
            switch ($mes) {
                case '01':
                    $_mes = "ene";
                    break;
                case '02':
                    $_mes = "feb";
                    break;
                case '03':
                    $_mes = "mar";
                    break;
                case '04':
                    $_mes = "abr";
                    break;
                case '05':
                    $_mes = "may";
                    break;
                case '06':
                    $_mes = "jun";
                    break;
                case '07':
                    $_mes = "jul";
                    break;
                case '08':
                    $_mes = "ago";
                    break;
                case '09':
                    $_mes = "sep";
                    break;
                case '10':
                    $_mes = "oct";
                    break;
                case '11':
                    $_mes = "nov";
                    break;
                case '12':
                    $_mes = "dic";
                    break;
            }
        } else {
            switch ($mes) {
                case '01':
                    $_mes = "Enero";
                    break;
                case '02':
                    $_mes = "Febrero";
                    break;
                case '03':
                    $_mes = "Marzo";
                    break;
                case '04':
                    $_mes = "Abril";
                    break;
                case '05':
                    $_mes = "Mayo";
                    break;
                case '06':
                    $_mes = "Junio";
                    break;
                case '07':
                    $_mes = "Julio";
                    break;
                case '08':
                    $_mes = "Agosto";
                    break;
                case '09':
                    $_mes = "Septiembre";
                    break;
                case '10':
                    $_mes = "Octubre";
                    break;
                case '11':
                    $_mes = "Noviembre";
                    break;
                case '12':
                    $_mes = "Diciembre";
                    break;
            }
        }

        if ($small_format) {
            //Formato YY
            $anio = date('Y', $date);
            $mes = date('m', $date);
            $dia = date('d', $date);
        } else {
            //Formato YYYY
            $anio = date('Y', $date);
            $dia = date('j', $date);
        }

        //forma la cadena de la fecha en formato legible.
        if ($small_format) {
            $output = "$dia/$mes/$anio";
        } else {
            $output = "$dia de $_mes de $anio";
        }
        if ($tipo == true) {
            if ($tipo == "dia")
                return $dia;
            if ($tipo == "anio")
                return $anio;
            else
                return false;
        }

        //retorna la fecha en formato legible.
        return $output;
    }

    public static function aFechaHora($date, $small_format = FALSE, $tipo = false)
    {

        //valida si viene vacío.
        if (strlen(trim($date)) == 0 or $date == "0000-00-00 00:00:00") {
            return '';
        }

        //convierte la fecha a timestamp
        $fecha = $date;
        $separa = explode(" ", $fecha);
        $horaFormato = date("h:i a", strtotime($separa[1]));

        $date = strtotime($date);

        //extrae el mes.
        $mes = date('m', $date);

        if ($small_format) {
            switch ($mes) {
                case '01':
                    $_mes = "ene";
                    break;
                case '02':
                    $_mes = "feb";
                    break;
                case '03':
                    $_mes = "mar";
                    break;
                case '04':
                    $_mes = "abr";
                    break;
                case '05':
                    $_mes = "may";
                    break;
                case '06':
                    $_mes = "jun";
                    break;
                case '07':
                    $_mes = "jul";
                    break;
                case '08':
                    $_mes = "ago";
                    break;
                case '09':
                    $_mes = "sep";
                    break;
                case '10':
                    $_mes = "oct";
                    break;
                case '11':
                    $_mes = "nov";
                    break;
                case '12':
                    $_mes = "dic";
                    break;
            }
        } else {
            switch ($mes) {
                case '01':
                    $_mes = "Enero";
                    break;
                case '02':
                    $_mes = "Febrero";
                    break;
                case '03':
                    $_mes = "Marzo";
                    break;
                case '04':
                    $_mes = "Abril";
                    break;
                case '05':
                    $_mes = "Mayo";
                    break;
                case '06':
                    $_mes = "Junio";
                    break;
                case '07':
                    $_mes = "Julio";
                    break;
                case '08':
                    $_mes = "Agosto";
                    break;
                case '09':
                    $_mes = "Septiembre";
                    break;
                case '10':
                    $_mes = "Octubre";
                    break;
                case '11':
                    $_mes = "Noviembre";
                    break;
                case '12':
                    $_mes = "Diciembre";
                    break;
            }
        }

        if ($small_format) {
            //Formato YY
            $anio = date('Y', $date);
            $mes = date('m', $date);
            $dia = date('d', $date);
        } else {
            //Formato YYYY
            $anio = date('Y', $date);
            $dia = date('j', $date);
        }

        //forma la cadena de la fecha en formato legible.
        if ($small_format) {
            $output = "$dia/$mes/$anio" . ' ' . $horaFormato;
        } else {
            $output = "$dia de $_mes de $anio" . ' ' . $horaFormato;
        }
        if ($tipo == true) {
            if ($tipo == "dia")
                return $dia;
            if ($tipo == "anio")
                return $anio;
            else
                return false;
        }

        //retorna la fecha en formato legible.
        return $output;
    }

    public static function aFecha_slash($date, $small_format = FALSE)
    {

        //valida si viene vacío.
        if (strlen(trim($date)) == 0 or $date == "0000-00-00 00:00:00") {
            return '';
        }

        //convierte la fecha a timestamp
        $date = strtotime($date);

        //extrae el mes.
        $mes = date('m', $date);

        if ($small_format) {
            switch ($mes) {
                case '01':
                    $_mes = "ene";
                    break;
                case '02':
                    $_mes = "feb";
                    break;
                case '03':
                    $_mes = "mar";
                    break;
                case '04':
                    $_mes = "abr";
                    break;
                case '05':
                    $_mes = "may";
                    break;
                case '06':
                    $_mes = "jun";
                    break;
                case '07':
                    $_mes = "jul";
                    break;
                case '08':
                    $_mes = "ago";
                    break;
                case '09':
                    $_mes = "sep";
                    break;
                case '10':
                    $_mes = "oct";
                    break;
                case '11':
                    $_mes = "nov";
                    break;
                case '12':
                    $_mes = "dic";
                    break;
            }
        } else {
            switch ($mes) {
                case '01':
                    $_mes = "Enero";
                    break;
                case '02':
                    $_mes = "Febrero";
                    break;
                case '03':
                    $_mes = "Marzo";
                    break;
                case '04':
                    $_mes = "Abril";
                    break;
                case '05':
                    $_mes = "Mayo";
                    break;
                case '06':
                    $_mes = "Junio";
                    break;
                case '07':
                    $_mes = "Julio";
                    break;
                case '08':
                    $_mes = "Agosto";
                    break;
                case '09':
                    $_mes = "Septiembre";
                    break;
                case '10':
                    $_mes = "Octubre";
                    break;
                case '11':
                    $_mes = "Noviembre";
                    break;
                case '12':
                    $_mes = "Diciembre";
                    break;
            }
        }

        if ($small_format) {
            //Formato YY
            $anio = date('Y', $date);
            $mes = date('m', $date);
            $dia = date('d', $date);
        } else {
            //Formato YYYY
            $anio = date('Y', $date);
            $dia = date('j', $date);
        }

        //forma la cadena de la fecha en formato legible.
        if ($small_format) {
            $output = "$dia/$mes/$anio";
        } else {
            $output = "$dia de $_mes de $anio";
        }

        //retorna la fecha en formato legible.
        return $output;
    }
    public static function aFechaMes($date, $small_format = FALSE)
    {

        //valida si viene vacío.
        if (strlen(trim($date)) == 0 or $date == "0000-00-00 00:00:00") {
            return '';
        }

        //convierte la fecha a timestamp
        $date = strtotime($date);

        //extrae el mes.
        $mes = date('m', $date);


        switch ($mes) {
            case '01':
                $_mes = "Enero";
                break;
            case '02':
                $_mes = "Febrero";
                break;
            case '03':
                $_mes = "Marzo";
                break;
            case '04':
                $_mes = "Abril";
                break;
            case '05':
                $_mes = "Mayo";
                break;
            case '06':
                $_mes = "Junio";
                break;
            case '07':
                $_mes = "Julio";
                break;
            case '08':
                $_mes = "Agosto";
                break;
            case '09':
                $_mes = "Septiembre";
                break;
            case '10':
                $_mes = "Octubre";
                break;
            case '11':
                $_mes = "Noviembre";
                break;
            case '12':
                $_mes = "Diciembre";
                break;
        }



        //retorna la fecha en formato legible.
        return $_mes;
    }


    public static function cfechaexcel($fecha)
    {
        if (strlen(trim($fecha)) == 0) {
            return FALSE;
        }
        $buscar = array("/", "'");
        $reemplazar = array("-", " ");
        $fecha = str_replace($buscar, $reemplazar, $fecha);
        //formato fecha americana
        $fecha = date("Y-m-d", strtotime($fecha));
        //El nuevo valor de la variable: $fecha2="20-10-2008"
        return $fecha;
    }
    public static function cfecha($fecha)
    {

        if (strlen(trim($fecha)) == 0) {
            return FALSE;
        }
        $fecha = str_replace('/', '-', $fecha);
        //formato fecha americana
        $fecha = date("Y-m-d", strtotime($fecha));
        //El nuevo valor de la variable: $fecha2="20-10-2008"
        return $fecha;
    }
    public static function cfechaHora($fecha)
    {

        if (strlen(trim($fecha)) == 0) {
            return FALSE;
        }
        $fecha = str_replace('/', '-', $fecha);
        $separafecha = explode(" ", $fecha);
        //formato fecha americana
        $fechaFormato = date("Y-m-d", strtotime($separafecha[0]));
        $hora = $separafecha[1] . ' ' . $separafecha[2];
        $horaFormato = date("H:i:s", strtotime($hora));
        $FormatoFechaHora = $fechaFormato . ' ' . $horaFormato;
        //El nuevo valor de la variable: $fecha2="20-10-2008"
        return $FormatoFechaHora;
    }



    public static function aMes($mes)
    {
        switch ($mes) {
            case '01':
                $_mes = "Enero";
                break;
            case '02':
                $_mes = "Febrero";
                break;
            case '03':
                $_mes = "Marzo";
                break;
            case '04':
                $_mes = "Abril";
                break;
            case '05':
                $_mes = "Mayo";
                break;
            case '06':
                $_mes = "Junio";
                break;
            case '07':
                $_mes = "Julio";
                break;
            case '08':
                $_mes = "Agosto";
                break;
            case '09':
                $_mes = "Septiembre";
                break;
            case '10':
                $_mes = "Octubre";
                break;
            case '11':
                $_mes = "Noviembre";
                break;
            case '12':
                $_mes = "Diciembre";
                break;
        }
        return $_mes;
    }


    public static function construir_nombre($min = 4, $max = 8)
    {
        $nombre = '';
        $vocales = array("a", "e", "i", "o", "u");
        $consonantes = array("b", "c", "d", "f", "g", "j", "l", "m", "n", "p", "r", "s", "t");
        $random_nombre = rand($min, $max); //largo de la palabra
        $random = rand(0, 1); //si empieza por vocal o consonante
        for ($j = 0; $j < $random_nombre; $j++) { //palabra
            switch ($random) {
                case 0:
                    $random_vocales = rand(0, count($vocales) - 1);
                    $nombre .= $vocales[$random_vocales];
                    $random = 1;
                    break;
                case 1:
                    $random_consonantes = rand(0, count($consonantes) - 1);
                    $nombre .= $consonantes[$random_consonantes];
                    $random = 0;
                    break;
            }
        }
        return $nombre;
    }

    public static function string($num = 1)
    {
        $i = 0;
        $strings = '';
        while ($i < $num) {
            $strings .= self::construir_nombre() . ' ';
            $i++;
        }
        return $strings;
    }

    public static function formatMoney($number, $fractional = false)
    {
        if ($fractional) {
            $number = sprintf('%.2f', $number);
        }
        while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced != $number) {
                $number = $replaced;
            } else {
                break;
            }
        }
        return $number;
    }

    function fecha($fecha) //cambia de ao/mes/dia -> dia/mes/ao
    {
        $fecha = str_replace("-", "/", $fecha);
        $fe = explode("/", $fecha);
        $di = $fe[2];
        $me = $fe[1];
        $an = $fe[0];
        $fec = $di . "/" . $me . "/" . $an;
        return $fec;
    }

    function mes($mesi)
    {
        $mesi = $mesi - 1;
        $mes[0] = "Enero";
        $mes[6] = "Julio";
        $mes[1] = "Febrero";
        $mes[7] = "Agosto";
        $mes[2] = "Marzo";
        $mes[8] = "Setiembre";
        $mes[3] = "Abril";
        $mes[9] = "Octubre";
        $mes[4] = "Mayo";
        $mes[10] = "Noviembre";
        $mes[5] = "Junio";
        $mes[11] = "Diciembre";

        return $mes[$mesi];
    }

    function fechalarga($fecha)
    {
        $fecha = explode(' ', $fecha);
        $fecha = current($fecha);

        if (strlen(trim($fecha)) == 0 or $fecha == "0000-00-00 00:00:00") {
            return false;
        }

        $dia[0] = "Domingo";
        $dia[1] = "Lunes";
        $dia[2] = "Martes";
        $dia[3] = "Miércoles";
        $dia[4] = "Jueves";
        $dia[5] = "Viernes";
        $dia[6] = "Sábado";
        $fecha = str_replace("-", "/", $fecha);
        $fe = explode("/", $fecha);
        $di = $fe[2];
        $me = $fe[1];
        $nmes =  self::mes($me);
        $an = $fe[0];
        $fec = mktime(0, 0, 0, $me, $di, $an);

        $larga = $dia[date('w', $fec)] . " " . $di . " de " . $nmes . " de " . $an;
        return $larga;
    }

    public static function avance($avance = 0)
    {
        if ($avance < 10) {
            return 'Iniciada';
        } elseif ($avance >= 10 && $avance <= 90) {
            return 'En proceso';
        } else {
            return 'Final';
        }
    }
    public static function xml2array($xml)
    {
        $arr = array();
        foreach ($xml as $element) {
            $tag = $element->getName();
            $e = get_object_vars($element);

            if (!empty($e)) {
                $arr[$tag] = $element instanceof SimpleXMLElement ? utils::xml2array($element) : $e;
            } else {
                $arr[$tag] = trim($element);
            }
        }
        return $arr;
    }

    public static function objToArray($Obj)
    {
        if (is_array($Obj)) {
            return $Obj;
        } else {
            return self::simpleXMLToArray($Obj);
        }
    }
    public static function textoNombre($txt)
    {
        if ($txt != false) {
            //return mb_convert_encoding(mb_convert_case($txt, MB_CASE_TITLE), "UTF-8");  
            return $txt;
            //return ucwords(strtolower($txt));
        }
        return false;
    }


    /***************************************************************************
     * CREADOR DE GUID
     ***************************************************************************/
    public static function guid()
    {
        if (function_exists('com_create_guid')) {
            return trim(com_create_guid(), '{}');
        } else {
            mt_srand((float)microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = //chr(123)// "{"
                substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12);
            //.chr(125);// "}"
            return $uuid;
        }
    }

    public static function mayusculas($string)
    {
        return @strtr(strtoupper($string), "àáâãäåæçèéêëìíîïðñòóôõöøùüú", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÜÚ");
    }

    public static function isAjax()
    {
        //return TRUE;
        return (((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) ? true : false);
    }

    public static function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    public static function random_color()
    {
        return self::random_color_part() . self::random_color_part() . self::random_color_part();
    }
    public static function folio($input, $lenght = 4)
    {
        return str_pad($input, $lenght, "0", STR_PAD_LEFT);
    }
    public static function folioNo($input)
    {
        return str_pad($input, 4, "0", STR_PAD_LEFT);
    }
    public static function NoOrden($input, $anio)
    {
        return str_pad($input, 4, "0", STR_PAD_LEFT) . "/" . $anio;
    }
    public static function fecha_curp($fecha)
    {
        $fecha_nacimiento_completa = trim($fecha);
        if ($fecha_nacimiento_completa < 10) {
            $band_formtato = false;
            $fecha_camb1 = explode('/', $fecha_nacimiento_completa);
            if (count($fecha_camb1) < 3) {
                $fecha_camb1 = explode('-', $fecha_nacimiento_completa);
                $band_formtato = true;
            }
            if (count($fecha_camb1) == 3) {
                $dia = current($fecha_camb1);
                next($fecha_camb1);
                $mes = current($fecha_camb1);
                $anio = end($fecha_camb1);

                if (strlen($dia) < 2) {
                    $dia = str_pad($dia, 2, "0", STR_PAD_LEFT);
                }
                if (strlen($mes) < 2) {
                    $mes = str_pad($dia, 2, "0", STR_PAD_LEFT);
                }
                if (strlen($anio) < 4) {
                    $anio = str_pad($dia, 4, "0", STR_PAD_LEFT);
                }

                if ($band_formtato == true) {
                    $fecha_nacimiento_completa = $dia . '-' . $mes . '-' . $anio;
                } else {
                    $fecha_nacimiento_completa = $dia . '/' . $mes . '/' . $anio;
                }
            }
        }
        return $fecha_nacimiento_completa;
    }
    public static function toMoney($val, $symbol = '$', $r = 2)
    {
        $n = $val;
        $c = is_float($n) ? 1 : number_format($n, $r);
        $d = '.';
        $t = ',';
        $sign = ($n < 0) ? '-' : '';
        $i = $n = number_format(abs($n), $r);
        $j = (($j = $i . length) > 3) ? $j % 3 : 0;

        return  $symbol . $sign . ($j ? substr($i, 0, $j) + $t : '') . preg_replace('/(\d{3})(?=\d)/', "$1" + $t, substr($i, $j));
    }
    public static function arrayaxml($data, $rootNodeName = 'results', $xml = NULL)
    {
        if ($xml == null) {
            $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
        }

        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = "nodeId_" . (string) $key;
            }

            if (is_array($value)) {
                $node = $xml->addChild($key);
                utils::arrayaxml($value, $rootNodeName, $node);
            } else {
                $value = htmlentities($value);
                $xml->addChild($key, $value);
            }
        }
        return html_entity_decode($xml->asXML());
    }
    public static function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "PUT":
                //curl_setopt($curl, CURLOPT_PUT, $data);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                //utils::pre($url);
        }
        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, USR_FIRMA . ':' . PASSWORD_FIRMA);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
    public static function saveMoney($money)
    {
        return str_replace([','], [''], $money);
    }
}
//===============================================
