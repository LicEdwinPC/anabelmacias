<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Generador de codigo HTML
 *
 * @author Marcos Felipe Alcantara
 * @version 2.0
 */
class html {

    /**
     * @since    UTIMA MODIFICACION 27 AGOSTO 2013 
     * @todo     GENERA EL TAG HTML IMG
     * @param    string  $url        DIRECCION URL DE LA IMAGEN
     * @param    string  $extens     COMPONENTES AGREGADOS 'class', 'style', 'title'
     * @param    bool    $imprimir   BANDERA DE IMPRESION O RETORNO (POR DEFECTO ESTA EN TRUE PARA IMPRIMIR)
     * @return   string (retorna la impresion o la cadena img html segun la bandera del parametro anterior)
     */
    public static function img($url, $extens = false, $imprimir = true) {
        if ($url != false) {
            if (preg_match("/http/i", $url)) {
                $image = $url;
            } else {
                $image = base_url('assets/img/' . $url);
            }
        }
        $tag = '<img src="' . $image . '" ' . $extens . ' />';
        if ($imprimir == true) {
            print($tag);
        } else {
            return $tag;
        }
    }

    /**
     * @since    UTIMA MODIFICACION 27 AGOSTO 2013 
     * @todo     Description Generador de imagenes GIF loader
     * @param    numeric $size       es el tamaño de la imagen loader 16,24,32,48,64,80,96 o 128 px
     * @param    string  $extens     es el style tipo class que tendra el GIF
     * @param    string  $imprimir   BANDERA DE IMPRESION O RETORNO (POR DEFECTO ESTA EN TRUE PARA IMPRIMIR)
     * @example  html::loader(16,'prueba','id_imagen');
     * @return   string html:<img src="{ruta}loader_16.gif" class="prueba" id="id_imagen" />
     */
    public static function loader($size, $extens = '', $imprimir = true) {
        $ruta = ASSETS_URL . 'img/loaders/' . $size . '.gif';
        $tag = '<img src="' . $ruta . '" ' . $extens . ' />';
        if ($imprimir == true) {
            echo $tag;
        } else {
            return $tag;
        }
    }
    
    public static function archivo($mimetype = false, $extens = '', $imprimir = true) {
    
        if(strlen($mimetype)>0){
            $ruta = ASSETS_URL . 'img/archivos/' . str_replace('/','',$mimetype) . '.png';
            $tag = '';
            if (@getimagesize($ruta)) {
                $tag = '<img src="' . $ruta . '" ' . $extens . ' />';
            }else{
                $ruta = ASSETS_URL . 'img/archivos/document.png';
                $tag = '<img src="' . $ruta . '" ' . $extens . ' />';
            }
            if ($imprimir == true) {
                echo $tag;
            } else {
                return $tag;
            }
        }
    }

    /**
     * @since    UTIMA MODIFICACION 10 SEPTIEMBRE 2013 
     * @todo     Description Generador SELECT HTML
     * @param    ARRAY   $matriz         ARRAY EN EL QUE SE VA HACER EL RECORRIDO O MOSTRAR
     * @param    STRING  $index_value    NDICE DEL ARRAY DE LA VARIABLE $matriz QUE SE VA MOSTRAR EN EL VALUE DEL SELECT
     * @param    STRING  $index_option   INDICE DEL ARRAY DE LA VARIABLE $matriz QUE SE VA MOSTRAR EN EL OPTION DEL SELECT
     * @param    ARRAY   $extras         COMPONENTES AGREGADOS 'class', 'style', 'title', 'name' , 'id'
     * @param    STRING  $selector       SELECTOR POR DEFECTO DEL SELECT, SE DEBE DE PONER EL VALOR DEL INDICE QUE SE DESEA PRESELECCIONAR
     * @param    string  $imprimir   BANDERA DE IMPRESION O RETORNO (POR DEFECTO ESTA EN TRUE PARA IMPRIMIR)
     * @example  html::select($requisitos,'id_TipoArchivo','descripcion_Requisito',array('name="id_tipo_documento"','class="campo30"','id="tipo_documento"'),2)
     */
    public static function select($matriz, $index_value, $index_option, $extras = array(), $selector = FALSE,$imprimir = TRUE) {
        try {

            if (is_array($matriz)) {
                $html = '';
                $etiqueta = '';
                $name = '';
                $tags = '';
                $add = '';

                if (is_array($extras)) {
                    foreach ($extras as $key => $value) {
                        if (trim($key) == 'default') {
                            $etiqueta = $value;
                        } elseif (trim($key) == 'name') {
                            $name = trim($value);
                        } elseif (trim($key) == 'add') {
                            $add .= trim($value);
                        } else {
                            $tags .= ' '.$key.'="'.$value.'" ';
                        }
                    }
                }

                $html .= '<select ';
                $html .=  $tags . ' name="' . $name . '"';
                $html .= ' >';
                $html .= $add;

                //if ($etiqueta != '' && count($matriz) >= 1) {
                if ($etiqueta != '') {
                    $html .= '<option value="   " >' . $etiqueta . '</option>';
                }

                if ($selector != FALSE) {
                    $selector = (isset($_POST[$name])) ? $_POST[$name] : $selector;
                } else {
                    $selector = (isset($_POST[$name])) ? $_POST[$name] : '';
                }

                foreach ($matriz as $key => $value) {
                    if(is_object($value)){
                        if(isset($value->$index_value) && $value->$index_option ){
                            if ((string)$selector === (string)  ($value->$index_value)) {
                                $html .= '<option value="' . ($value->$index_value) . '" selected="selected">' . ($value->$index_option) . '</option>';
                            } else {
                                $html .= '<option value="' . ($value->$index_value) . '" >' . ($value->$index_option) . '</option>';
                            }
                        }

                    }else{
                        if(isset($value[$index_value]) && $value[$index_option] ){
                            if ((string)$selector === (string)($value[$index_value])) {
                                $html .= '<option value="' . ($value[$index_value]) . '" selected="selected">' . ($value[$index_option]) . '</option>';
                            } else {
                                $html .= '<option value="' . ($value[$index_value]) . '" >' . ($value[$index_option]) . '</option>';
                            }
                        }
                    }    
                }
                $html .= '</select>';

                if ($imprimir == TRUE) {
                    print($html);
                } else {
                    return $html;
                }
            }
            
        } catch (Exception $exc) {
            log_message('error','ERROR LIBRERIA HTML SELECT =>'.$exc->getTraceAsString());
            if ($imprimir == TRUE) {
                print FALSE;
            } else {
                return FALSE;
            }
        }
        
    }
     public static function _select($matriz, $index_value, $index_option, $extras = array(), $selector = FALSE,$imprimir = TRUE) {
        try {

            if (is_array($matriz)) {
                $html = '';
                $etiqueta = '';
                $name = '';
                $tags = '';
                $add = '';

                if (is_array($extras)) {
                    foreach ($extras as $key => $value) {
                        if (trim($key) == 'default') {
                            $etiqueta = $value;
                        } elseif (trim($key) == 'name') {
                            $name = trim($value);
                        } elseif (trim($key) == 'add') {
                            $add .= trim($value);
                        } else {
                            $tags .= ' '.$key.'="'.$value.'" ';
                        }
                    }
                }

                $html .= '<select ';
                $html .=  $tags . ' name="' . $name . '"';
                $html .= ' >';
                $html .= $add;

                $option = '';
                $selected = FALSE;
                foreach ($matriz as $key => $value) {
                    if(is_object($value)){
                        if(isset($value->$index_value) && $value->$index_option ){
                            if ($selector == $value->$index_value) {
                                $option .= '<option value="' . $value->$index_value . '" selected="selected">' . $value->$index_option . '</option>';
                                $selected = TRUE;
                            } else {
                                $option .= '<option value="' . $value->$index_value . '" >' . $value->$index_option . '</option>';
                            }
                        }

                    }else{
                        if(isset($value[$index_value]) && $value[$index_option] ){
                            if ($selector == $value[$index_value]) {
                                $option .= '<option value="' . $value[$index_value] . '" selected="selected">' . $value[$index_option] . '</option>';
                                $selected = TRUE;
                            } else {
                                $option .= '<option value="' . $value[$index_value] . '" >' . $value[$index_option] . '</option>';
                            }
                        }
                    }    
                }
                
                if ($etiqueta != false && $selected == FALSE) {
                    $html .= '<option value="   " selected="selected" >' . $etiqueta . '</option>'.$option;
                }  else {
                    $html .= $option;
                }
                $html .= '</select>';

                if ($imprimir == TRUE) {
                    print($html);
                } else {
                    return $html;
                }
            }
            
        } catch (Exception $exc) {
            log_message('error','ERROR LIBRERIA HTML SELECT =>'.$exc->getTraceAsString());
            if ($imprimir == TRUE) {
                print FALSE;
            } else {
                return FALSE;
            }
        }
        
    }
    /**
     * @since    UTIMA MODIFICACION 27 AGOSTO 2013 
     * @todo     Description GENERADOR DE TAGS A HTML
     * @param   STRING  $url        DIRECCION URL DEL LINK
     * @param   STRING  $title      EL CAMPO TITLE DEL <a>TITLE</a> 
     * @param   STRING  $extras     COMPONENTES AGREGADOS 'class', 'style', 'title'    
     * @param   BOOL    $imprimir   BANDERA DE IMPRESION O RETORNO (POR DEFECTO ESTA EN TRUE PARA IMPRIMIR)   
     * @return  STRING (retorna la impresion o la cadena img html segun la bandera del parametro anterior)
     * @example html::link('INICIO', 'Buscar', 'class="find"')
     */
    public static function link($url = FALSE, $title = FAlSE, $extras = '', $imprimir = TRUE) {
        $html = '<a ';
        if ($url != false) {
            if (preg_match("/http/i", $url)) {
                $html .=' href="' . $url . '"';
            } else {
                $html .=' href="' . site_url($url) . '"';
            }
        }

        $html .= <<<EOT
        $extras>$title</a>
EOT;
        if ($imprimir == TRUE) {
            print($html);
        } else {
            return $html;
        }
    }
    
    public static function recortar($cadena='',$charlimit= 10){
        
        if(strlen($cadena) > $charlimit){
            return substr($cadena, 0, $charlimit)."...";
        } else {
            return $cadena;
        }
    }
    
    public static function porcentajes(){
        return array( 1 => array('value'=>10,'option'=>'10%'), 2 => array('value'=>20,'option'=>'20%'), 3 => array('value'=>30,'option'=>'30%'), 4 => array('value'=>40,'option'=>'40%'), 5 => array('value'=>50,'option'=>'50%'), 6 => array('value'=>60,'option'=>'60%'), 7 => array('value'=>70,'option'=>'70%'), 8 => array('value'=>80,'option'=>'80%'), 9 => array('value'=>90,'option'=>'90%'), 10 => array('value'=>100,'option'=>'100%') );
        //return array( 0 => array('value'=>0,'option'=>'0%'), 1 => array('value'=>10,'option'=>'10%'), 2 => array('value'=>20,'option'=>'20%'), 3 => array('value'=>30,'option'=>'30%'), 4 => array('value'=>40,'option'=>'40%'), 5 => array('value'=>50,'option'=>'50%'), 6 => array('value'=>60,'option'=>'60%'), 7 => array('value'=>70,'option'=>'70%'), 8 => array('value'=>80,'option'=>'80%'), 9 => array('value'=>90,'option'=>'90%'), 10 => array('value'=>100,'option'=>'100%') );
    }

    
    public static function upload_multiple( $num_uploader = FALSE , $callback = FALSE ){
        
        $idFile = '';
        $name_file = '';
        
        if($num_uploader == false){
            $num_uploader = uniqid(rand(0, 50));
        }  else {
            $idFile     = (isset($_POST['id_file_'.$num_uploader])) ? $_POST['id_file_'.$num_uploader] : $idFile;
            $name_file  = (isset($_POST['name_file_'.$num_uploader])) ? $_POST['name_file_'.$num_uploader] : $name_file;
        }
        
        if(( strlen(trim($name_file))>0 )||( strlen(trim($idFile))>0 )){
            $id_rand = uniqid(rand(1, 100));
            $tag_a = <<<EOD
                <div class="row">
                    <a id="$id_rand" style="font-weight: normal !important;" >$name_file</a>
                    <a class="delete" style="float:right; cursor: pointer" onclick="borrar_archivo($idFile,$num_uploader)" title="Eliminar archivo">Eliminar</a>
                    <a class="download" style="float:right; cursor: pointer" onclick="descargar__archivo('$idFile')" title="Descargar archivo">Eliminar</a>    
                </div>
EOD;

        }else{
            $tag_a = '&nbsp;';
        }
        
        $html = <<<EOD
            <div class="forza2">
                <div id="uploader-files_$num_uploader" rel="uploader-multiple-files" callback="$callback" uploader="$num_uploader"></div>
            </div>
            <input type="hidden" id="uploader-id_$num_uploader" name="id_file_$num_uploader" value="$idFile" >
            <input type="hidden" id="uploader-name_$num_uploader" name="name_file_$num_uploader" value="$name_file" >
EOD;
        echo ($html);

        if(strlen($tag_a)>10){
            $buttons = '<div class="forza3" style="display:none;" id="uploader-nombre_'.$num_uploader.'" >'.$tag_a.'</div>';
        }  else {
            $buttons = '<div class="forza3" style="display:none;" id="uploader-nombre_'.$num_uploader.'" ></div>';
        }

        //$progres = '<div class="forza4" id="uploader-progress_'.$num_uploader.'" style="display:none;" ><div class="izquierda campo40 margin-top-px9"><div id="progressbar_'.$num_uploader.'" class="progress-upload"><div class="progress-label-upload">Cargando</div></div></div></div>';
        $progres = '<center class="progreso_carga none" ><div class="sep50" ></div>'.html::loader('cargando','style="width: 70px;"',FALSE).'</center><center class="progreso_carga none" ><div class="forza4 none" id="uploader-progress_'.$num_uploader.'" style="height:28px; width: 200px;" ></div><div class="sep30" ></div></center>';
        echo self::limpiar($buttons);
        echo $progres;
    }
    
    public static function limpiar($string){
        //return nl2br(preg_replace('/\s+/',  ' ', (string)$string));
        return nl2br(preg_replace('/\s+/',  ' ', (string)$string));
    }
}