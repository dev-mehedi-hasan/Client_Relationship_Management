<?php

namespace App\Http\Controllers\Backend\Client;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    // Invoice Print 
    public function InvoicePrint($id){
        $invoicePrint = Invoice::with('order','payment')->where('order_id',$id)->where('client_id', Auth::user()->id)->first();
        $pdf = PDF::loadView('backend.PDF.client-invoice', $invoicePrint);
        return $pdf->stream('invoice.pdf');
    }
}
