<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function download()
    {
        // Path to the PDF inside public/assets/img/
        $filePath = public_path('assets/AgencyReg.pdf'); // path to your PDF
    $fileName = 'AgencyRegistration.pdf';
    return response()->download($filePath, $fileName);
    }
}
