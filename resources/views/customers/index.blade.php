@extends('layouts.app')

@section('content')
    <div class="container-fluid white-text">
        <div class="row border-bottom border-white align-items-center">
            <div class="col-xl-6">
                <h3>Customers Master List</h3>
            </div>
            <div class="col-xl-6">
                <a href="{{ route('customers.create') }}" class="btn btn-elegant float-right"><i class="fas fa-user-plus"></i> Add New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive mt-4">
                    <table class="table table-striped white-text" id="customers_index">
                        <thead style="text-transform: uppercase;">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Initial</th>
                                <th>Company</th>
                                <th>Birthday</th>
                                <th>Contact Number</th>
                                <th>Mailing Address</th>
                                <th>Email Address</th>
                                <th>Guest Type</th>
                                <th>Date Registered</th>
                                <th>Assigned Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->first_name }}</td>
                                    <td>{{ $customer->last_name }}</td>
                                    <td>{{ $customer->middle_initial }}</td>
                                    <td>{{ $customer->company }}</td>
                                    <td>{{ $customer->birthday }}</td>
                                    <td>{{ $customer->contact_number }}</td>
                                    <td>{{ $customer->mailing_address }}</td>
                                    <td>{{ $customer->email_address }}</td>
                                    <td>{{ $customer->type_of_guest }}</td>
                                    <td>{{ $customer->created_at->format('F d, Y') }}</td>
                                    <td>
                                        @if (!$customer->rooms()->where('occupied', 1)->exists())
                                            <button type="button" class="btn btn-success btn-sm btn-block" id="toggleAssignModal" data-customer-id="{{ $customer->id }}" data-toggle="modal" data-target="#assignRoom">Assign to a room</button>
                                        @else
                                            {{ $customer->rooms()->where('occupied', 1)->first()->type_of_room }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('customers.show', ['id' => $customer->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        {{-- {{ Form::open(['url' => route('customers.destroy', ['id' => $customer->id]), 'method' => 'post', 'class' => 'd-inline']) }}
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm m-0 black-text"><i class="fas fa-trash"></i></button>
                                        {{ Form::close() }} --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No data available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/customers/index.js/') }}"></script>
    @endpush
    <!-- Modal -->
    @push('modals')
        @include('customers.assign-to-room-modal')
    @endpush
    <!-- End Modal -->
@endsection