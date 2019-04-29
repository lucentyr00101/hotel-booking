<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Payment;
use App\RoomsCustomers;

class PaymentController extends Controller
{
    public function store(Customer $customer, Request $request) {
        $payment = new Payment;
        $payment->room()->associate($customer->currentRoom);
        $payment->customer()->associate($customer);
        $payment->rooms_customers_id = $customer->currentRoom->pivot->id;
        $payment->payment_number     = $this->generatePaymentNumber();
        $payment->days               = $request->days;
        $payment->amount_paid        = $request->amount_paid;
        $payment->change             = $this->removeComma($request->change);
        $payment->subtotal           = $this->removeComma($request->subtotal);
        $payment->discount           = $request->discount;
        $payment->total              = $this->removeComma($request->total);
        $payment->save();

        $customer->rooms()->wherePivot('occupied', 1)
                        ->updateExistingPivot($customer->currentRoom->id, array(
                            'occupied' => 0,
                            'updated_at' => new \DateTime,
                        ));

        return redirect()->route('customers.show', ['id' => $customer->id])->with('success', 'Successfully saved.');
    }

    private function generatePaymentNumber() {
        $payment_count = Payment::all()->count();
        $number = '#'.str_pad($payment_count + 1, 8, "0", STR_PAD_LEFT);

        return $number;
    }

    private function removeComma($number) {
        return (float) str_replace(',', '', $number);
    }
}
