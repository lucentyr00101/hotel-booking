@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <h3 class="white-text">Customer Information</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="md-form">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" readonly value="{{ $customer->first_name }}">
                            </div>
    
                            <div class="md-form">
                                <label for="middle_initial">Middle Initial</label>
                                <input type="text" id="middle_initial" name="middle_initial" class="form-control" readonly value="{{ $customer->middle_initial }}">
                            </div>
    
                            <div class="md-form">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" readonly value="{{ $customer->last_name }}">
                            </div>
    
                            <div class="md-form">
                                <label for="company">Company</label>
                                <input type="text" id="company" name="company" class="form-control" readonly value="{{ $customer->company }}">
                            </div>
    
                            <div class="md-form">
                                <label for="birthday">Birthday</label>
                                <input type="text" id="birthday" name="birthday" class="form-control" readonly value="{{ $customer->birthday }}">
                            </div>
    
                            <div class="md-form">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number" class="form-control" readonly value="{{ $customer->contact_number }}">
                            </div>
    
                            <div class="md-form">
                                <label for="mailing_address">Mailing Address</label>
                                <input type="text" id="mailing_address" name="mailing_address" class="form-control" readonly value="{{ $customer->mailing_address }}">
                            </div>
    
                            <div class="md-form">
                                <label for="email_address">Email Address</label>
                                <input type="text" id="email_address" name="email_address" class="form-control" readonly value="{{ $customer->email_address }}">
                            </div>
    
                            <div class="md-form">
                                <label for="guest_type">Guest Type</label>
                                <input type="text" id="guest_type" name="guest_type" class="form-control" readonly value="{{ $customer->type_of_guest }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <h3 class="white-text">Room Information</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="md-form">
                                <label for="first_name">Room Type</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->type_of_room }}">
                            </div>

                            <div class="md-form">
                                <label>Date & Time of Arrival</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->carbonArrival }}">
                            </div>

                            <div class="md-form">
                                <label>Date & Time of Departure</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->carbonDeparture }}">
                            </div>

                            <div class="md-form">
                                <label>Number of Guest</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->pivot->number_of_guest }}">
                            </div>

                            <div class="md-form">
                                <label>Mode of Payment</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->pivot->mode_of_payment }}">
                            </div>

                            @if ($customer->rooms()->where('occupied', 1)->first()->pivot->mode_of_payment === 'Cash')
                            <div class="md-form">
                                <label>Deposit</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->pivot->deposit }}">
                            </div>
                            @else
                            <div class="md-form">
                                <label>Credit Card Type</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->pivot->credit_card_type }}">
                            </div>
                            <div class="md-form">
                                <label>Credit Card Number</label>
                                <input type="text" class="form-control" readonly value="{{ $customer->rooms()->where('occupied', 1)->first()->pivot->credit_card_number }}">
                            </div>
                            @endif
                            <div class="md-form input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon1">Rate: &#8369;</span>
                                </div>
                                <input type="text" class="form-control" id="room_rate" readonly value="{{ number_format($customer->currentRoom->rate, 2, '.', ',') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mx-auto">
                <h3 class="white-text">Payment</h3>
                <div class="card">
                    {{ Form::open(['url' => route('payment.create', ['customer', $customer->id]), 'method' => 'post']) }}
                        <div class="card-body">
                            <div class="md-form">
                                <label for="">Number of days stayed</label>
                                <input type="text" id="number_of_days" class="form-control" readonly value="{{ $data->number_of_days }}">
                            </div>
                            <div class="md-form input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon1">Subtotal: &#8369;</span>
                                </div>
                                <input type="text" class="form-control" readonly id="subtotal" name="subtotal">
                            </div>
                            <div class="md-form">
                                <label for="">Tax</label>
                                <input type="text" class="form-control" readonly value="12%">
                            </div>
                            <div class="md-form input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon1">Deposit: &#8369;</span>
                                </div>
                                <input type="text" id="deposit" class="form-control" readonly value="{{ $customer->currentRoom->pivot->deposit ? number_format($customer->currentRoom->pivot->deposit, 2, '.', ',') : '0.00' }}">
                            </div>
                            <div class="md-form input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon1">Total: &#8369;</span>
                                </div>
                                <input type="text" class="form-control" readonly id="total">
                            </div>
                            <div class="md-form input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon1">Amount Paid: &#8369;</span>
                                </div>
                                <input type="text" class="form-control" name="amount_paid" id="amount_paid">
                            </div>
                            <div class="md-form input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon1">Change: &#8369;</span>
                                </div>
                                <input type="text" class="form-control" readonly id="change">
                            </div>
                            <input type="submit" value="Proceed" class="btn btn-primary">
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src={{ asset('js/jquery.mask.min.js') }}></script>
        <script src="{{ asset('js/payments/create.js') }}"></script>
    @endpush
@endsection