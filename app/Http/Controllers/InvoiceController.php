<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\RoomsCustomers;

class InvoiceController extends Controller
{
    public function generate($pivot_id) {
        $data                 = RoomsCustomers::findOrFail(decrypt($pivot_id));
        $pdf = app('dompdf.wrapper')->loadView('invoice.generate', ['data' => $data]);
        $type = 'stream';
        if ($type == 'stream') {
            return $pdf->stream('invoice.pdf');
        }
    
        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        }
    }
}
