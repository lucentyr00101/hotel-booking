@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="white-text">Rooms List</h3>
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-xl-3 pb-4">
                    @forelse ($room->customers as $customer)
                        <!-- Card -->
                        <div class="card">
                            <!-- Card content -->
                            <div class="card-body red lighten-3">
                                <!-- Title -->
                                <h4 class="card-title"><a>{{ $room->type_of_room }} ({{ $room->max_available_rooms - $room->customers()->count() }} room/s left)</a></h4>
                                <!-- Text -->
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <!-- Button -->
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                        <!-- Card -->
                    @empty
                        <!-- Card -->
                        <div class="card green lighten-3">
                            <!-- Card content -->
                            <div class="card-body">
                                <!-- Title -->
                            <h4 class="card-title"><a>{{ $room->type_of_room }} ({{ $room->max_available_rooms }} room/s left)</a></h4>
                                <!-- Text -->
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <!-- Button -->
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                        <!-- Card -->
                    @endforelse
                </div>
            @endforeach
        </div>
    </div>
@endsection