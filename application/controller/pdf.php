<?php

require_once 'public/php/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
class PDF extends Controller
{

	 function generarPDF(){

        session_start();
        $login            = $this->loadController('login');
        $modeloCotizacion = $this->loadModel('CostizacionModel');

        if( $login->isLoged() ){

            if( $_GET['cotizacion'] ){

                $cotizaciones = $modeloCotizacion->getUltimateCotizacion($_GET['cotizacion']);
                ob_start();
                require "application/views/cotizaciones/plantillaPDF.php";
                $html = ob_get_clean();

                // instantiate and use the dompdf class
                $dompdf = new Dompdf();
                $options = new Options();
                $options->set('isRemoteEnabled', TRUE);
                $dompdf->loadHtml($html);
                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('letter', 'portrait');
                // Render the HTML as PDF
                $dompdf->render();
                // Enviamos el fichero PDF al navegador.
                $dompdf->stream("reporte_" . $_GET['cotizacion'] . ".pdf");

                exit;
            }else{

                header("Location:" . URL);
            }
        }else{

            header("Location:" . URL . 'login/');
        }
	 }

	function plantillaPagina($url) {

		$crl = curl_init();
		$timeout = 5;
		curl_setopt($crl, CURLOPT_URL, $url);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
		$ret = curl_exec($crl);
		curl_close($crl);
		return $ret;
	}
}
