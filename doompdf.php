<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

//opciones activas en dompdf
$options = new Options();
$options->set('isRemoteEnabled',true);

// Crear una instancia de Dompdf
$dompdf = new Dompdf($options);

// Establecer el tamaño y la orientación del papel
$dompdf->setPaper('letter');

$fecha = date('d-m-Y');
//echo $fecha;

if(isset($_POST['btn'])){
    //echo 'post detectado';
    $namecomp = $_POST['name_company'];
    $nameworker = $_POST['name_worker'];



// Generar contenido HTML para el PDF
$html = '
<style>
    .parrafo {
        font-weight: bold;
        color:#1F1E1E;
        text-align: center;
    }
    .title-container{
        text-align: center;
        margin-top: 3rem;
    }
    .texto{
        font-weight: 500;
        text-align: center;

    }

    .firma{
        display: flex;
        align-items: center;
    }

 


    .linea-estilizada {
        width: 35%;
    }
    </style>
    
    <br>
    <br>

    <div class="title-container">
    <img id="sello" src="http://localhost/playervideo/img/logoPE.png" width="200px" height="150px">
        <h1>Comprobante de capacitacion</h1>
        <p>Compañia: ' . $namecomp . '</p>
        <p>Nombre del trabajador: ' . $nameworker . '</p>
        <p>Fecha: ' . $fecha . '</p>
        
        <br>
   </div>
    <p class="texto">HE LEIDO Y ENTENDIDO EL MANUAL DE SEGURIDAD DE PERTEK-ERLER S DE RL DE CV. Y ME
    COMPROMETO A LLEVAR A CABO TODAS LAS MEDIDAS DE SEGURIDAD PARA EL CUIDADO DE MI
    INTEGRIDAD Y LA DE LOS COLABORADORES, ASI COMO LAS INSTALACIONES Y EL MEDIO
    AMBIENTE.</p>

    <br>
    <br>

    <div class="firma">
        <hr class="linea-estilizada">
   </div>

    <div class="parrafo">
    <p>Nombre y firma</p>
</div>
    
';

//Creamos identificador para cada documento diferente
$identificadorUnico = uniqid();

//quitarmos espacios en blanco  al campo del trabajador
$nameworker = str_replace(' ','_', $nameworker);

// Cargar el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// Renderizar el contenido HTML en un documento PDF
$dompdf->render();

//ruta de descargas para almacenar en servidor
$rutaCarpetaDescargas = "C:\\Users\\rcastellanos\\Downloads\\";
// Obtiene el contenido del PDF como una cadena de bytes
$pdfContent = $dompdf->output();

// Descarga el PDF por medio del navegador con nombre y clave unica
$dompdf->stream( 'Comprobante_' . $identificadorUnico . '_' . $nameworker . '.pdf');


// Ruta y nombre del archivo PDF en la carpeta de descargas o servidor
$rutaArchivoPDF = $rutaCarpetaDescargas . 'Docserv_' . $identificadorUnico . '_' .$nameworker. '.pdf' ;

// Guarda el contenido del PDF en el archivo especificado
file_put_contents($rutaArchivoPDF, $pdfContent);



}



