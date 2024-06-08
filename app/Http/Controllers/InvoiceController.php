<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceController extends Controller
{
    public function pullInvoice(Request $request)
    {
        // Initialize Dompdf with options
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
    
        // Load HTML content from a blade view
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
    
        // Render the view with data
        $html = view('generated-invoice', compact('hospital', 'description', 'invoices', 'total_due', 'bank_details'))->render();
    
        // For debugging: Uncomment this line to see the generated HTML
        // dd($html);
    
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
    
        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Render PDF (output to browser or file)
        return $dompdf->stream('invoice.pdf', ['Attachment' => false]);
    }
    


    // public function pullInvoice(){
    //     return view('generated-invoice');
    // }
}
