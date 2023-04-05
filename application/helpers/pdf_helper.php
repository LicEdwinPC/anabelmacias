<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('pdf_create')) {
    function pdf_create($filename = 'Imprimir.pdf', $contenido = 'Content', $descargar = 0, $size = 'letter', $orientation = 'portrait')
    {
        require_once(APPPATH . 'libraries/dompdf/dompdf_config.inc.php');


        $dompdf = new DOMPDF();
        $dompdf->load_html($contenido);
        $dompdf->set_paper($size, $orientation);

        $dompdf->render();
        if ($descargar == 1) {
            $dompdf->stream($filename, array("Attachment" => false));
            exit(0);
        } elseif ($descargar == 2) {
            return $dompdf->output();
        } else {
            return $dompdf->output();
            
            // $dompdf->stream($filename, array("Attachment" => $descargar));
        }
    }
}
