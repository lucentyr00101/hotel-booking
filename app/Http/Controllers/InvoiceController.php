<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\RoomsCustomers;
use PDF;

class InvoiceController extends Controller
{
    public function generate($pivot_id) {
        $data = RoomsCustomers::findOrFail(decrypt($pivot_id));
        $customPaper = array(0,0,607.00,283.80);
        $pdf  = PDF::loadView('invoice.generate', ['data' => $data])->setPaper($customPaper, 'landscape');
        $type = 'stream';
        if ($type == 'stream') {
            return $pdf->stream(time().'.pdf');
        }
    
        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        }
    }
}
