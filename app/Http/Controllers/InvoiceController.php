<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceController extends Controller
{
    // public function pullInvoice()
    // {
    //     // Initialize Dompdf with options
    //     $options = new Options();
    //     $options->set('defaultFont', 'Arial');
    //     $dompdf = new Dompdf($options);

    //     // Load HTML content from a blade view
    //     $html = view('generated-invoice')->render();

    //     // Load HTML to Dompdf
    //     $dompdf->loadHtml($html);

    //     // (Optional) Set paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render PDF (output to browser or file)
    //     // $dompdf->render();

    //     // Output PDF to the browser
    //     // return $dompdf->stream('invoice.pdf');
    //     return $dompdf->stream('invoice.pdf', ['Attachment' => false]);

    // }


    public function pullInvoice(){
        return view('generated-invoice');
    }
}
