<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    function index(){
        return view('backend.worker.invoice.order-invoice');
    }

    function invoicePrint($id) {
        $invoicePrint = Invoice::with('order','payment')->where('order_id',$id)->where('worker_id', Auth::user()->id)->first();
        $pdf = PDF::loadView('backend.PDF.worker-invoice', $invoicePrint);
        return $pdf->stream('invoice.pdf');
    }
    
}
