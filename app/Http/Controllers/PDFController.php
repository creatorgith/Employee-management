<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Data to pass to the view
        $data = [
            'name' => 'John Doe', // Example data
            'date' => date('m/d/Y'),
        ];

        // Load the view file and pass the data to it
        $pdf = PDF::loadView('pdf_template', $data);

        // Return the generated PDF
        return $pdf->download('example.pdf');
    }
}

