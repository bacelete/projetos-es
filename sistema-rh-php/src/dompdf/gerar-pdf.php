<?php
use Dompdf\Options;
use Dompdf\Dompdf;

require __DIR__.'/vendor/autoload.php';

ob_start();
include('../components/solicitacoes.php');
$html = ob_get_clean();

//conf do dompdf
$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);

//carrega o html no dompdf
$dompdf->loadhtml($html); //transforma em arquivo
$dompdf->setPaper('A4', 'portrait'); //define a formatação
$dompdf->render();//renderiza para pdf

$dompdf->stream("lista_de_solicitacoes.pdf"); //disponibiliza pro navegad através do método stream();

?>