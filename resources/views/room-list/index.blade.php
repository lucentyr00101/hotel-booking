@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="white-text">Rooms List</h3>
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-xl-4 pb-4">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card content -->
                        <div class="card-body {{ $room->remainingRooms === 0 ? 'red' : 'green' }} lighten-3">
                            <!-- Title -->
                            <h4 class="card-title"><a>{{ $room->type_of_room }} ({{ $room->remainingRooms }} room/s left)</a></h4>
                            <!-- Text -->
                            <p class="card-text">Rate: &#8369; {{ number_format($room->rate, 2, '.', ',') }}</p>
                            <p class="card-text">Max Capacity: {{ $room->max_cap }}</p>
                            <!-- Button -->
                            <a href="{{ route('guest-list-room-type', ['room' => $room->id]) }}" class="btn btn-primary">View Guest List</a>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            @endforeach
        </div>
    </div>
@endsection