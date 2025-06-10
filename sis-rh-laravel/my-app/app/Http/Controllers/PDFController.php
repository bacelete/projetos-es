<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index()
    {
        $solicitacoes = Solicitacao::all(); 
        $pdf = Pdf::loadView('gerar-pdf', compact('solicitacoes'));
        return $pdf->download('relatorio_solicitacoes.pdf');
    }
}
