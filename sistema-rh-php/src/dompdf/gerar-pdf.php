<?php
require __DIR__.'/vendor/autoload.php';

$dompdf = new Dompdf\Dompdf; //gera um instância Dompdf
$tabela = file_get_contents('../components/lista.html'); //pega o conteúdo transfomra numa string
$dompdf->loadhtml($tabela); //transforma em arquivo
$dompdf->setPaper('A4', 'portrait'); //define a formatação
$dompdf->render();//renderiza para pdf
$dompdf->stream(); //disponibiliza pro navegad através do método stream() 