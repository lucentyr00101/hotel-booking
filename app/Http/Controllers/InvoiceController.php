<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class InvoiceController extends Controller
{
    public function generate($pivot_id, $customer_id) {
        $customer = Customer::find($customer_id);

        $data = $customer->rooms()->wherePivot('id', $pivot_id)->first();

        $pdf = app('dompdf.wrapper')->loadView('invoice.generate', ['order' => $data]);

        $type = 'stream';

        if ($type == 'stream') {
            return $pdf->stream('invoice.pdf');
        }
    
        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        }
    }
}
