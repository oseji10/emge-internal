<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
// use Spatie\LaravelPdf\Facades\Pdf;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
class InvoiceController extends Controller
{

   public function pullInvoice(Request $request)
        {
            // Retrieve input data
            $hospital_id = $request->input('hospital_id');
            $period_id = $request->input('period_id');
            
            // Get necessary data for the view
            $hospital = \App\Models\Hospital::where('id', $hospital_id)->select('hospital_name')->first();
            $description = \App\Models\Period::where('id', $period_id)->select('description')->first();
            $invoices = \App\Models\Invoice::where('hospital_id', $hospital_id)
                        ->where('period_id', $period_id)
                        ->get();
            $total_due = \App\Models\Invoice::where('hospital_id', $hospital_id)
                        ->where('period_id', $period_id)
                        ->selectRaw('SUM(cost * quantity) as total_due')
                        ->pluck('total_due')
                        ->first();
            $bank_details = \App\Models\Hospital::where('id', $hospital_id)->select('account_number', 'account_name', 'bank')->first();
        
            // Load the view and pass the data
            $pdf = PDF::loadView('generated-invoice', compact('hospital', 'description', 'invoices', 'total_due', 'bank_details'));
        
            // Stream the generated PDF to the browser
            return $pdf->stream('invoice.pdf', ['Attachment' => false]);
        }
    }
    
    


    // public function pullInvoice(){
    // //     return view('generated-invoice');
   

    // $pdf = Pdf::loadView('generated-invoice');
    // // return $pdf->download('invoice.pdf');
    // }

