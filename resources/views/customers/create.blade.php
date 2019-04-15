@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-6 col-sm-12">
                <h3 class="white-text">Register New Customer</h3>
                <div class="card">
                    {{ Form::open(['url' => route('customers.store'), 'method' => 'post']) }}
                        <div class="card-body">

                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>

                            <label for="middle_initial">Middle Initial</label>
                            <input type="text" id="middle_initial" name="middle_initial" class="form-control" required>

                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>

                            <label for="company">Company</label>
                            <input type="text" id="company" name="company" class="form-control" required>

                            <label for="birthday">Birthday</label>
                            <input type="text" id="birthday" name="birthday" class="form-control" required>

                            <label for="contact_number">Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control" required>

                            <label for="mailing_address">Mailing Address</label>
                            <input type="text" id="mailing_address" name="mailing_address" class="form-control" required>

                            <label for="email_address">Email Address</label>
                            <input type="text" id="email_address" name="email_address" class="form-control" required>

                            <label for="guest_type">Guest Type</label>
                            <select name="guest_type" id="guest_type" class="browser-default custom-select" required>
                                <option value="" selected disabled>Select one...</option>
                                <option value="VIP">VIP</option>
                                <option value="VVIP">VVIP</option>
                                <option value="WALK-IN">WALK-IN</option>
                            </select>

                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                $('#birthday').datepicker({
                    dateFormat: "MM dd, yy"
                })
            })
        </script>
    @endpush
@endsection