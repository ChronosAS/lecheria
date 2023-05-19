<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdf extends Controller
{
    public function __invoke(Request $request)
    {
        $pdf = $this->loadPDF($request);

        return $pdf->stream();
    }

    protected function loadPDF(){
        return Pdf::loadView('documents.civil-registry-pdf');
    }
}
