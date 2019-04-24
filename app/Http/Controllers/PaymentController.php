<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store() {
        
    }

    private function generatePaymentNumber() {
        $latestOrder = App\Order::orderBy('created_at','DESC')->first();
        $order->order_nr = '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
    }
}
