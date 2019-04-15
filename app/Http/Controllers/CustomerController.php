<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'birthday'        => 'required',
            'contact_number'  => 'required',
            'mailing_address' => 'required',
            'email_address'   => 'required',
            'guest_type'      => 'required'
        ]);

        $customer                  = new Customer;
        $customer->first_name      = $request->first_name;
        $customer->middle_initial  = $request->middle_initial;
        $customer->last_name       = $request->last_name;
        $customer->company         = $request->company;
        $customer->birthday        = $request->birthday;
        $customer->contact_number  = $request->contact_number;
        $customer->mailing_address = $request->mailing_address;
        $customer->email_address   = $request->email_address;
        $customer->type_of_guest   = $request->guest_type;
        $customer->save();

        return redirect()->route('customers.show', ['id' => $customer->id])->with('success', 'Successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'birthday'        => 'required',
            'contact_number'  => 'required',
            'mailing_address' => 'required',
            'email_address'   => 'required',
            'guest_type'      => 'required'
        ]);
        
        $customer->first_name      = $request->first_name;
        $customer->middle_initial  = $request->middle_initial;
        $customer->last_name       = $request->last_name;
        $customer->company         = $request->company;
        $customer->birthday        = $request->birthday;
        $customer->contact_number  = $request->contact_number;
        $customer->mailing_address = $request->mailing_address;
        $customer->email_address   = $request->email_address;
        $customer->type_of_guest   = $request->guest_type;
        $customer->save();

        return redirect()->route('customers.show', ['id' => $customer->id])->with('success', 'Successfully saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        
        return redirect()->route('customers.index')->with('success', 'Successfully deleted!');
    }
}
