@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-6 col-sm-12">
                <h3 class="white-text"></h3>
                <div class="card">
                    <div class="card-body">

                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" readonly value="{{ $customer->first_name }}">

                        <label for="middle_initial">Middle Initial</label>
                        <input type="text" id="middle_initial" name="middle_initial" class="form-control" readonly value="{{ $customer->middle_initial }}">

                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" readonly value="{{ $customer->last_name }}">

                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" class="form-control" readonly value="{{ $customer->company }}">

                        <label for="birthday">Birthday</label>
                        <input type="text" id="birthday" name="birthday" class="form-control" readonly value="{{ $customer->birthday }}">

                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" class="form-control" readonly value="{{ $customer->contact_number }}">

                        <label for="mailing_address">Mailing Address</label>
                        <input type="text" id="mailing_address" name="mailing_address" class="form-control" readonly value="{{ $customer->mailing_address }}">

                        <label for="email_address">Email Address</label>
                        <input type="text" id="email_address" name="email_address" class="form-control" readonly value="{{ $customer->email_address }}">

                        <label for="guest_type">Guest Type</label>
                        <input type="text" id="guest_type" name="guest_type" class="form-control" readonly value="{{ $customer->type_of_guest }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection